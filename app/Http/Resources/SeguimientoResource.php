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
            'ultimo_contacto' => $this->ultimo_contacto,
            'observaciones' => $this->observaciones,
            'cliente_id' => $this->cliente_id,
            'user_id' => $this->user_id,
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
