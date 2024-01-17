<?php

namespace App\Http\Requests\Backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ClientProfileUpdateRequest extends FormRequest
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
            'username' => ['required', 'max:30', 'min:3'],
            'email' => ['required', 'max:255', 'email']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'min' => 'The :attribute must be at least :min.',
            'max' => 'The :attribute field may not be greater than :max characters.',
        ];
    }
}
