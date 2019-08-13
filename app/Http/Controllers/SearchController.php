<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Controllers\Admin\Products\ProductsBrandsController;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchForRequest(Request $request)
    {
        if (empty($request->q) || $request->q === null) {
            $products = Products::where('enable', true)
                ->with(['cover', 'brand'])
                ->orderBy('created_at', 'DESC')
                ->paginate(config('site.products.paginate_count'));
        } else {
            $products = Products::search($request->q)
                ->where('enable', true)
                ->with(['cover', 'brand'])
                ->orderBy('created_at', 'DESC')
                ->paginate(config('site.products.paginate_count'));
        }

        return view('products.list')->with([
            'title' => 'Zoekresultaten voor "' . $request->q . '"',
            'products' => $products
        ]);
    }
}
