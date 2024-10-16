<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CuentaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CuentaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Paginar las cuentas
        $cuentas = Cuenta::paginate();

        // Retornar la vista con las cuentas y el índice de la página actual
        return view('cuenta.index', compact('cuentas'))
            ->with('i', ($request->input('page', 1) - 1) * $cuentas->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return View
     */
    public function create(): View
    {
        // Crear una nueva instancia de Cuenta
        $cuenta = new Cuenta();

        // Retornar la vista de creación con el objeto cuenta
        return view('cuenta.create', compact('cuenta'));
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param CuentaRequest $request
     * @return RedirectResponse
     */
    public function store(CuentaRequest $request): RedirectResponse
    {
        // Crear una nueva cuenta con los datos validados
        Cuenta::create($request->validated());

        // Redireccionar a la lista de cuentas con un mensaje de éxito
        return Redirect::route('cuentas.index')
            ->with('success', 'Cuenta creada exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        // Buscar la cuenta por ID
        $cuenta = Cuenta::findOrFail($id);

        // Retornar la vista de detalle de la cuenta
        return view('cuenta.show', compact('cuenta'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Buscar la cuenta por ID
        $cuenta = Cuenta::findOrFail($id);

        // Retornar la vista de edición con el objeto cuenta
        return view('cuenta.edit', compact('cuenta'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param CuentaRequest $request
     * @param Cuenta $cuenta
     * @return RedirectResponse
     */
    public function update(CuentaRequest $request, Cuenta $cuenta): RedirectResponse
    {
        // Actualizar la cuenta con los datos validados
        $cuenta->update($request->validated());

        // Redireccionar a la lista de cuentas con un mensaje de éxito
        return Redirect::route('cuentas.index')
            ->with('success', 'Cuenta actualizada exitosamente');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Buscar y eliminar la cuenta por ID
        Cuenta::findOrFail($id)->delete();

        // Redireccionar a la lista de cuentas con un mensaje de éxito
        return Redirect::route('cuentas.index')
            ->with('success', 'Cuenta eliminada exitosamente');
    }
}