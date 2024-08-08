<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:30'],
            'address_1' => ['required', 'string', 'max:255'],
            'address_2' => ['string', 'max:255'],
            'postcode' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:255'],
            'state'=> ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ];
    }
}
