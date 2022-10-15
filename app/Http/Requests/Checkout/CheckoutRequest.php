<?php

namespace App\Http\Requests\Checkout;

use App\Model\Checkout;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class CheckoutRequest extends FormRequest
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
            'card_number' => ['string', 'max:25'],
            'expired' => ['required', 'date'],
            'cvv' => ['required', 'string', 'max:255'],
            'is_paid' => ['required', 'string', 'max:255'],
        ];
    }
}