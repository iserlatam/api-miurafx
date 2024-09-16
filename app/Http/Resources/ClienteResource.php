<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'estado' => $this->estado,
            'fase' => $this->fase,
            'origen' => $this->origen,
            'user_id' => $this->user_id,
            'saldo' => $this->saldo,
            // 'user' => UserResource::make($this->whenLoaded('user')),
            "nombre_completo" => $this->user->nombre_completo,
            'usuario' => [
                'id' => $this->user_id,
                "nombre_completo" => $this->user->nombre_completo,
                "email" => $this->user->email,
                "celular" => $this->user->celular,
                "pais" => $this->user->pais,
                "estado" => $this->user->estado,
                "etiqueta" => $this->user->etiqueta,
            ],
            // 'seguimientos' => SeguimientoCollection::make($this->whenLoaded('seguimientos')),
            // 'seguimientos' => $this->seguimientos,
            // "movimientos" => $this->movimientos,
        ];
    }
}
