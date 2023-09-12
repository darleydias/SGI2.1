<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimento;

class SeguimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seguimento = Seguimento::paginate();  
        if(empty($seguimento)){
            return ['msg'=>'Nenhum seguimento cadastrado'];
        }else{
            return $seguimento;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return Seguimento::create($request->all());
        }catch (\Exception $e) {
            return "Nome não informado";       
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return Seguimento::findOrFail($id);
        }catch (\Exception $e) {
            return "seguimento não encontrado";       
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $seguimento = Seguimento::findOrFail($id);
            $seguimento->update($request->all());
            return ['msg'=>'seguimento atualizado'];
        }catch (\Exception $e) {
            return "seguimento não encontrado";       
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $seguimento = Seguimento::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id seguimento não existe '];
            }
            Seguimento::destroy($id);
            return ['msg'=>'seguimento '.$seguimento->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir seguimento '];
        }
    }
    /**
     * Display the specified resource.
     */
    public function clientes(string $id)
    {
        try{
            $seguimento = Seguimento::findOrFail($id);
            return $seguimento->clientes;
        }catch (\Exception $e) {
            return "seguimento não encontrado";       
        }   
    }
}  