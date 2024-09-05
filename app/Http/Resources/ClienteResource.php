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
            'user' => UserResource::make($this->whenLoaded('user')),
            'seguimientos' => SeguimientoCollection::make($this->whenLoaded('seguimientos')),
        ];
    }
}
