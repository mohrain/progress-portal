<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillSuggestionRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'nullable',
            'contact_number' => 'required',
            'address' => 'required',
            // 'subject' => 'required',
            // 'message' => 'required',
            'file' => 'nullable|file|max:2000',
            'section.*' => "nullable",
            'sub_section.*' => "nullable",
            'sec.*' => "nullable",
            'current_arrangement.*' => "nullable",
            'procedure_of_amendment.*' => "nullable",
            'reason.*' => "nullable",
        ];
    }
}
