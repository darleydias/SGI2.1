<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource. 'nome','desc','cod','tipoProduto_id','peso'
     */
    public function index()
    {
        try{
            return Produto::paginate();
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível exibir os dados de produto '];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            try{
                $idTipoProduto = TipoProduto::findOrFail($request->tipoProduto_id);
            }catch (\Exception $e){
                return "id do tipo de produto inválido";       
            }
            $produto = Produto::create($request->all());
            return $produto;
        }catch (\Exception $e){
            return "Não foi possível cadastrar o produto";       
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return Produto::findOrFail($id);
        }catch(\Exception $e){
            return ['msg'=>'Produto não exite '];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            try{
                $produto = Produto::findOrFail($id);   
            }catch (\Exception $e){
                return "id do produto inválido";       
            }
            $produto->update($request->all());
            return ['msg'=>'Produto '.$request->nome.' atualizado com sucesso'];
        }catch (\Exception $e){
            return "Não foi possível atualizar o produto";       
        }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $produto = Produto::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id Produto não existe '];
            }
            Produto::destroy($id);
            return ['msg'=>'Produto '.$produto->opNum.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir produto '];
        }
    }
}
