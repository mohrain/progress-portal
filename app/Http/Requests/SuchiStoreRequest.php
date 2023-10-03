<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuchiStoreRequest extends FormRequest
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
            'name' => ['required'],
            'address' => ['required'],
            'contact_person' => ['required'],
            'contact' => ['required'],
            'email' => ['nullable'],
            'mobile' => ['required'],
            'suchi_type_id' => ['required', 'exists:suchi_types,id'],
            'product_type' => ['required'],

            'receipt_no' => auth()->check() && referer_route_match(route('suchi.create'))
                ? ['required'] : '',
            'receipt_amount' => auth()->check() && referer_route_match(route('suchi.create'))
                ? ['required', 'integer'] : '',

            'reg_cert' => ['nullable', 'max:500'],
            'renew_cert' => ['nullable', 'max:500'],
            'pan_cert' => ['nullable', 'max:500'],
            'tax_cert' => ['nullable', 'max:500'],
            'license_cert' => ['nullable', 'max:500'],
            'receipt' => ['nullable', 'max:500'],
        ];
    }
}
