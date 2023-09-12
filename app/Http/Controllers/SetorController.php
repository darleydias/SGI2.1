<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setores = Setor::all();  
        if(empty($setores)){
            return ['msg'=>'Nenhum setor cadastrado'];
        }else{
            return $setores;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return Setor::create($request->all());
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
            return Setor::findOrFail($id);
        }catch (\Exception $e) {
            return "Setor não encontrado";       
        }   
    }


    public function showNome(Request $request)
    {
        try{
            return $request;
            $setor = Setor::all();
            $resultado = $setor->where('nome', $request->nome)
            ->first();
            return $resultado->nome;
        }catch (\Exception $e) {
            return $e;       
        }  
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $setor = Setor::findOrFail($id);
            $setor->update($request->all());
            return ['msg'=>'Setor atualizado'];
        }catch (\Exception $e) {
            return "Setor não encontrado";       
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $setor = Setor::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id setor não existe '];
            }
            Setor::destroy($id);
            return ['msg'=>'setor '.$setor->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir setor '];
        }
    }
      /**
     * Cadastrar peso.
     */
    public function cadPeso(Request $request, string $id)
    {
        try{
            $setor = Setor::findOrFail($id);
            $setor->update($request->all());
            return ['msg'=>'Peso atualizado'];
        }catch (\Exception $e) {
            return "Setor não encontrado";       
        }   
    }
}
