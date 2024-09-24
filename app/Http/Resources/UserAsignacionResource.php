<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAsignacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "cliente_id" => $this->cliente->user->id ?? 'No asignado', // ESTE USUARIO ASIGNADO SOLO DEBE ACCERSE UNA VEZ SE LE ASIGNE UN ACCESO
            "nombre_completo" => $this->cliente->user->nombre_completo ?? 'No asignado',
            "accesor_id" => $this->user->id ?? 'No asignado',
            "accesor_nombre" => $this->user->nombre_completo ?? 'No asignado',
        ];
    }
}
