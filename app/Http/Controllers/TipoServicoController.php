<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoServico;

class TipoServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return TipoServico::paginate();
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível exibir os dados de tipo de serviço '];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return TipoServico::create($request->all());
        }catch (\Exception $e){
            return "Não foi possível cadastrar o tipo de serviço"; 
        }      
    }  
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $tipoServico = TipoServico::findOrFail($id);
            return $tipoServico;
        }catch(\Exception $e){
            return ['msg'=>'serviço não encontrado'];
        }
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $tipoServico = TipoServico::findOrFail($id);
            $tipoServico->update($request->all());
            return ['msg'=>'Tipo de serviço '.$tipoServico->nome.' atualizado com sucesso'];
        }catch (\Exception $e){
            return "Não foi possível atualizar o tipo de serviço"; 
        }      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $tipoServico = TipoServico::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id tipo de serviço não existe '];
            }
            TipoServico::destroy($id);
            return ['msg'=>'setor '.$tipoServico->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir tipo de serviço '];
        }
    }
}
