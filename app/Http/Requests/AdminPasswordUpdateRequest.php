<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class AdminPasswordUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8']
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function($validator){
            if(!Hash::check($this->current_password, Auth::guard('admin')->user()->password)){
                $validator->errors()->add('current_password', __('old password doesn\'t match'));
            }
        });
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'min' => 'The :attribute must be at least :min.',
        ];
    }
}
