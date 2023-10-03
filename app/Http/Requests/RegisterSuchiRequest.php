<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterSuchiRequest extends FormRequest
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
            'receipt_no' => ['required'],
            'receipt_amount' => ['required', 'integer']
        ];
    }

    public function attributes()
    {
        return [
            'receipt_no' => 'रसिद नम्बर',
            'receipt_amount' => 'रकम',
        ];
    }
}
