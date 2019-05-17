<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Model\ProductsBrands;
use App\Models\Products;
use App\Models\ProductsColors;
use App\Models\ProductsModels;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('created_at', 'DESC')
            ->with(['user', 'brand', 'model'])
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
