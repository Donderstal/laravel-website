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
            'firstname.required' => 'Vul uw voornaam in',
            'lastname.required'  => 'Vul uw achternaam in',
            'email.required'   => 'Vul uw emailadres in',
            'email.email'   => 'Vul een geldig email adres in',
            'telephone.regex'     => 'Vul een geldig telefoonnummer in',
            'subject.required'     => 'Vul een onderwerp in',
            'textblock.required'     => 'Vul uw vragen en opmerkingen in',
            'voorwaarden.required'     => 'U moet akkoord met de voorwaarden'
        ];
    }
}
