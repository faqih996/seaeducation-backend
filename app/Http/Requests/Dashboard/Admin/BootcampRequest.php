<?php

namespace App\Http\Requests\Dashboard\Admin;

use App\Models\Bootcamp;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class BootcampRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'user_id' => ['string', 'max:255'],
            'location_id' => ['required', 'integer', 'max:255'],
            'duration' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'integer'],
            'camp_regis_date' => ['nullable', 'date'],
            'camp_start' => ['nullable', 'date'],
        ];
    }
}