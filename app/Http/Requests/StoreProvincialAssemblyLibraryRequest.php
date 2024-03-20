<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProvincialAssemblyLibraryRequest extends FormRequest
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
            'entry_no' => 'required',
            'title' => 'required',
            'author' => 'required',
            'cover_image' => 'nullable|file|max:2024',
            'descriptions' => 'nullable',
            'status' => 'required',
            'file.*' => 'nullable|file|max:5000',
        ];
    }
}
