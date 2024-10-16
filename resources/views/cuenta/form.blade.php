<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="titular_id" class="form-label">{{ __('Titular Id') }}</label>
            <input type="text" name="titular_id" class="form-control @error('titular_id') is-invalid @enderror" value="{{ old('titular_id', $cuenta?->titular_id) }}" id="titular_id" placeholder="Titular Id">
            {!! $errors->first('titular_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_moneda" class="form-label">{{ __('Tipo Moneda') }}</label>
            <input type="text" name="tipo_moneda" class="form-control @error('tipo_moneda') is-invalid @enderror" value="{{ old('tipo_moneda', $cuenta?->tipo_moneda) }}" id="tipo_moneda" placeholder="Tipo Moneda">
            {!! $errors->first('tipo_moneda', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_cuenta" class="form-label">{{ __('Numero Cuenta') }}</label>
            <input type="text" name="numero_cuenta" class="form-control @error('numero_cuenta') is-invalid @enderror" value="{{ old('numero_cuenta', $cuenta?->numero_cuenta) }}" id="numero_cuenta" placeholder="Numero Cuenta">
            {!! $errors->first('numero_cuenta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_tarjeta" class="form-label">{{ __('Numero Tarjeta') }}</label>
            <input type="text" name="numero_tarjeta" class="form-control @error('numero_tarjeta') is-invalid @enderror" value="{{ old('numero_tarjeta', $cuenta?->numero_tarjeta) }}" id="numero_tarjeta" placeholder="Numero Tarjeta">
            {!! $errors->first('numero_tarjeta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_cuenta" class="form-label">{{ __('Tipo Cuenta') }}</label>
            <input type="text" name="tipo_cuenta" class="form-control @error('tipo_cuenta') is-invalid @enderror" value="{{ old('tipo_cuenta', $cuenta?->tipo_cuenta) }}" id="tipo_cuenta" placeholder="Tipo Cuenta">
            {!! $errors->first('tipo_cuenta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saldo_empresa" class="form-label">{{ __('Saldo Empresa') }}</label>
            <input type="text" name="saldo_empresa" class="form-control @error('saldo_empresa') is-invalid @enderror" value="{{ old('saldo_empresa', $cuenta?->saldo_empresa) }}" id="saldo_empresa" placeholder="Saldo Empresa">
            {!! $errors->first('saldo_empresa', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saldo_personal" class="form-label">{{ __('Saldo Personal') }}</label>
            <input type="text" name="saldo_personal" class="form-control @error('saldo_personal') is-invalid @enderror" value="{{ old('saldo_personal', $cuenta?->saldo_personal) }}" id="saldo_personal" placeholder="Saldo Personal">
            {!! $errors->first('saldo_personal', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">{{ __('Estado') }}</label>
            <input type="text" name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', $cuenta?->estado) }}" id="estado" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="banco_asociado" class="form-label">{{ __('Banco Asociado') }}</label>
            <input type="text" name="banco_asociado" class="form-control @error('banco_asociado') is-invalid @enderror" value="{{ old('banco_asociado', $cuenta?->banco_asociado) }}" id="banco_asociado" placeholder="Banco Asociado">
            {!! $errors->first('banco_asociado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>