@extends('layouts.app')

@section('template_title')
    {{ __('Listado de Titulares de Tarjetas') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div>
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                    {{ __('Listado de Titulares de Tarjetas') }}
                </h2>
                <div class="flex">
                    <div class="flex items-center" x-data="{ isInputActive: false }">
                        <label class="block">
                            <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                class="px-2 text-right transition-all duration-100 bg-transparent form-input placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                placeholder="Buscar aquí..." type="text">
                        </label>
                        <button @click="isInputActive = !isInputActive"
                            class="p-0 ml-2 rounded-full btn size-8 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-4.5" fill="none" viewbox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-5 card">
                <div class="min-w-full overflow-x-auto is-scrollbar-hidden">
                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    #</th>
                                <th
                                    class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Nombre</th>
                                <th
                                    class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Correo</th>
                                <th
                                    class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Teléfono</th>
                                <th
                                    class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Acciones</th>
                                <th
                                    class="px-4 py-3 font-semibold uppercase whitespace-nowrap bg-slate-200 text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                    Ver Cuentas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($titularTarjetas as $titular)
                                <tr class="border-transparent border-y">
                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $titular->id }}</td>
                                    <td
                                        class="px-4 py-3 font-medium whitespace-nowrap text-slate-700 dark:text-navy-100 sm:px-5">
                                        {{ $titular->nombre }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $titular->correo }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">{{ $titular->telefono }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                        <!-- Botón para editar el titular de tarjeta -->
                                        <a href="{{ route('titular-tarjetas.edit', $titular->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <!-- Formulario para eliminar el titular de tarjeta -->
                                        <form action="{{ route('titular-tarjetas.destroy', $titular->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este titular?')">
                                                <i class="fa fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                        <!-- Botón para ver/ocultar cuentas asociadas -->
                                        <button @click="expanded = !expanded"
                                            class="p-0 rounded-full btn size-8 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                            data-bs-toggle="collapse" data-bs-target=".cuentas-{{ $titular->id }}"
                                            aria-expanded="false">
                                            <i :class="expanded && '-rotate-180'"
                                                class="text-sm transition-transform fas fa-chevron-down"></i> Ver Cuentas
                                        </button>
                                    </td>
                                </tr>
                                <!-- Fila colapsable para mostrar las cuentas asociadas al titular -->
                                <tr
                                    class="collapse cuentas-{{ $titular->id }} border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                    <td colspan="100" class="p-0">
                                        <div class="px-4 pb-4 sm:px-5">
                                            <h5 class="text-lg font-semibold text-slate-700 dark:text-navy-100">Cuentas
                                                Asociadas</h5>
                                            @if ($titular->cuentas->isEmpty())
                                                <p class="text-muted">No hay cuentas asociadas para este titular.</p>
                                            @else
                                                <div class="min-w-full overflow-x-auto is-scrollbar-hidden">
                                                    <table class="w-full text-left is-hoverable">
                                                        <thead>
                                                            <tr
                                                                class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    #</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Número de Tarjeta</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Número de Cuenta</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Tipo de Moneda</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Tipo de Cuenta</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Banco Asociado</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Saldo Empresa</th>
                                                                <th
                                                                    class="px-3 py-3 font-semibold uppercase whitespace-nowrap text-slate-800 dark:text-navy-100 lg:px-5">
                                                                    Saldo Personal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($titular->cuentas as $cuenta)
                                                                <tr
                                                                    class="border-transparent border-y border-b-slate-200 dark:border-b-navy-500">
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ $cuenta->id }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ $cuenta->numero_tarjeta }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ $cuenta->numero_cuenta }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ $cuenta->tipo_moneda }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ $cuenta->tipo_cuenta }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ $cuenta->banco_asociado }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ number_format($cuenta->saldo_empresa, 2) }}</td>
                                                                    <td class="px-4 py-3 whitespace-nowrap sm:px-5">
                                                                        {{ number_format($cuenta->saldo_personal, 2) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
