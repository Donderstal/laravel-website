<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Model\ProductsBrands;
use App\Http\Controllers\Admin\Products\ProductsBrandsController;
use App\Http\Controllers\SearchController;

class LandingPageController extends Controller
{
    public function index()
    {
        $all_products = Products::all();
        for ( $i = 0; $i < 3; $i++) {
            $three_products[] = $all_products[$i];
        }      

        $product_brands_controller = new ProductsBrandsController;
        $product_brands = $product_brands_controller->getBrandsName();
        $number_of_brands = count($product_brands);
        for ( $i = 0; $i < $number_of_brands; $i++) {
            $brands_list[] = $product_brands[$i]['title'];
        }

        return view('welcome')->with([
            'title' => 'Gooische Auto Mediair',
            'products' => $three_products,
            'brands' => $brands_list
        ]);
    }

}
