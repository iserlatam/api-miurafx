<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovimientoUpdateRequest extends FormRequest
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
            'radicado' => ['required', 'string'],
            'tipo_solicitud' => ['required', 'string'],
            'estado_solicitud' => ['required', 'string'],
            'metodo_pago' => ['required', 'string'],
            'fecha_solicitud' => ['required', 'date'],
            'divisa' => ['required', 'string'],
            'cantidad' => ['required', 'string'],
            'razon_rechazo' => ['required', 'string'],
            'documento' => ['required', 'string'],
            'cliente_id' => ['required', 'integer', 'exists:clientes,id'],
        ];
    }
}
