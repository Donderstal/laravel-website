<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use App\Models\Products;
use App\Models\ProductsServices;

class ProductsServicesController extends Controller
{
    public function index(Products $product)
    {
        return view('admin.products.services')->with([
            'services' => $product->services()->orderBy('title', 'ASC')->get(),
            'product' => $product
        ]);
    }

    public function store(Products $product, CreateServicesRequest $request)
    {
        $product->services()->create([
            'title' => $request->title,
            'value' => $request->value
        ]);

        flash_message('Service item added successfully.');

        return redirect()->route('admin.products.services.index', $product);
    }

    public function edit(Products $product, ProductsServices $service)
    {
        return view('admin.products.services')->with([
            'services' => $product->services()->orderBy('title', 'ASC')->get(),
            'product' => $product,
            'service' => $service
        ]);
    }

    public function update(Products $product, ProductsServices $service, UpdateServicesRequest $request)
    {
        $service->update($request->only(['title', 'value']));

        flash_message('Service item updated successfully.');

        return redirect()->route('admin.products.services.index', $product);
    }

    public function delete(Products $product, ProductsServices $service)
    {
        $service->delete();

        flash_message('Service deleted successfully.', 'warning');

        return redirect()->route('admin.products.services.index', $product);
    }
}
