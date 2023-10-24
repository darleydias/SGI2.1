<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OmieOportunidade;

class OmieOportunidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    public function clienteConquistado(Request $request)
    {
        // passa-se o mes ano e recebe-se a soma por semana dos registros daquele mês
        $mes=$request->mes;
        $ano=$request->ano;
        $semana1=OmieOportunidade::select(OmieOportunidade::raw("YEARWEEK(dConclusao) semana,count(YEARWEEK(dConclusao)) as regSemana")) 
        ->whereYear('dConclusao','=', $ano)
        ->whereMonth('dConclusao','=', $mes)
        ->where('omie_oportunidade.nCodMotivo','2100482628')
        ->groupBy(OmieOportunidade::raw('YEARWEEK(dConclusao)'))->get()->all();
        
        $maior=OmieOportunidade::select(OmieOportunidade::raw("count(YEARWEEK(dConclusao)) as valor")) 
        ->whereYear('dConclusao','=', $ano)
        ->where('omie_oportunidade.nCodMotivo','2100482628')
        ->groupBy(OmieOportunidade::raw('YEARWEEK(dConclusao)'))->get()->all();

        return ['nrSemQuant'=>$semana1,'maior'=>max($maior)];
    }
    


    public function anosComOportunidade()
    {
        // listas anos que teve alguma oportunidade
        $anos=OmieOportunidade::select(OmieOportunidade::raw('YEAR(dConclusao) as ano')) 
        ->where('omie_oportunidade.nCodMotivo','2100482628')->distinct()->get()->all();
        return $anos;
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
