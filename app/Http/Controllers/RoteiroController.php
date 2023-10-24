<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoteiroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function materialPorSetor(string $id)
    {
        $materialSetor = Roteiro::select(Roteiro::raw("SUM(servicoExecutado.quantConcluido) as total"))
        ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
        ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('producao.id',$idProducao)->value('total');

        
    }

}
