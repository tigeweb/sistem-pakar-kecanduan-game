<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GejalaRequest extends FormRequest
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
            'kode_gejala' => ['required', 'string', 'max:10'],
            'jenis_perilaku_id' => ['required', 'exists:jenis_perilakus,id'],
            'deskripsi_gejala' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes(): array
    {
        return [
            'jenis_perilaku_id' => 'jenis perilaku',
        ];
    }
}
