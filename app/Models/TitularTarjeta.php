<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuenta;


class TitularTarjeta extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'direccion',
        'tarjeta_id',
    ];

    /**
     * Número de registros por página para la paginación.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * Relación: Un titular puede tener múltiples cuentas bancarias.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentas()
    {
        // Definir la relación uno a muchos entre TitularTarjeta y Cuenta
        return $this->hasMany(Cuenta::class, 'titular_id', 'id');
    }

    /**
     * Obtener la dirección completa del titular.
     *
     * @return string
     */
    public function getFullAddressAttribute(): string
    {
        // Retornar la dirección completa formateada
        return "{$this->direccion}, {$this->nombre}";
    }
}