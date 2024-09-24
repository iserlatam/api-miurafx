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
            'fecha_creacion' => date_format($this->created_at, 'F, d. Y'),
            'ultimo_contacto' => date_format($this->ultimo_contacto, 'Y-m-d'),
            'observaciones' => $this->observaciones,
            'asesor' => [
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
