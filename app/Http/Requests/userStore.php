<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'DPI' => 'required|numeric|min:13',
            'password' => 'required|string|min:8|max:65',
            'nit' => 'required|numeric|min:8',
            'address' => 'required|string|max:100',
            'names' => 'required|string|max:50',
            'username' => 'required|string|max:20'
        ];
    }
}
