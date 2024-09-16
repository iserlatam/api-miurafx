<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeguimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'fecha_creacion' => $this->created_at,
            'ultimo_contacto' => $this->ultimo_contacto,
            'observaciones' => $this->observaciones,
            'usuario' => [
                "id" => $this->user->id,
                "nombre" => $this->user->nombre_completo,
            ],
            'cliente' => [
                "id" => $this->cliente->id,
                "nombre" => $this->cliente->user->nombre_completo,
            ],
        ];
    }
}
