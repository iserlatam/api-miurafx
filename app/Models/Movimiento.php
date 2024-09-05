<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movimiento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'radicado',
        'tipo_solicitud',
        'estado_solicitud',
        'metodo_pago',
        'fecha_solicitud',
        'divisa',
        'cantidad',
        'razon_rechazo',
        'documento',
        'cliente_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_solicitud' => 'date',
        'cliente_id' => 'integer',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
