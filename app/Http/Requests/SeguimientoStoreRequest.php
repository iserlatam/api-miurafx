<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoStoreRequest extends FormRequest
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
            'ultimo_contacto' => ['required', 'date'],
            'observaciones' => ['required', 'string'],
            'cliente_id' => ['required', 'integer', 'exists:clientes,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
