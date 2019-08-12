<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductsBrands;
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
        $brands_list = $product_brands_controller->getBrandNamesArray();

        return view('welcome')->with([
            'title' => 'Gooische Auto Mediair',
            'products' => $three_products,
            'brands' => $brands_list
        ]);
    }

}
