<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadosInjetora;

class EstadosInjetoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = EstadosInjetora::all();  
        if(empty($estados)){
            return ['msg'=>'Nenhum stado cadastrado'];
        }else{
            return $estados;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estadosInjetora = EstadosInjetora::create($request->all());
        return $estadosInjetora;
    }

    public function estadosInjetoraDia(Request $request)
    {
        $tempoTotal = EstadosInjetora::select(EstadosInjetora::raw('(TIMESTAMPDIFF(minute,MIN(unixtime),MAX(unixtime))) as tempoTotal'))
        ->whereDate('unixtime',$request->dia)->value('tempoTotal');
        
        $tempos = EstadosInjetora::select(EstadosInjetora::raw('unixtime,estado'))
        ->whereDate('unixtime',$request->dia)->get()->all();

        $primeiroTempo = EstadosInjetora::select(EstadosInjetora::raw('unixtime'))
        ->whereDate('unixtime',$request->dia)->first();

        $ultimo = $primeiroTempo->unixtime;

        $ultimoData = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ultimo);

        $currentTime = \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", date("Y-m-d H:i:00"));

        $minuteDiff = $ultimoData->diffInMinutes($currentTime);

        $arr = array();

        for($i=1;$i<count($tempos);$i++){
            $tempoGravado = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $tempos[$i]->unixtime);
            $minuteDiff = $ultimoData->diffInMinutes($tempoGravado);
            array_push($arr, (($minuteDiff*100)/$tempoTotal));
            $ultimoData = $tempoGravado;
        }
        return ['tempoTotal'=>$tempoTotal,'tempos'=>$tempos,'primeiroTempo'=>$primeiroTempo,'intervalos'=>$arr];
        
   
   
   
   
   
        
        // ->toRawSql();
        
        
        // $percentual = EstadosInjetora::select(EstadosInjetora::raw("estado,unixtime as percentual,id_maquina"))
            

            
            // return ['estado'=>$estadosInjetora->estado,'percentual'=>$estadosInjetora->percentual];
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
