<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sistema;
use App\Http\Requests\SistemaRequest;
use Illuminate\Support\Facades\DB;

class SistemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        return Sistema::paginate();
    } catch (\Exception $e){
        return ['msg' => $e];
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SistemaRequest $request)
    {
        try{
        Sistema::create($request->all());
        } catch (\Exception $e){
            return ['msg' => $e];
        }

        return ['msg' => 'Gravado com sucesso'];
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
        return Sistema::findOrfail($id);
    } catch(\Exception $e){
        return ['msg' => $e];
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SistemaRequest $request, string $id)
    {
        try{
        $sistema = Sistema::findOrfail($id);
        $sistema->update($request->all());

        } catch (\Exception $e){
            return ['msg' => $e];
        }

        return ['msg' => 'Atualizado com sucesso'];
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
        Sistema::destroy($id);
    } catch(\Exception $e){
        return ['msg' => $e];
    }

    return ['msg' => 'Excluído com sucesso!'];
    }
}