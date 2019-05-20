<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSpecificationRequest;
use App\Http\Requests\UpdateSpecificationRequest;
use App\Models\Products;
use App\Models\ProductsSpecification;

class ProductsSpecificationController extends Controller
{
    public function index(Products $product)
    {
        return view('admin.products.specification')->with([
            'specifications' => $product->specification()->orderBy('title', 'ASC')->get(),
            'product' => $product
        ]);
    }

    public function store(Products $product, CreateSpecificationRequest $request)
    {
        $product->specification()->create([
            'title' => $request->title,
            'value' => $request->value

        ]);

        flash_message('Specification added successfully.');

        return redirect()->route('admin.products.specification.index', $product);
    }

    public function edit(Products $product, ProductsSpecification $specification)
    {
        return view('admin.products.specification')->with([
            'specifications' => $product->specification()->orderBy('title', 'ASC')->get(),
            'product' => $product,
            'specification' => $specification
        ]);
    }

    public function update(
        Products $product,
        ProductsSpecification $specification,
        UpdateSpecificationRequest $request
    ) {
        $specification->update($request->only(['title', 'value']));

        flash_message('Specification updated successfully.');

        return redirect()->route('admin.products.specification.index', $product);
    }

    public function delete(Products $product, ProductsSpecification $specification)
    {
        $specification->delete();

        flash_message('Specification deleted successfully.', 'warning');

        return redirect()->route('admin.products.specification.index', $product);
    }
}
