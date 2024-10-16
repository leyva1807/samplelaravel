<?php

namespace App\Http\Controllers;

use App\Models\TitularTarjeta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TitularTarjetaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TitularTarjetaController extends Controller
{
    /**
     * Muestra una lista de los recursos.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // Paginar los titulares de tarjetas
        $titularTarjetas = TitularTarjeta::paginate();

        // Retornar la vista con los titulares de tarjetas y el índice de la página actual
        return view('titular-tarjeta.index', compact('titularTarjetas'))
            ->with('i', ($request->input('page', 1) - 1) * $titularTarjetas->perPage());
    }

    /**
     * Muestra el formulario para crear un nuevo recurso.
     *
     * @return View
     */
    public function create(): View
    {
        // Crear una nueva instancia de TitularTarjeta
        $titularTarjeta = new TitularTarjeta();

        // Retornar la vista de creación con el objeto titularTarjeta
        return view('titular-tarjeta.create', compact('titularTarjeta'));
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento.
     *
     * @param TitularTarjetaRequest $request
     * @return RedirectResponse
     */
    public function store(TitularTarjetaRequest $request): RedirectResponse
    {
        // Crear un nuevo titular de tarjeta con los datos validados
        TitularTarjeta::create($request->validated());

        // Redireccionar a la lista de titulares de tarjetas con un mensaje de éxito
        return Redirect::route('titular-tarjetas.index')
            ->with('success', 'Titular de Tarjeta creado exitosamente.');
    }

    /**
     * Muestra el recurso especificado.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        // Buscar el titular de tarjeta por ID
        $titularTarjeta = TitularTarjeta::findOrFail($id);

        // Retornar la vista de detalle del titular de tarjeta
        return view('titular-tarjeta.show', compact('titularTarjeta'));
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        // Buscar el titular de tarjeta por ID
        $titularTarjeta = TitularTarjeta::findOrFail($id);

        // Retornar la vista de edición con el objeto titularTarjeta
        return view('titular-tarjeta.edit', compact('titularTarjeta'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param TitularTarjetaRequest $request
     * @param TitularTarjeta $titularTarjeta
     * @return RedirectResponse
     */
    public function update(TitularTarjetaRequest $request, TitularTarjeta $titularTarjeta): RedirectResponse
    {
        // Actualizar el titular de tarjeta con los datos validados
        $titularTarjeta->update($request->validated());

        // Redireccionar a la lista de titulares de tarjetas con un mensaje de éxito
        return Redirect::route('titular-tarjetas.index')
            ->with('success', 'Titular de Tarjeta actualizado exitosamente');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        // Buscar y eliminar el titular de tarjeta por ID
        TitularTarjeta::findOrFail($id)->delete();

        // Redireccionar a la lista de titulares de tarjetas con un mensaje de éxito
        return Redirect::route('titular-tarjetas.index')
            ->with('success', 'Titular de Tarjeta eliminado exitosamente');
    }
}