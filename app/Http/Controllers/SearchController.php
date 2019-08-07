<?php

namespace App\Http\Controllers;

use App\Models\Products;
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

    public function handleSortRequest() {
        $this->sortByNumber();
    }

    public function sortByNumber() {
        $products = Products::with(['gallery', 'slug'])->get()
            ->where('status', 'available');
        
        $number_of_products = count($products);

        for ( $i = 0; $i < $number_of_products; $i++ ) {
            var_dump($products[$i]['price']);
        }

        die();

        return $sorted_products_array;
    }
}
