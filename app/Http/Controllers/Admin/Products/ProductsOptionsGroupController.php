<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOptionGroupRequest;
use App\Http\Requests\UpdateOptionGroupRequest;
use App\Models\Products;
use App\Models\ProductsOptionGroup;
use Illuminate\Http\Request;

class ProductsOptionsGroupController extends Controller
{
    public function index(Products $product)
    {
        return view('admin.products.option_group')->with([
            'groups' => $product->options()->orderBy('title', 'ASC')->get(),
            'product' => $product
        ]);
    }

    public function store(Products $product, CreateOptionGroupRequest $request)
    {
        $product->options()->create([
            'title' => $request->title
        ]);

        flash_message('Option group added successfully.');

        return redirect()->route('admin.products.option.index', $product);
    }

    public function edit(Products $product, ProductsOptionGroup $group)
    {
        return view('admin.products.option_group')->with([
            'groups' => $product->options()->orderBy('title', 'ASC')->get(),
            'product' => $product,
            'group' => $group
        ]);
    }

    public function update(Products $product, ProductsOptionGroup $group, UpdateOptionGroupRequest $request)
    {
        $group->update($request->only('title'));

        flash_message('Option group updated successfully.');

        return redirect()->route('admin.products.option.index', $product);
    }

    public function delete(Products $product, ProductsOptionGroup $group)
    {
        $group->delete();

        flash_message('Option group deleted successfully.', 'warning');

        return redirect()->route('admin.products.option.index', $product);
    }
}
