<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asignacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'user_id',
        // 'seguimiento_id',
        'asignacion',
    ];

    protected $casts = [
        'cliente_id' => 'integer',
        'user_id' => 'integer',
        // 'seguimiento_id' => 'integer',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function asignacion(): BelongsTo
    {
        return $this->belongsTo(Asignacion::class);
    }
}
