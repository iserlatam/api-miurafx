<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvidersUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "CustomerID" => $this->id,
            "full_name" => $this->nombre_completo,
            "email" => $this->email,
            "phone" => $this->celular,
            "country" => $this->pais,
            "autologin_url" => "https://miurafx.com/iniciar-sesión"
// - deposit date (also filter from/to)
        ];
    }
}
