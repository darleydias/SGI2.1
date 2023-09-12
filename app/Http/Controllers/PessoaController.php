<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Setor;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(is_null(Pessoa::first())){
            return ['msg'=>'Nenhuma pessoa cadastrada'];
        }else{
            return Pessoa::paginate();
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(PessoaRequest $request)
    {
        try{
            try{
                $setor = Setor::findOrFail($request->id_setor);
            }catch (\Exception $e) {
                return "Setor não exite";       
            }  
            return Pessoa::create($request->all()); 
        }catch (\Exception $e) {
            return "Dados não informados";       
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return Pessoa::findOrFail($id);
        }catch (\Exception $e) {
            return "pessoa não encontrada";       
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PessoaRequest $request, string $id)
    {
        try{
            $pessoa = Pessoa::findOrFail($id);
            $pessoa->update($request->all());
            return ['msg'=>'pessoa atualizado'];
        }catch (\Exception $e) {
            return "pessoa não encontrado";       
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pessoa = Pessoa::destroy($id);
        if($pessoa==0){
            return ['msg'=>'nenhum item removido'];
        }else{
            return ['msg'=>'item removido'];
        }
    }
    /**
     * Display the specified resource.
     */
    public function clientes(string $id)
    {
        try{
            $pessoa = Pessoa::findOrFail($id);
            return $pessoa->clientes;
        }catch (\Exception $e) {
            return "pessoa não encontrado";       
        }   
    }
}
