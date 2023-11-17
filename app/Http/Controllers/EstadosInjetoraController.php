<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadosInjetora;

class EstadosInjetoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = EstadosInjetora::all();  
        if(empty($estados)){
            return ['msg'=>'Nenhum stado cadastrado'];
        }else{
            return $estados;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estadosInjetora = EstadosInjetora::create($request->all());
        return $estadosInjetora;
    }

    public function estadosInjetoraDia(Request $request)
    {
        // $request->dia
        $estadosInjetora = EstadosInjetora::select("estado","unixtime","id_maquina")
        ->whereDate('unixtime','2023-11-16')->get()->all();

        return $estadosInjetora;
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
