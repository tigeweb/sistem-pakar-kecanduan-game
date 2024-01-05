<?php

namespace App\Http\Requests\Superadmin\Roles;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
        $rules = [
            'role' => [
                'required',
                'string',
                'max:15',
                'unique:roles,name,' . $this->route('role')
            ],
            'color' => [
                'required',
                'string',
                'max:7',
            ],
            'background_color' => [
                'required',
                'string',
                'max:7',
            ],
        ];

        return $rules;
    }
}
