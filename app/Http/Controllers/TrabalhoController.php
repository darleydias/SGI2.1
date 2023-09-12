<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrabalhoRequest;
use Illuminate\Http\Request;
use App\Models\Trabalho;

class TrabalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabalhos = Trabalho::paginate();  
        if(empty($trabalhos)){
            return ['msg'=>'Nenhum trabalho cadastrado'];
        }else{
            return $trabalhos;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrabalhoRequest $request)
    {
         try{
            return Trabalho::create($request->all());
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
            return Trabalho::findOrFail($id);
        }catch (\Exception $e) {
            return "trabalho não encontrado";
        }   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrabalhoRequest $request, string $id)
    {
        try{
            $trabalho= Trabalho::findOrFail($id);
            $trabalho->update($request->all());
            return ['msg'=>'trabalho atualizado'];
        }catch (\Exception $e) {
            return "trabalho não encontrado";       
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $trabalho = Trabalho::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id trabalho não existe '];
            }
            Trabalho::destroy($id);
            return ['msg'=>'trabalho '.$trabalho->nome.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir trabalho '];
        }
    }
    public function trabalhos(int $id)
    {
        $trabalho = Trabalho::findOrFail($id);

        if(empty($trabalhos)){
            return ['msg'=>'trabalho nao cadastrado'];
        }else{
            return $trabalho->trabalhos();
        }
    }
}
