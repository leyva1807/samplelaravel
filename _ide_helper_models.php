<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $titular_id
 * @property string $tipo_moneda
 * @property string|null $numero_cuenta
 * @property string|null $numero_tarjeta
 * @property string $tipo_cuenta
 * @property string $saldo_empresa
 * @property string $saldo_personal
 * @property int $estado
 * @property string|null $banco_asociado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $full_account_identifier
 * @property-read float $saldo_total
 * @property-read \App\Models\TitularTarjeta $titularTarjeta
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta active()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereBancoAsociado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereNumeroCuenta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereNumeroTarjeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereSaldoEmpresa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereSaldoPersonal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereTipoCuenta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereTipoMoneda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereTitularId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuenta whereUpdatedAt($value)
 */
	class Cuenta extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre
 * @property string $correo
 * @property string $telefono
 * @property string $direccion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cuenta> $cuentas
 * @property-read int|null $cuentas_count
 * @property-read string $full_address
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta query()
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TitularTarjeta whereUpdatedAt($value)
 */
	class TitularTarjeta extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $user_id
 * @property string $email
 * @property string|null $join_date
 * @property string|null $last_login
 * @property string|null $phone_number
 * @property string|null $status
 * @property string|null $role_name
 * @property string|null $avatar
 * @property string|null $position
 * @property string|null $department
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

