<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserExcelRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'file' => 'required|mimes:xlsx,csv'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'file.required' => 'El archivo es obligatorio.',
    //         'file.mimes' => 'Solo se permiten archivos de tipo xlsx o csv.',
    //         'file.max' => 'El tamaño máximo permitido es de 2MB.',
    //     ];
    // }
}
