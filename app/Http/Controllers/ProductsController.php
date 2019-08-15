<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsBrands;
use App\Models\ProductsSlugs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
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

        return view('products.show')->with([
            'product' => $product,
            'related_products' => $related_products
        ]);
    }

    public function list(Request $request){
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
        $brands_list = ProductsBrands::getAllBrandsInOrderQuery()->get();
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

        $products_list_query->paginate(config('site.products.paginate_count'));

        $product_list_search_params = $request->toArray();

        if ($request->status) {
            $product_list_search_params['status'] = $request->status;
        }

        if ($request->brand) {
            $product_list_search_params['brand'] = $request->brand;
        }

        $product_list_search_url = URL::full();

        return view('products.list')->with([
            'title' => 'Ons aanbod',
            'products' => $products_list_query->get(),
            'product_list_search_params' => $product_list_search_params,
            'product_list_search_url' => $product_list_search_url,
            'selected_brand_slug' => $request->brand,
            'brands' => $brands_list
        ]);
    }
}
