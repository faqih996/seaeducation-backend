<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DetailUser;

class UpdateDetailUserRequest extends FormRequest
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
            'birth_place' => ['nullable', 'string'],
            'birth_date' => ['nullable', 'date'],
            'about_me' => ['nullable', 'string'],
            'phone_number' => [
                'required',
                'regex:/^([0-9\s\+\(\)]*)$/',
                'max:14',
            ],
            'phone_number2' => [
                'required',
                'regex:/^([0-9\s\+\(\)]*)$/',
                'max:14',
            ],
            'address' => ['required', 'string'],
            'regency' => ['required', 'string'],
            'province' => ['required', 'string'],
            'zip_code' => ['required', 'string', 'max:5'],
            'country' => ['required', 'string'],
            'occupation' => ['nullable', 'string'],
            'skype' => ['nullable', 'string'],
            'gender' => ['required', 'string'],
            'marital' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'max:1024'],
        ];
    }
}