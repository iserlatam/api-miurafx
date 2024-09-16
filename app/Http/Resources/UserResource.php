<?php

namespace App\Http\Resources;

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
            'saldo' => $this->cliente->saldo ?? 0,
            // 'fase' => $this->cliente ? $this->cliente->fase : 'no existe un cliente asociado a este usuario',
            // 'origen' => $this->cliente ? $this->cliente->origen : 'no existe un cliente asociado a este usuario',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
