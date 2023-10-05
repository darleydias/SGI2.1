<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicador;

class IndicadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Indicador::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Indicador::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Indicador::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indicador = Indicador::findOrFail($id);
        return $indicador->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Indicador::destroy($id);
    }
}
