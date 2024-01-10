<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JenisPerilakuRequest extends FormRequest
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
            'kode_jenis' => ['required', 'string', 'max:10'],
            'nama_jenis' => ['required', 'string', 'max:255'],
            'solusi' => ['required', 'string', 'max:100'],
            'keterangan_solusi' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nama_jenis' => 'jenis perilaku',
        ];
    }
}
