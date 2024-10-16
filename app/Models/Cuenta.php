<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TitularTarjeta;

class Cuenta extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titular_id',
        'numero_tarjeta',
        'numero_cuenta',
        'tipo_moneda',
        'tipo_cuenta',
        'banco_asociado',
        'saldo_empresa',
        'saldo_personal',
        'estado',
    ];

    /**
     * Relación: Una cuenta pertenece a un titular.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function titularTarjeta()
    {
        // Definir la relación entre Cuenta y TitularTarjeta (muchos a uno)
        return $this->belongsTo(TitularTarjeta::class, 'titular_id', 'id');
    }

    /**
     * Relación: Una cuenta puede tener múltiples detalles de balance mensual.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cuentaDetallesMes()
    {
        // Definir la relación uno a muchos entre Cuenta y CuentaDetallesMes
        return $this->hasMany(CuentaDetallesMes::class, 'cuenta_id', 'id');
    }

    /**
     * Relación: Una cuenta puede tener múltiples detalles de operaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallesOperaciones()
    {
        // Definir la relación uno a muchos entre Cuenta y DetallesOperaciones
        return $this->hasMany(DetallesOperaciones::class, 'cuenta_id', 'id');
    }

    /**
     * Obtener el identificador completo de la cuenta (banco + número de cuenta).
     *
     * @return string
     */
    public function getFullAccountIdentifierAttribute(): string
    {
        // Retornar el identificador completo concatenando el banco y el número de cuenta
        return "{$this->banco_asociado} - {$this->numero_cuenta}";
    }

    /**
     * Alcance para filtrar cuentas activas.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        // Filtrar cuentas cuyo estado es activo
        return $query->where('estado', true);
    }

    /**
     * Obtener el saldo total de la cuenta (personal + empresa).
     *
     * @return float
     */
    public function getSaldoTotalAttribute(): float
    {
        // Calcular y retornar la suma de los saldos personal y de empresa
        return $this->saldo_empresa + $this->saldo_personal;
    }

    /**
     * Verificar si la cuenta tiene fondos suficientes.
     *
     * @param float $monto
     * @return bool
     */
    public function tieneFondosSuficientes(float $monto): bool
    {
        // Verificar si el saldo total de la cuenta es suficiente para la operación solicitada
        return $this->getSaldoTotalAttribute() >= $monto;
    }
}