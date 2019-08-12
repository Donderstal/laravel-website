<?php

namespace App\Http\Controllers\Admin\Products;

use App\Facades\ImageUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\ProductsBrands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsBrandsController extends Controller
{
    public function index()
    {
        return view('admin.products.brands')->with([
            'brands' => $this->getBrandsName()
        ]);
    }

    public function store(CreateBrandRequest $request)
    {
        if ($request->hasFile('logo_file')) {
            $request->request->add(['logo' => basename(Storage::put('public', $request->logo_file))]);
        }

        ProductsBrands::create($request->only(['title', 'logo']));

        flash_message('New brand added successfully.');

        return redirect()->route('admin.products.brands.index');
    }

    public function edit(ProductsBrands $brand)
    {
        return view('admin.products.brands')->with([
            'brands' => $this->getBrandsName(),
            'brand' => $brand
        ]);
    }

    public function update(ProductsBrands $brand, UpdateBrandRequest $request)
    {
        if ($request->hasFile('logo_file')) {
            $request->request->add(['logo' => basename(Storage::put('public', $request->logo_file))]);

            if ($brand->logo) {
                if (ImageUtil::isExists($brand->logo)) {
                    Storage::delete('public/' . $brand->logo);
                }
            }

        }

        $brand->update($request->only(['title', 'logo']));

        flash_message('The brand updated successfully.');

        return redirect()->route('admin.products.brands.index');
    }

    public function delete(ProductsBrands $brand)
    {
        try {
            $brand->delete();
            flash_message('The brand deleted successfully.', 'warning');
        } catch (\Exception $e) {
            if ($e->errorInfo[1] == 1451) {
                flash_message('Could not delete this brand, because it is currently in use in one or more products.', 'error');
            }
        }

        return redirect()->route('admin.products.brands.index');
    }

    public function getBrandsName()
    {
        return ProductsBrands::orderBy('title', 'ASC')->get();
    }

    public function getBrandNamesArray() {
        $brands = $this->getBrandsName();
        $number_of_brands = count($brands);
        for ( $i = 0; $i < $number_of_brands; $i++) {
            $brands_list[] = $brands[$i]['title'];
        }
        return $brands_list;
    }
}
