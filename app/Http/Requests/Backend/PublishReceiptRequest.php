<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PublishReceiptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'numeric'],
            'receipt_file' => ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute field must be a number.',
            'receipt_file.image' => 'The uploaded file must be an image.',
            'receipt_file.mimes' => 'Only JPEG, PNG, JPG, GIF, and SVG files are allowed.',
            'receipt_file.max' => 'The image size must not exceed 2MB.',
        ];
    }
}
