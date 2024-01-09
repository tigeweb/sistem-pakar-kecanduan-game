<?php

namespace App\Http\Requests\Superadmin;

use Illuminate\Foundation\Http\FormRequest;

class RolePermissionsRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            $rules = [
                'role' => 'required|unique:role_has_permissions,role_id',
                'permissions' => 'required',
                'akses_menu' => 'required',
            ];
        } else {
            $rules = [
                'permissions' => 'required',
                'akses_menu' => 'required',
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'permissions' => 'izin akses',
        ];
    }
}
