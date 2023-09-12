<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicos = Servico::paginate();  
        if(empty($servicos)){
            return ['msg'=>'Nenhum servico cadastrado'];
        }else{
            return $servicos;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return Servico::create($request->all());
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
            return Servico::findOrFail($id);
        }catch (\Exception $e) {
            return "Servico não encontrado";       
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $servico= Servico::findOrFail($id);
            $servico->update($request->all());
            return ['msg'=>'serviço atualizado'];
        }catch (\Exception $e) {
            return "serviço não encontrado";       
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $servico = Servico::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id serviço não existe '];
            }
            Servico::destroy($id);
            return ['msg'=>'serviço '.$servico->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir serviço '];
        }
    }
    public function trabalhos(int $id)
    {
        $servico = Servico::findOrFail($id);

        if(empty($servicos)){
            return ['msg'=>'servico nao cadastrado'];
        }else{
            return $servico->trabalhos();
        }
    }
}
