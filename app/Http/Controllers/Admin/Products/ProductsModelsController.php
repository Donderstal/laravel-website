<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateModelRequest;
use App\Http\Requests\UpdateModelRequest;
use App\Model\ProductsBrands;
use App\Models\ProductsModels;
use Illuminate\Http\Request;

class ProductsModelsController extends Controller
{
    public function index(ProductsBrands $brand)
    {
        return view('admin.products.models')->with([
            'brand' => $brand,
            'models' => $this->getModelsName()
        ]);
    }

    public function store(ProductsBrands $brand, CreateModelRequest $request)
    {
        $brand->models()->create($request->only(['title']));

        flash_message('New model for <strong>' . $brand->title . '</strong> added successfully.');

        return redirect()->route('admin.products.brands.models.index', $brand->id);
    }

    public function edit(ProductsBrands $brand, ProductsModels $model)
    {
        return view('admin.products.models')->with([
            'models' => $this->getModelsName(),
            'brand' => $brand,
            'model' => $model
        ]);
    }

    public function update(ProductsBrands $brand, ProductsModels $model, UpdateModelRequest $request)
    {
        $model->update($request->only(['title']));

        flash_message('The model updated successfully.');

        return redirect()->route('admin.products.brands.models.index', $brand->id);
    }

    public function delete(ProductsBrands $brand, ProductsModels $model)
    {
        $model->delete();

        flash_message('The model deleted successfully.', 'warning');

        return redirect()->route('admin.products.brands.models.index', $brand->id);
    }

    public function getModelsName()
    {
        return ProductsModels::orderBy('title', 'ASC')->get();
    }
}
