<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSpecificationRequest extends FormRequest
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

        // These variables will be used in the Rule function
        $product_id = $this->product->id;
        // We get the post request and the title
        $title = $this->post('title');
        // Will return a unique rule that will look for unique for the columns, title and product_id where
        // product id is the current product_id
        $unique_rule_for_product_title = Rule::unique('products_specification')->where(function ($query) use ($product_id, $title) {
            return $query->where('title', $title)
            ->where('product_id', $product_id);
        });
        return [
            'title' => $unique_rule_for_product_title,
            'value' => 'required'
        ];
    }
}
