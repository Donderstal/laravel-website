<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\ProductsColors;
use Illuminate\Http\Request;

class ProductsColorsController extends Controller
{
    public function index()
    {
        return view('admin.products.colors')->with([
            'colors' => $this->getColorsList()
        ]);
    }

    public function store(CreateColorRequest $request)
    {
        ProductsColors::create($request->only('title'));

        flash_message('New color added successfully.');

        return redirect()->route('admin.products.colors.index');
    }

    public function edit(ProductsColors $color)
    {
        return view('admin.products.colors')->with([
            'colors' => $this->getColorsList(),
            'color' => $color
        ]);
    }

    public function update(ProductsColors $color, UpdateColorRequest $request)
    {
        $color->update($request->only('title'));

        flash_message('The color updated successfully.');

        return redirect()->route('admin.products.colors.index');
    }

    public function delete(ProductsColors $color)
    {
        $color->delete();

        flash_message('The color deleted successfully.', 'warning');

        return redirect()->route('admin.products.colors.index');
    }

    public function getColorsList()
    {
        return ProductsColors::orderBy('title', 'ASC')->get();
    }

}
