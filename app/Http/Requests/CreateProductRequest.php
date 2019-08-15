<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'brand_id' => 'required|exists:products_brands,id',
            'model_id' => 'required|exists:products_models,id',
            'price' => 'required|numeric',
            'mileage' => 'required|numeric',
            'year' => 'required|numeric|min:1900|max:' . now()->format('Y'),
            'fuel' => 'required|in:' . implode(',',array_keys(config('site.products.fuel_types'))),
            'transmission' => 'required|in:' . implode(',',array_keys(config('site.products.transmission_types'))),
            'color_id' => 'required|exists:products_colors,id',
            'cover_file' => 'max:' . config('site.products.image.file_size') . '|mimes:jpg,jpeg,png',
            'is_coming_soon' => 'boolean',
            'enable' => 'boolean'

        ];
    }
}
