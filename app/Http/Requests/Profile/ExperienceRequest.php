<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'name' => 'required|string',
            'base'=> 'required|string',
            'position'=> 'required|string',
            'job_title'=> 'required|string',
            'start_of_contract'=> 'required|date',
            'end_of_contract'=> 'required|date',
            'address'=> 'required|string',
            'regencies'=> 'required|string',
            'provinces'=> 'required|string',
            'zip_code'=> 'required|string',
            'country'=> 'required|string',
            'spv_name'=> 'required|string',
            'institution_phone'=> 'required|string',
            'job_descriptions'=> 'required|string',
            'certificate' => 'nullable|image'
        ];
    }

}
