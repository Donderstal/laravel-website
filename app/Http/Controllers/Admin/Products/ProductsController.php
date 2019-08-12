<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductsBrands;
use App\Models\Products;
use App\Models\ProductsColors;
use App\Models\ProductsModels;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('created_at', 'DESC')
            ->with(['user', 'brand', 'model', 'slug'])
            ->paginate(config('site.admin.per_page'));

        return view('admin.products.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.products.create')->with([
            'brands' => $this->getBrands(),
            'colors' => $this->getColors()
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        $product = Products::create($request->except(['_token', 'cover_file']));

        // Add slug for product
        $product->slug()->create([
            'slug' => Str::slug($request->title),
            'default' => true
        ]);

        if ($request->hasFile('cover_file')) {
            $product->setCover($request->cover_file);
        }

        flash_message('New product added successfully.');

        return redirect()->route('admin.products.index');

    }

    public function edit(Products $product)
    {
        return view('admin.products.edit')->with([
            'product' => $product,
            'brands' => $this->getBrands(),
            'colors' => $this->getColors(),
            'models' => $this->getModels($product->brand_id)->pluck('title', 'id')
        ]);
    }

    public function update(Products $product, UpdateProductRequest $request)
    {
        if ($request->hasFile('cover_file')) {
            $product->setCover($request->cover_file);
        }

        if ($product->title != $request->title) {
            // set the default of all slugs to false
            $product->slug()->update(['default' => false]);

            // create a new slug
            $product->slug()->create([
                'slug' => Str::slug($request->title),
                'default' => true
            ]);
        }

        $product->update($request->except($request->except(['_token', 'cover_file'])));

        flash_message('The product updated successfully.');

        return redirect()->route('admin.products.index');

    }

    public function delete(Products $product)
    {
        $product->delete();

        flash_message('The product deleted successfully.', 'warning');

        return redirect()->route('admin.products.index');
    }

    public function getModels($brand_id)
    {
        if (!empty($brand_id)) {
            $models = ProductsModels::where('brand_id', $brand_id)
                ->select(['id', 'title'])
                ->get();
            return $models;
        } else {
            return [];
        }
    }

    public function getBrands()
    {
        return ProductsBrands::orderBy('title', 'ASC')->get()->pluck('title', 'id');
    }

    public function getColors()
    {
        return ProductsColors::orderBy('title', 'ASC')->get()->pluck('title', 'id');
    }
}
