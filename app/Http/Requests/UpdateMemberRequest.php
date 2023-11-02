<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'parliamentary_party_id' => 'required',
            'election_id' => 'required',
            'election_process' => 'required',
            'election_district' => 'required',
            'election_area' => 'nullable',
            'designation' => 'nullable',
            'name' => 'required',
            'name_english' => 'required',
            'gender' => 'required',
            'dob' => 'nullable',
            'birth_place' => 'nullable',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'resident_contact_numbe' => 'nullable',
            'permanent_address_district' => 'nullable',
            'permanent_address' => 'nullable',
            'temporary_address_district' => 'nullable',
            'temporary_address' => 'nullable',
            'father_name' => 'nullable',
            'mother_name' => 'nullable',
            'spouse_name' => 'nullable',
            'child' => 'nullable',
            'education' => 'nullable',
            'religion' => 'nullable',
            'mother_tongue' => 'nullable',
            'descriptions' => 'nullable',
            'profile' => 'nullable|file|max:2024',
        ];
    }
}
