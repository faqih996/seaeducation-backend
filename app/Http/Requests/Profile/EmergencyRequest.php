<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmergencyRequest extends FormRequest
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
            'family_name' => 'required|string',
            'user_id'=> 'nullable|exists:users,id',
            'relations' => 'required|string',
            'contact1' => 'required|string',
            'contact2' =>'nullable|string',
            'email' => 'nullable|email',
            'address' => 'required|string',
            'regencies' => 'required|string',
            'provinces' => 'required|string',
            'zip_code' => 'required|integer',
            'country' => 'required|string'
        ];
    }

}
