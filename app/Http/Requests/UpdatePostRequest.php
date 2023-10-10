<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required',
            'post_category_id' => 'required',
            'feature_image' => 'nullable|file|max:2024',
            'descriptions' => 'nullable',
            'status' => 'required',
            'name' => 'nullable',
            'file.*' => 'nullable|file|max:5000',
        ];
    }
}
