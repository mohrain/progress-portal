<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'designation' => 'required',
            'branch' => 'nullable',
            'name' => 'required',
            'name_english' => 'required',
            'gender' => 'required',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'dob' => 'required',
            'education' => 'nullable',
            'permanent_address_district' => 'nullable',
            'permanent_address' => 'nullable',
            'temporary_address_district' => 'nullable',
            'temporary_address' => 'nullable',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'spouse_name' => 'nullable',
            'child' => 'nullable',
            'religion' => 'nullable',
            'mother_tongue' => 'nullable',
            'descriptions' => 'nullable',
            'profile' => 'nullable|file|max:2024',
        ];
    }
}
