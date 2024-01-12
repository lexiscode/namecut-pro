<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendUserResetLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // change it to "true"
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:users,email']
        ];

        //NB: The above explains syntax "exists:table-name,table-column"
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'email' => 'Invalid email format.',
        ];
    }
}
