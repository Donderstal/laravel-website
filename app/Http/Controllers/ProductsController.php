<?php

namespace App\Http\Controllers;

use App\Models\ProductsSlugs;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($slug)
    {
        // get the product slug
        $slug_data = ProductsSlugs::where('slug', $slug)
            ->with([
                'product' => function($q){
                    $q->where('enable', true);
                },
                'product.brand',
                'product.model',
                'product.color',
                'product.cover',
                'product.gallery'
            ])
            ->first();

        // if product slug was wrong and does not exists
        if (empty($slug_data) || empty($slug_data->product)) {
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

        // assign product
        $product = $slug_data->product;

        // update product visits
        $product->timestamps = false;
        $product->visits++;
        $product->save();

        return view('products.show')->with([
            'product' => $slug_data->product
        ]);
    }
}
