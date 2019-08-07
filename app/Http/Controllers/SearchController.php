<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Controllers\Admin\Products\ProductsBrandsController;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchForRequest(Request $request)
    {
        if (empty($request->q)) {
            return view('search.index');
        }

        $products = Products::search($request->q)
            ->where('enable', true)
            ->with(['cover', 'brand'])
            ->orderBy('created_at', 'DESC')
            ->paginate(config('site.products.paginate_count'));

        return view('aanbod')->with([

            'title' => 'Zoekresultaten voor "' . $request->q . '"',
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
            'products' => $sorted_products_array ,
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
