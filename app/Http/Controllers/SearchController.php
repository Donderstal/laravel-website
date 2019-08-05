<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
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
}
