<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class LandingPageController extends Controller
{
    public function index()
    {
        $all_products = Products::all();
        for ( $i = 0; $i < 3; $i++) {
            $three_products[] = $all_products[$i];
        }      

        return view('welcome')->with([
            'title' => 'Gooische Auto Mediair',
            'products' => $three_products
        ]);
    }

}
