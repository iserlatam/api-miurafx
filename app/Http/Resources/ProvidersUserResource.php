<?php

namespace App\Http\Resources;

use App\Http\Controllers\Helpers\HandleKeysHelper;
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
            'offerName' => $this->offerName,
            'offerWebsite' => $this->offerWebsite,
            'comment' => $this->comment,
            'afiliador' => $this->afiliador,
            'saleStatus' => $this->cliente ? $this->cliente->estado : 'No associated accessor for this user',
            // 'ftd_movements' => $this->cliente && $this->cliente->movimientos && !$this->cliente->movimientos->isEmpty() ? [
            //     'radicado' => $this->cliente->movimientos->radicado,
            //     'tipo_solicitud' => $this->cliente->movimientos->tipo_solicitud,
            //     'estado_solicitud' => $this->cliente->movimientos->estado_solicitud,
            //     'metodo_pago' => $this->cliente->movimientos->metodo_pago,
            //     'fecha_solicitud' => date_format($this->cliente->movimientos->created_at, 'Y-m-d'),
            //     'divisa' => $this->cliente->movimientos->divisa,
            //     'cantidad' => $this->cliente->movimientos->cantidad,
            //     'razon_rechazo' => $this->cliente->movimientos->razon_rechazo,
            //     'documento' => $this->cliente->movimientos->documento,
            //     'cliente_id' => $this->cliente->movimientos->cliente_id,
            // ] : 'No movements associated yet',
            'ftd_movements' => $this->cliente ? $this->cliente->movimientos : 'No movements associated yet',
            "autologin_url" => $this->cliente
                ? HandleKeysHelper::getClientKeyUrl($this->cliente->id)
                : 'no existe un cliente asociado a este usuario',
            // - deposit date (also filter from/to)
        ];
    }
}
