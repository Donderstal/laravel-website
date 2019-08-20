<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrands;
use App\Models\ProductsSlugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\CallMeFormRequest;
use Request as ControllerRequest;

class ProductsController extends Controller
{
    public function show($slug)
    {
        // get the product slug
        $slug_data = ProductsSlugs::where('slug', $slug)
            ->first();

        // if product slug was wrong and does not exists
        if (empty($slug_data)) {
            abort(404);
        }

        // if product slug is not the latest slug
        if ($slug_data->default != true) {

            // get the latest slug
            $product_url = ProductsSlugs::where('product_id', $slug_data->product_id)
                ->where('default', true)
                ->first();

            // redirect to latest slug
            if ($product_url->slug) {
                return redirect()->route('products.show', $product_url->slug);
            } else {
                abort(404);
            }
        }

        // Get the product details
        $product = Products::where('id', $slug_data->product_id)
            ->where('enable', true)
            ->with([
                'brand',
                'model',
                'gallery' => function ($q) {
                    $q->orderBy('sort', 'ASC');
                },
                'color',
                'options' => function ($q) {
                    $q->with('items');
                },
                'specification',
                'services'
            ])
            ->first();

        // Product does not exists
        if (empty($product)) {
            abort(404);
        }

        // update product visits
        $product->timestamps = false;
        $product->visits++;
        $product->save();

        // get related products
        $related_products = Products::where('brand_id', $product->brand_id)
            ->where('model_id', $product->model_id)
            ->where('enable', true)
            ->where('id', '<>', $product->id)
            ->with(['cover', 'brand'])
            ->take(3)
            ->orderBy('created_at', 'DESC')
            ->get();

        $title = 'GAM - ' . $product->title . ' - ' . $product->brand()->first()->title . ' - ' . $product->model()->first()->title;
        return view('products.show')->with([
            'slug_object' => $product->slug()->first(),
            'title' => $title,
            'product' => $product,
            'related_products' => $related_products
        ]);
    }

    public function list(Request $request){
        // This is the Query Params that will be added to the javascript
        $product_list_search_query_params = $request->toArray();
        // This will mean that every new search has no page
        unset($product_list_search_query_params['page']);

        // Remove the empty values
        foreach($product_list_search_query_params as $key => $value) {
            if (!$value) {
                unset($product_list_search_query_params[$key]);
            }
        }

        // This is the path params that should be added to the javascript
        $product_list_search_path_params = [];

        if ($request->status) {
            $product_list_search_path_params['status'] = $request->status;
        }

        if ($request->brand) {
            $product_list_search_path_params['brand'] = $request->brand;
        }

        $product_list_search_url = URL::full();

        // Finial gamSearchState that will be passed to the javascript as json
        $gamSearchState = [
            'pathParams' => $product_list_search_path_params,
            'queryParams' => $product_list_search_query_params
        ];

        $brands_list = ProductsBrands::getAllBrandsInOrderQuery()->get();
        $products_list_query = $this->buildQuery($request, $brands_list);

        // Create the results
        $products_results = $products_list_query->paginate(config('site.products.paginate_count'));
        // Important to add the query params that the user is search for
        $products_results->appends($product_list_search_query_params);

        return view('products.list')->with([
            'gamSearchState' => $gamSearchState,
            'title' => 'Ons aanbod',
            'products' => $products_results,
            'product_list_search_path_params' => $product_list_search_path_params,
            'product_list_search_query_params' => $product_list_search_query_params,
            'selected_brand_slug' => $request->brand,
            'brands' => $brands_list,
            'selected_sortable_slug' => $request->order
        ]);
    }

    private function buildQuery($request, $brands_list) {
        $products_list_query = Products::query();
        $products_list_query->with(['slug'])->where('enable', true);

        // Status filters
        $products_list_query->when($request->status === 'aanbod', function($q) {
            return $q->where('status', 'available');
        });

        $products_list_query->when($request->status === 'verkocht', function($q) {
            return $q->where('status', 'sold');
        });

        // Brand filters
        $brands_slugs = ProductsBrands::getAllSlugs($brands_list);
        $brand_to_filter = strtolower($request->brand);

        $products_list_query->when(in_array($brand_to_filter, $brands_slugs), function($q) use ($brand_to_filter) {
            return $q->whereHas('brand', function($query) use ($brand_to_filter) {
                $query->where('slug', $brand_to_filter);
            });
        });

        // Search query
        $search_query = $request->q;
        $products_list_query->when(is_string($search_query), function($q) use ($search_query) {
            return $q->search($search_query);
        });

        // Order Querys
        $products_list_query->when($request->order === 'bouwjaar', function($q) use ($search_query) {
            return $q->orderBy('year', 'desc');
        });

        $products_list_query->when($request->order === 'prijs', function($q) use ($search_query) {
            return $q->orderBy('price', 'desc');
        });

        $products_list_query->when($request->order === 'km-stand', function($q) use ($search_query) {
            return $q->orderBy('mileage', 'asc');
        });

        $products_list_query->when($request->order === 'merk', function($q) use ($search_query) {
            return $q->whereHas('brand', function($query) {
                $query->orderBy('title', 'asc');
            });
        });
        return $products_list_query;
    }

    public function store(CallMeFormRequest $request)
    {
        /* $res = [];
        $res['first-name'] = $request->firstname;
        $res['last-name'] = $request->lastname;
        $res['telephone'] = $request->telephone;
        $res['email'] = $request->email;
        $res['subject'] = $request->subject;
        $res['text-block'] = $request->textblock;

        $request->session()->flash('message', [
            'text' => 'Bedankt!',
            'type' => 'success'
        ]);
 */
        //Mail::to($res['email'])->send(new ContactFormEmail($res));

        return redirect()->route('products.show', ['slug' => $request->slug] );
    }

}
