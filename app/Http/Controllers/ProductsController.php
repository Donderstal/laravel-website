<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductsSlugs;
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
        $products = Products::all();
        return view('products.list')->with([
            'products' => $products
        ]);
    }
}
