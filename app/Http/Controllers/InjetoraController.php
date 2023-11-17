<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\injetora;
use App\Models\EstadosInjetora;

class InjetoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $injetora = Injetora::all();  
        if(empty($injetora)){
            return ['msg'=>'Nenhum status cadastrado'];
        }else{
            return $injetora;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estado=0;
        if($request->corrente>23){
            $estado = 1;
        }
        $res = ['corrente' =>$request->corrente,'estado'=>$estado,'id_maquina'=>$request->id_maquina];
    
        try{
            return Injetora::create($res);
        }catch (\Exception $e) {
            return "dados não informados";       
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function correnteAtual()
    {
        $corrente=injetora::select(injetora::raw("corrente")) 
        ->orderBy('created_at', 'desc')->get()->first();
        
        return $corrente;
    }
   
    public function sinteseAcoesInjetora(Request $request)
    {
        // Aplica uma regra nos dados que estão na tabela de comportamento da injetiora
        // e extrai só os momentos que há uma mudança de estado de ligado para desligado
        // Isso deve rodar em batch para alimentar a tabela estados_injetoras para que as consultas fiquek 
        // com maior desempenho
        // pego o mais antigo na tabela de injeção. A tabela de injeção possui as correnmets segundo a segundo
        $primeiro =injetora::select("estado")->get()->first(); 
        $estadoAnterior = $primeiro->estado;
         //itero toda tabela de injeção
        // Crio uma variável para armazenar o estado anterior. 
        // Testo para cada item vindo da tabela de ações da injetora de mudou em relação ao ultimo estado 
        $estados=injetora::select("estado","created_at","id_maquina") 
        ->orderBy('created_at', 'asc')->get()->all();
        // limpando a tabela
        EstadosInjetora::truncate();
        foreach ($estados as $estado) {
             if($estado->estado != $estadoAnterior){
                $dados = ['estado'=>$estado->estado,'id_maquina'=>$estado->id_maquina,'unixtime'=>$estado->created_at];
                EstadosInjetora::create($dados);        
                $estadoAnterior=$estado->estado;
             }
        }
        // ->where(injetora::raw("created_at =.$dia."))
        // ->orderBy('created_at', 'desc')->get()->first();
        return ['msg'=>'Tabela Estados das injetoras atualizadas'];
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
