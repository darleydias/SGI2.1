<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Seguimento;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    /** Display a listing of the resource. */
    public function index()
    {
        $cliente = Cliente::paginate();  
        if(empty($cliente)){
             return ['msg'=>'Nenhum cliente cadastrado'];
         }else{
             return [$cliente];
         }
    }
    /** Store a newly created resource in storage. */
    public function store(ClienteRequest $request)
    {
            try{
             $seguinte = Seguimento::findOrFail($request->seguimento_id);
            }catch (\Exception $e) {
                return "Seguimento não exite";       
            }  
            return Cliente::create($request->all());
    }

    /** Display the specified resource. */
    public function show(string $id)
    {
        try{
            return Cliente::findOrFail($id);
        }catch (\Exception $e) {
            return "cliente não encontrado";       
        }   
    }

    /** Update the specified resource in storage. */
    public function update(Request $request, string $id)
    {
        try{
            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());
            return ['msg'=>'cliente atualizado'];
        }catch (\Exception $e) {
            return "cliente não encontrado";       
        }   
    }

    /** Remove the specified resource from storage. */
    public function destroy(string $id)
    {
        $result = Cliente::destroy($id);
        if($result==0){
            return ['msg'=>'nenhum item removido'];
        }else{
            return ['msg'=>'item removido'];
        }
    }
}