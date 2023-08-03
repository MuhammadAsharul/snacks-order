<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[^\d]+$/',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Nama harus mengandung setidaknya satu huruf.',
            'email.regex' => 'Format email tidak valid.',
        ];
    }
}
