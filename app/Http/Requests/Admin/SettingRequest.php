<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'val' => [
                'required',
            ],
            'tipe' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'val.required' => 'Data wajib diisi!',
            'tipe.required' => 'Data wajib diisi!',
        ];
    }
}
