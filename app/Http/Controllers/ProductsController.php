<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsSlugs;
use App\Http\Controllers\Admin\Products\ProductsBrandsController;
use Illuminate\Http\Request;

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

        // get the cover from gallery array
        $product->cover = (object)array_filter($product->gallery->toArray(), function ($item) use ($product) {
            if ($item['id'] == $product->cover_id) {
                return $product;
            }
        })[0];

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

    public function list(){
        $products = Products::with(['gallery', 'slug'])->get()
            ->where('status', 'available');
            
        $product_brands_controller = new ProductsBrandsController;
        $brands_list = $product_brands_controller->getBrandNamesArray();

        return view('aanbod')->with([
            'title' => 'Ons aanbod',
            'products' => $products,
            'brands' => $brands_list
        ]);
    }

    // Placeholder for actual 'verkocht' function
    public function verkocht(){
        $products = Products::all()->where('status', 'sold');

        return view('aanbod')->with([
            'title' => 'Verkocht',
            'products' => $products
        ]);
    }

    public function handleSortRequest($sort_request) {
        switch ($sort_request) {
            case 'bouwjaar':
                $this->sortController('year');
                break;
            case 'prijs':
                $this->sortController('price');
                break;
            case 'km-stand':
                $this->sortController('mileage');
                break;
            case 'merk':
                $this->sortController('brand');
                break;
        }
        
    }

    public function sortController($type) {

        $available_products = Products::with(['gallery', 'slug'])->get()
        ->where('status', 'available');

        $number_of_products = count($available_products);

        if ($type === 'brand') {
            var_dump('This functionality will be addded soon...');
        }
        else {
            $product_names_sorted_by_type 
            = $this->orderProductTitlesBasedOnNumber($number_of_products, $available_products, $type);
        }

        $sorted_products_array 
        = $this->orderProductsBasedOnSortedArray($number_of_products, $available_products, $product_names_sorted_by_type);

        $product_brands_controller = new ProductsBrandsController;
        $brands_list = $product_brands_controller->getBrandNamesArray();
        
        return view('aanbod')->with([
            'title' => 'Ons aanbod',
            'products' => $sorted_products_array,
            'brands' => $brands_list
        ]);
    }

    public function orderProductTitlesBasedOnNumber($number_of_products, $available_products, $type){

        $products_array = [];

        for ( $i = 0; $i < $number_of_products; $i++ ) {
            $products_array[$available_products[$i][$type]] = $available_products[$i]['title'];
        }

        ksort($products_array, 1);

        return $products_array;
    }

    public function orderProductsBasedOnSortedArray($number_of_products, $available_products,$product_names_sorted_by_type) {

        $sorted_products_array = [];

         foreach ( $product_names_sorted_by_type as $key => $value) {

            for ( $i = 0; $i < $number_of_products; $i++ ) {

                if ( $value === $available_products[$i]['title'] ) {

                    $array_position = array_search($key, array_keys($product_names_sorted_by_type));

                    $sorted_products_array[$array_position] = $available_products[$i];

                }

            }

        }

        return $sorted_products_array;

    }
}
