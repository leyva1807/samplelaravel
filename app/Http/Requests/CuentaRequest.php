<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'titular_id' => 'required',
			'tipo_moneda' => 'required',
			'numero_cuenta' => 'string',
			'numero_tarjeta' => 'string',
			'tipo_cuenta' => 'required',
			'saldo_empresa' => 'required',
			'saldo_personal' => 'required',
			'estado' => 'required',
        ];
    }
}
