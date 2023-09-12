<?php

namespace App\Http\Controllers;
use App\Models\SetorExecutante;
use Illuminate\Http\Request;

class SetorExecutanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setorExecutante = SetorExecutante::paginate();  
        if(empty($setorExecutante)){
            return ['msg'=>'Nenhum setor executante informado'];
        }else{
            return $setorExecutante;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            return SetorExecutante::create($request->all());
        }catch (\Exception $e) {
            return "Não foi possível gravar";       
        }  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return SetorExecutante::findOrFail($id);
        }catch (\Exception $e) {
            return "Setor executante não encontrado";       
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $SetorExecutante = SetorExecutante::findOrFail($id);
            $SetorExecutante->update($request->all());
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
                $SetorExecutante = SetorExecutante::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id setor não existe '];
            }
            SetorExecutante::destroy($id);
            return ['msg'=>'setor '.$SetorExecutante->id.' excluido'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir setor '];
        }
    }
    
}
