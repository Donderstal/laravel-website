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
        $three_products = Products::latest()->limit(3)->get();

        $product_brands_controller = new ProductsBrandsController;
        $brands_list = $product_brands_controller->getBrandNamesArray();

        return view('welcome')->with([
            'title' => 'Gooische Auto Mediair',
            'products' => $three_products,
            'brands' => $brands_list
        ]);
    }

}
