<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOptionGroupRequest;
use App\Http\Requests\CreateOptionRequest;
use App\Http\Requests\UpdateOptionGroupRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\Products;
use App\Models\ProductsOption;
use App\Models\ProductsOptionGroup;
use Illuminate\Http\Request;

class ProductsOptionsController extends Controller
{
    public function index(Products $product, ProductsOptionGroup $group)
    {
        return view('admin.products.option')->with([
            'options' => $group->items()->orderBy('title', 'ASC')->get(),
            'product' => $product,
            'group' => $group
        ]);
    }

    public function store(Products $product, ProductsOptionGroup $group, CreateOptionRequest $request)
    {
        $group->items()->create([
            'title' => $request->title
        ]);

        flash_message('Option item added successfully.');

        return redirect()->route('admin.products.option.items.index', [$product, $group]);
    }

    public function edit(Products $product, ProductsOptionGroup $group, ProductsOption $option)
    {
        return view('admin.products.option')->with([
            'options' => $group->items()->orderBy('title', 'ASC')->get(),
            'product' => $product,
            'group' => $group,
            'option' => $option
        ]);
    }

    public function update(
        Products $product,
        ProductsOptionGroup $group,
        ProductsOption $option,
        UpdateOptionRequest $request
    ) {
        $option->update($request->only('title'));

        flash_message('Option item updated successfully.');

        return redirect()->route('admin.products.option.items.index', [$product, $group]);
    }

    public function delete(Products $product, ProductsOptionGroup $group, ProductsOption $option)
    {
        $option->delete();

        flash_message('Option item deleted successfully.', 'warning');

        return redirect()->route('admin.products.option.items.index', [$product, $group]);
    }
}
