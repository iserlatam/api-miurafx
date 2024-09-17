<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'radicado' => $this->radicado,
            'tipo_solicitud' => $this->tipo_solicitud,
            'estado_solicitud' => $this->estado_solicitud,
            'metodo_pago' => $this->metodo_pago,
            'fecha_solicitud' =>  date_format($this->created_at, 'Y-m-d'),
            'divisa' => $this->divisa,
            'cantidad' => $this->cantidad,
            'razon_rechazo' => $this->razon_rechazo,
            'documento' => $this->documento,
            'cliente_id' => $this->cliente_id,
            // 'cliente' => $this->cliente,
        ];
    }
}
