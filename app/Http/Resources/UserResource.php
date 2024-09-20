<?php

namespace App\Http\Resources;

use App\Http\Controllers\Helpers\HandleKeysHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role' => $this->roles->pluck('name'),
            'nombre_completo' => $this->nombre_completo,
            'dirección' => $this->dirección,
            'celular' => $this->celular,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'etiqueta' => $this->etiqueta,
            'ciudad' => $this->ciudad,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'método_pago' => $this->método_pago,
            'pais' => $this->pais,
            'cliente_id' => $this->cliente ? $this->cliente->id : 'no existe un cliente asociado a este usuario',
            'saldo' => $this->cliente->saldo ?? "No tiene habilitada esta opción",
            'campanna' => $this->campanna,
            'afiliador' => $this->afiliador,
            'deposito_url' => $this->cliente
                ? HandleKeysHelper::getClientKeyUrl($this->cliente->id)
                : 'no existe un cliente asociado a este usuario',
            'created_at' => date_format($this->created_at, 'Y-m-d'),
            'updated_at' => $this->updated_at,
        ];
    }
}
