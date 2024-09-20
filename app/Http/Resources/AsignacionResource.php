<?php

namespace App\Http\Resources;

use App\Models\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsignacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function getUltimoSeguimiento($cliente)
    {
        $ultimoSeguimiento = $cliente->seguimientos()
            ->orderBy('created_at', 'desc')
            ->first();

        if ($ultimoSeguimiento) {
            return $ultimoSeguimiento;
        } else {
            return "No existe un seguimiento para este cliente aún";
        }
    }

    public function toArray(Request $request): array
    {
        // $ultimoSeguimiento = Seguimiento::where('cliente_id', $this->cliente_id)
        //     ->orderBy('created_at', 'desc')
        //     ->first();

        return [
            // CLIENTE ID
            "asignacion_id" => $this->id,
            "cliente_id" => $this->cliente_id,
            "nombre_completo" => $this->cliente->user->nombre_completo,
            "estado" => $this->cliente->estado,
            "accesor_id" => $this->user ? $this->user->id : 'No asignado', // ESTE USUARIO ASIGNADO SOLO DEBE ACCERSE UNA VEZ SE LE ASIGNE UN ACCESO
            "accesor_nombre" => $this->user ? $this->user->nombre_completo : 'No asignado', // ESTE USUARIO ASIGNADO SOLO DEBE ACCERSE UNA VEZ SE LE ASIGNE UN ACCESO
            "asignacion" => $this->asignacion,
            "email" => $this->cliente->user->email,
            "celular" => $this->cliente->user->celular,
            "pais" => $this->cliente->user->pais,
            "fase" => $this->cliente->fase,
            "origen" => $this->cliente->origen,
            "fecha_creacion" => date_format($this->created_at, 'Y-m-d'),
            "ultimo_contacto" => $this->getUltimoSeguimiento($this->cliente),
            "ultimo_seguimiento" => $this->getUltimoSeguimiento($this->cliente),
        ];
    }
}
