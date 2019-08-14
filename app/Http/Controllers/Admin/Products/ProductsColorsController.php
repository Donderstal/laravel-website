<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Models\ProductsColors;
use App\Models\Products;
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

    private function guardDelete(ProductsColors $color)
    {
        $products_with_color = Products::where('color_id', $color->id)->count();
        if ($products_with_color !== 0) {
            flash_message('Could not delete this color, because it is currently in use in one or more products.', 'error');
            return true;
        }
        return false;
    }

    public function delete(ProductsColors $color)
    {
        if($this->guardDelete($color)){
            return redirect()->route('admin.products.colors.index');
        }

        try {
            $color->delete();
            flash_message('The color deleted successfully.', 'warning');
        } catch (\Exception $e) {
            flash_message('Could not delete this color for unknown error', 'error');
            // TODO implement an exception handel
        }

        return redirect()->route('admin.products.colors.index');
    }

    public function getColorsList()
    {
        return ProductsColors::orderBy('title', 'ASC')->get();
    }

}
