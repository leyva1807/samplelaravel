@extends('layouts.app')

@section('template_title')
    {{ $cuenta->name ?? __('Show') . " " . __('Cuenta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Cuenta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('cuentas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Titular Id:</strong>
                                    {{ $cuenta->titular_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Moneda:</strong>
                                    {{ $cuenta->tipo_moneda }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numero Cuenta:</strong>
                                    {{ $cuenta->numero_cuenta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numero Tarjeta:</strong>
                                    {{ $cuenta->numero_tarjeta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tipo Cuenta:</strong>
                                    {{ $cuenta->tipo_cuenta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Saldo Empresa:</strong>
                                    {{ $cuenta->saldo_empresa }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Saldo Personal:</strong>
                                    {{ $cuenta->saldo_personal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $cuenta->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Banco Asociado:</strong>
                                    {{ $cuenta->banco_asociado }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
