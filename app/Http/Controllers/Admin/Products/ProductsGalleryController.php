<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\Products;
use App\Models\ProductsGallery;
use Illuminate\Http\Request;

class ProductsGalleryController extends Controller
{

    public function index(Products $product)
    {
        return view('admin.products.gallery')->with([
            'product' => $product,
            'pictures' => $product->gallery()->orderBy('sort', 'ASC')->get()
        ]);
    }

    public function store(Products $product, CreateGalleryRequest $request)
    {
        ProductsGallery::store([
            'product_id' => $product->id,
            'resource' => $request->picture_file,
            'label' => $request->label
        ]);

        flash_message('New picture added successfully.');

        return redirect()->route('admin.products.gallery.index', $product);

    }

    public function edit(Products $product, ProductsGallery $picture)
    {
        return view('admin.products.gallery')->with([
            'product' => $product,
            'pictures' => $product->gallery()->orderBy('sort', 'ASC')->get(),
            'picture' => $picture
        ]);
    }

    public function delete(Products $product, ProductsGallery $picture)
    {
        $picture->delete();

        flash_message('The picture deleted successfully.', 'warning');

        return redirect()->route('admin.products.gallery.index', $product);

    }

    public function sort(Products $product, Request $request)
    {
        foreach ($request->sort as $id => $sort) {
            ProductsGallery::find($id)->update([
                'sort' => $sort
            ]);
        }

        flash_message('Sort of pictures updated successfully.');

        return redirect()->route('admin.products.gallery.index', $product);
    }

    public function cover(Products $product, ProductsGallery $picture)
    {
        $product->setCover($picture->id);

        flash_message('Cover of ' . $product->title . ' changed successfully.');

        return redirect()->route('admin.products.gallery.index', $product);
    }
}
