<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as AuthCanResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Model implements AuthCanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, CanResetPassword;

    // Filter scopes
    public function scopeStartsBetween(Builder $query, $start, $end)
    {
        return $query->whereBetween('created_at', [$start, $end]);
    }

    public function scopeStartsBefore(Builder $query, $date): Builder
    {
        return $query->where('created_at', '<=', $date);
    }

    public function scopeStartsAfter(Builder $query, $date): Builder
    {
        return $query->where('created_at', '>=', $date);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "email",
        "password",
        "nombre_completo",
        "dirección",
        "celular",
        "fecha_nacimiento",
        "etiqueta",
        "ciudad",
        "tipo_documento",
        "documento",
        "offerName",
        "offerWebsite",
        "comment",
        "campanna",
        "afiliador",
        "método_pago",
        "pais"
    ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function seguimientos(): HasMany
    {
        return $this->hasMany(Seguimiento::class);
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class);
    }
}
