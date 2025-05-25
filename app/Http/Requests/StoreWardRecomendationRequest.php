<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWardRecomendationRequest extends FormRequest
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
            //

            'fiscal_year_id' => 'required|exists:fiscal_years,id',
            // 'ward_id' => 'required|exists:wards,id',
            'month' => 'required|integer|min:1|max:12',
            'recommendations' => 'required|array',
        ];
    }
}
