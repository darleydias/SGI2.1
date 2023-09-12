<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return TipoProduto::paginate();
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível exibir os dados de tipo de produto '];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return TipoProduto::create($request->all());
        }catch (\Exception $e){
            return "Não foi possível cadastrar o tipo de produto"; 
        }      
    }  
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $tipoProduto = TipoProduto::findOrFail($id);
            return $tipoProduto;
        }catch(\Exception $e){
            return ['msg'=>'Produto não encontrado'];
        }
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $tipoProduto = TipoProduto::findOrFail($id);
            $tipoProduto->update($request->all());
            return ['msg'=>'Tipo de produto '.$tipoProduto->nome.' atualizado com sucesso'];
        }catch (\Exception $e){
            return "Não foi possível atualizar o tipo de produto"; 
        }      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $tipoProduto = TipoProduto::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id tipo de produto não existe '];
            }
            TipoProduto::destroy($id);
            return ['msg'=>'setor '.$tipoProduto->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir tipo de produto '];
        }
    }
}
