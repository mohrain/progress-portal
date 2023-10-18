<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
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
            'bill_type_id' => 'required',
            'name' => 'required',
            'entry_number' => 'required',
            'entry_date' => 'required',
            'year' => 'required',
            'member_id' => 'required',
            'ministry_id' => 'required',
            'suggestion_in_the_bill' => 'required',
            'convention' => 'required',
            'gov_non_gov' => 'required',
            'original_amendment' => 'required',
            'bill_category_id' => 'required',
            'distribution_to_members_date' => 'nullable',
            'representative_presented_in_assembly_date' => 'nullable',
            'general_discussion_date' => 'nullable',
            'weekly_in_assembly_discussion_date' => 'nullable',
            'weekly_in_committee_discussion_date' => 'nullable',
            'committee_report_submission_date' => 'nullable',
            'passed_by_assembly_date' => 'nullable',
            'assembly_rejected_date' => 'nullable',
            'repassed_date' => 'nullable',
            'authentication_date' => 'nullable',
            'status' => 'nullable',
            'entry_bill_file' => 'nullable|file|max:5000',
            'certification_bill_file' => 'nullable|file|max:5000',
            'descriptions' => 'nullable',
        ];
    }
}
