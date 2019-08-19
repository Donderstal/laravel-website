<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
        'firstname'    => 'required',
        'lastname'   => 'required',
        'email'   => 'required|email',
        'telephone' => 'nullable|regex:/^\+?\d*$/',
        'subject'     => 'required',
        'textblock'     => 'required',
        'voorwaarden'     => 'required|boolean'
      ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'A first name is required',
            'lastname.required'  => 'A last name is required',
            'email.required'   => 'Email is Required',
            'email.email'   => 'Email must be valid',
            'telephone.regex'     => 'Not valid telephone number',
            'subject.required'     => 'Subject is required',
            'textblock.required'     => 'Message is required',
            'voorwaarden.required'     => 'You have to aggree to the conditions'
        ];
    }
}
