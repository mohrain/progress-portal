<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficeBearerRequest extends FormRequest
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
            'election_id' => 'required',
            'designation' => 'nullable',
            // 'office_bearer_designation_id' => 'required',
            // 'ward_number' => 'nullable|integer',
            'member_id' => 'required',
            'start' => 'required',
            'end' => 'nullable',
        ];
    }
}
