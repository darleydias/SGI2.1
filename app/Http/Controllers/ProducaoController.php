<?php

namespace App\Http\Controllers;
use Illuminate\Database\Query\Builder;
use App\Http\Requests\ProducaoRequest;
use Illuminate\Http\Request;
use App\Models\Producao;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\SetorExecutante;
use App\Models\ProdutoServico;
use App\Models\ServicoExecutado;
use App\Models\Meta;



class ProducaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            return Producao::paginate();
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível exibir os dados da produção '];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProducaoRequest $request)
    {
        // try{
            try{
                try{
                    $idProduto =Produto::findOrFail($request->produto_id);
                }catch (\Exception $e) {
                    return "id do produto nao existe";       
                }    
                $idCliente =Cliente::findOrFail($request->cliente_id);
            }catch (\Exception $e){
                return "id do Cliente nao existe";       
            }    
            $producao = Producao::create($request->all());
            return $producao;
        // }catch (\Exception $e) {
        //     return "Não foi possível cadastrar produção";       
        // }  
         
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            return Producao::findOrFail($id);
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível encontrar produção '];
        }
    }
 /**
     * Display the specified resource.
     */
    public function showByOp(string $op)
    {
        try{

           $op = Producao::all()->where('opNum',$op)->first();
            return $op->id;
        }catch(\Exception $e){
            return ['msg'=>'Não foi possível encontrar produção '];
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ProducaoRequest $request, string $id)
    {
        try{
            try{
                try{
                    $idProduto =Produto::findOrFail($request->produto_id);
                }catch (\Exception $e) {
                    return "id do produto nao existe";       
                }    
                $idCliente =Cliente::findOrFail($request->cliente_id);
            }catch (\Exception $e){
                return "id do Cliente nao existe";       
            }    

            $producao = Producao::findOrFail($id);
            $result =  $producao->update($request->all());
            return ['msg'=>'Producao '.$producao->opNum.' Atualizada com sucesso'];
        }catch (\Exception $e) {
            return "Não foi possível atualizar produção";       
        }  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            try{
                $producao = Producao::findOrFail($id);
            }catch(\Exception $e){
                return ['msg'=>'id Produção não existe '];
            }
            Producao::destroy($id);
            return ['msg'=>'Produção '.$producao->opNum.' excluida'];
        }catch(\Exception $e){    
            return ['msg'=>'Não foi possível excluir produção '];
        }
    }

    /** lista a partir de filtros.  */
    public function filtrar(Request $request)
    {
            $cliente_id = trim($request->cliente_id);
            $produto_id = trim($request->produto_id);
            $dataInicio = trim($request->dataInicio);
            $dataFim = trim($request->dataFim);

            $op = trim($request->opNum);

            if(!empty($op)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('opNum','=',$op)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                return $producao;
            }

            // Veio tudo
            if(!empty($dataInicio) && !empty($dataFim)&& !empty($cliente_id)&& !empty($produto_id)){ 
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->whereBetween('dataInicio',[$dataInicio, $dataFim])->where('cliente_id',$cliente_id)
                ->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
            }
            // Veio data inicio e fim 
            if(!empty($dataInicio) && !empty($dataFim)&& empty($cliente_id)&& empty($produto_id)){ 
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->whereBetween('dataInicio',[$dataInicio, $dataFim])
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio data inicio e fim'];
            }
            // Só veio cliente
            if(empty($dataInicio) && empty($dataFim)&& !empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('cliente_id',$cliente_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Só veio cliente'];
            }
             // Só veio produto
             if(empty($dataInicio) && empty($dataFim)&& empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                //  return ['msg'=>'Só veio produto'];
            }
             // Veio produto e cliente
             if(empty($dataInicio) && empty($dataFim)&& !empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('produto_id',$produto_id)->where('cliente_id',$cliente_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio produto e cliente'];
            }
            
            // Veio tudo menos cliente
            if(!empty($dataInicio) && !empty($dataFim)&& empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->whereBetween('dataInicio',[$dataInicio, $dataFim])->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio tudo menos cliente'];
            }
            // Veio tudo menos produto
            if(!empty($dataInicio) && !empty($dataFim)&& !empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->whereBetween('dataInicio',[$dataInicio, $dataFim])->where('cliente_id',$cliente_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio tudo menos produto'];
            }
            // Só veio data de inicio
            if(!empty($dataInicio) && empty($dataFim)&& empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','>',$dataInicio)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Só veio data de inicio'];
            }
             // Só veio data de fim
             if(empty($dataInicio) && !empty($dataFim)&& empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','<',$dataFim)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Só veio data de fim'];
            }
            //Veio data de inicio e produto
            if(!empty($dataInicio) && empty($dataFim)&& empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','>',$dataInicio)->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio data de inicio e produto'];
            }
            //Veio data de inicio e cliente
            if(!empty($dataInicio) && empty($dataFim)&& !empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','>',$dataInicio)->where('produto_id',$cliente_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio data de inicio e cliente'];
            }
            //Veio data de inicio produto e cliente
            if(!empty($dataInicio) && empty($dataFim)&& !empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','>',$dataInicio)->where('cliente_id',$cliente_id)->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio data de inicio produto e cliente'];
                
            }
            //Veio data de fim e produto
            if(empty($dataInicio) && !empty($dataFim)&& empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','<',$dataFim)->where('cliente_id',$cliente_id)->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio data de fim e produto'];
            }
            //Veio data de fim e cliente
            if(empty($dataInicio) && !empty($dataFim)&& !empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','<',$dataFim)->where('cliente_id',$cliente_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                 return ['msg'=>'Veio data de fim e cliente'];
            }
            //Veio data de fim produto e cliente
             if(empty($dataInicio) && !empty($dataFim)&& !empty($cliente_id)&& !empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->where('dataInicio','<',$dataFim)->where('cliente_id',$cliente_id)->where('produto_id',$produto_id)
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
                // return ['msg'=>'Veio data de fim produto e cliente'];
            }
             //Veio nada
             if(empty($dataInicio) && empty($dataFim)&& empty($cliente_id)&& empty($produto_id)){
                $producao = Producao::leftJoin('cliente', 'cliente.id', '=', 'producao.cliente_id')
                ->leftJoin('produto', 'produto.id', '=', 'producao.produto_id')
                ->select('producao.id','producao.qt','producao.opNum','producao.dataInicio','producao.dataPrevista','producao.dataEntrega','producao.obs','cliente.nome as cliente','produto.nome as produto',)->get()->all();
            }
            return $producao;
    }
    public function desempenhoTodos()
    {
         // OBSOLETO - não se registrará quantidade realizada por setor, por não existir
            $producao = SetorExecutante::leftJoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
            ->leftJoin('producao','producao.id','=','setor_executante.id_producao')
            //somatorio de : execução percentual (quantidade atual x 100 /quant Total na OP) x peso. divido o resultado pela soma dos pesos
            ->select('producao.opNum as prod',SetorExecutante::raw('round((sum((((setor_executante.quantAtual)*100)/producao.qt) * (setor.peso))/sum(setor.peso)),0) as soma'))
            ->groupBy('prod')->get()->all();
            return $producao;
    }
    public function desempenho(string $id)
    {
        try{
            // OBSOLETO - não se registrará quantidade realizada por setor, por não existir
            $producao = SetorExecutante::leftJoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
            ->leftJoin('producao','producao.id','=','setor_executante.id_producao')
            ->where('producao.id',$id)
            //somatorio de : execução percentual (quantidade atual x 100 /quant Total na OP) x peso. divido o resultado pela soma dos pesos
            ->select('producao.opNum as prod',SetorExecutante::raw('round((sum((((setor_executante.quantAtual)*100)/producao.qt) * (setor.peso))/sum(setor.peso)),0) as soma'))
            ->groupBy('prod')->get()->all();
            return $producao;

        }catch(\Exception $e){
            return ['msg'=>'Não foi possível encontrar produção '];
        }
    }
    public function producaoDia()
    {
            $producao = SetorExecutante::leftJoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
            ->leftJoin('producao','producao.id','=','setor_executante.id_producao')
            //somatorio de : execução percentual (quantidade atual x 100 /quant Total na OP) x peso. divido o resultado pela soma dos pesos
            ->select('producao.opNum as prod',SetorExecutante::raw('round((sum((((setor_executante.quantAtual)*100)/producao.qt) * (setor.peso))/sum(setor.peso)),0) as soma'))
            ->groupBy('prod')->get()->all();
            return $producao;
    }
    
    // DEVOLVE DADOS DO SETOR QUE TRABALHOU EM UMA PRODUÇÃO, A PARTIR DO ID DA PRODUÇÃO  
    public function listaContainers($id){
        $producao = SetorExecutante::leftJoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
        ->leftJoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('producao.id',$id)
        ->select('setor.nome','setor.id','setor_executante.dtInicio','setor_executante.dtFim')->get()->all();
        return $producao;
    }

    public function percentualExecucao($idProducao){

        $producao = Producao::findOrFail($idProducao);
        $idProduto = $producao->produto_id;

        // Soma todos os servicos previstos para um produto segundo o roteiro e calcula o percentual de todo servicos feitos em uma producao        

        // SOMA DE HORAS DE TODOS SERVICOS * PREVISTOS * PARA UMA PRODUÇÃO ESPECÍFICA
  
        $horasPrevistas = ProdutoServico::select(ProdutoServico::raw("SUM((produto_servico.quant * produto_servico.tempoMedioMin)/60) as total"))
        ->where('produto_servico.produto_id',$idProduto)->value('total');

     

        // SOMA DA QUANTIDADE DE SERVICOS * EXECUTADOS *

        $somaServicosFeitos = SetorExecutante::select(SetorExecutante::raw("SUM(servicoExecutado.quantConcluido) as total"))
        ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
        ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('producao.id',$idProducao)->value('total');


         // SOMA DE HORAS DE TODOS SERVICOS * EXCUTADOS * PARA UMA PRODUÇÃO ESPECÍFICA
  
         $somaHorasTrabalhadas = SetorExecutante::select(SetorExecutante::raw("SUM((TIMESTAMPDIFF(MINUTE,servicoExecutado.dtInicio,servicoExecutado.dtFim))/60) as soma"))
         ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
         ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
         ->where('producao.id',$idProducao)->value('soma');

        // QUANTOS SERVICOS POR HORA ESTÃO SENDO FEITO DESDE O INÍCIO DA PRODUÇAO

        if(empty($somaHorasTrabalhadas)){
            return ['msg'=> 'Não foram lancados apontamentos'];
        }else{
            $servicoHora = $somaServicosFeitos/$somaHorasTrabalhadas;
        }
        
        // PERCENTUAL DE HORAS EXECUTADAS EM RELAÇÃO AS PREVISTAS

        if(empty($horasPrevistas)){
            return ['msg'=>'Não foram cadastrados servicos para o produto'];
        }else{
            $percentual = ($somaHorasTrabalhadas * 100)/(int) $horasPrevistas;
        }
        
        $saida = ['percentualHorasGastas'=>round($percentual,0),'svPorHora'=>round($servicoHora,2),'horasPrevistasProd'=>$horasPrevistas,'somaServicosFeitos'=>$somaServicosFeitos,'somaHorasTrabalhadas'=>$somaHorasTrabalhadas];
        return $saida;
    }

    public function mediaTempoServico(Request $request){

        // ROTINA DE ATUALIZAÇÃO DE MEDIA DE TEMPO GASTO POR SERVICO QUE ESTÁ REGISTRADA NA TABELA PRODUTO_SERVICO. 
        // SERÁ NECESSÁRIO DEPOIS DE IDENTIFICADO, UMA LINHA DE CORTE PARA EVITRA QUE UM VALOR DISCREPANTE REGISTRADO POR ERRO MUDE A MÉDIA GERAL 
        
        $horasTrabalhadas = SetorExecutante::select(SetorExecutante::raw("AVG((TIMESTAMPDIFF(MINUTE,servicoExecutado.dtInicio,servicoExecutado.dtFim))/60) as media,servico.desc,servicoExecutado.id_servico as sv"))
        ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
        ->leftjoin('servico','servico.id','=','servicoExecutado.id_servico')
        ->where('setor_executante.id',$request->idSetor)
        ->groupBy('servicoExecutado.id_servico','servico.desc')->get()->all();

        for($i=0;$i<count($horasTrabalhadas);$i++){
                ProdutoServico::where('servico_id', $horasTrabalhadas[$i]->sv)
                ->update(['tempoMedioMin' => $horasTrabalhadas[$i]->media]);
        }
        return ['msg'=>count($horasTrabalhadas).' itens atualizados'];
    }

    // ********************   INDICADORES GERAIS************************
   
    public function estatisticasOp(Request $request){
        
        $idProducao=$request->idProducao;

        // INDICADOR PRODUÇÃO

        // QUANTIDADE MEDIA DIÁRIA DE SERVICOS EXCUTADOS GERAL(SOMA DE SERVICOS DE TODOS SETORES), DESDE O INÍCIO DA PRODUCAO 

         $now = date('Y/m/d H:i:s', time());
         //MEDIA DA QUANTIDADE DE SERVICO EXECUTADO POR DIA
         $indProducaoTotal = SetorExecutante::select(SetorExecutante::raw("avg((servicoExecutado.quantConcluido)/(TIMESTAMPDIFF(DAY,producao.dataInicio,'".$now."'))) as total")) 
         ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
         ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
         ->leftjoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
         ->leftjoin('meta','meta.setor_id','=','setor.id')
         ->where('producao.id',$idProducao)->value('total');

         $metaGeralProducao = Meta::select('meta.valor as meta')
         ->where('meta.indicador_id',1)
         ->where('meta.setor_id',0)->value('meta');
        
         // ********************OTIF*****************************
        //  Descubrao quantos dia faltam para acabar baseado nos serviços não feitos ainda, o tempo médio de cada uma e o valor final em horas é dividici por 8 horas

        $servicosFaltantes =  ProdutoServico::select('produto_servico.servico_id')
        ->where('produto_servico.produto_id','=',2)
        ->whereNotIn('produto_servico.servico_id', function ($query) {
                $query->select('servicoExecutado.id_servico')->from('servicoExecutado')
                ->leftjoin('setor_executante','servicoExecutado.id_setorExecutante','=','setor_executante.id')
                ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
                ->where('producao.produto_id',2);
        });
        // soma de tempo médio de cada servico / 60 min x 8 horas x (quantidade de pessoas)
        $diasFaltantes = ProdutoServico::selectRaw('(sum((produto_servico.tempoMedioMin/(480* produto_servico.quantEquipe)))) as faltamDias')
        ->leftjoin('servico','servico.id','=','produto_servico.servico_id')
        ->whereIn('servico.id',$servicosFaltantes)->value('faltamDias');
        //->whereIn('servico.id',$servicosFaltantes)->toRawSql();

        $otif = Producao::select(SetorExecutante::raw('(TIMESTAMPDIFF(DAY,producao.dataPrevista,"'.$now.'") - ('.$diasFaltantes.')) as otif'))
        ->where('producao.id','=', $idProducao)
        ->value('otif');

        //****************** Fim Otif ****************************** */

         //****************** Tempo Parado ****************************** */

        // -- Tempo de trabalho total computado para uma OP 

       
        $tempoTotalComputado = ServicoExecutado::select(ServicoExecutado::raw('SUM(TIMESTAMPDIFF(minute,trabalho.tempoInicio,trabalho.tempoFim)) as tempo'))
        ->leftjoin('trabalho','trabalho.id_servicoExecutado','servicoExecutado.id')
        ->leftjoin('setor_executante','setor_executante.id','servicoExecutado.id_setorExecutante')
        ->where('setor_executante.id_producao',$idProducao)->value('tempo');

        $tempoParado = ServicoExecutado::select(ServicoExecutado::raw('SUM(TIMESTAMPDIFF(minute,trabalho.tempoInicio,trabalho.tempoFim)) as tempo'))
        ->leftjoin('trabalho','trabalho.id_servicoExecutado','servicoExecutado.id')
        ->leftjoin('setor_executante','setor_executante.id','servicoExecutado.id_setorExecutante')
        ->where('setor_executante.id_producao',$idProducao)
        ->where('trabalho.trabalhoPausa',0)->value('tempo');

        if($tempoTotalComputado>0)
        {
            $percentParado = ($tempoParado * 100)/ $tempoTotalComputado;
        }else{
            $percentParado=0;
        }
        

        $metaGeralTempoParado = Meta::select('meta.valor as metaParado')
        ->where('meta.indicador_id',3)
        ->where('meta.setor_id',0)->value('metaParado');

        //****************** Fim Tempo Parado ****************************** */


        //    INDICADOR PRODUÇÃO POR SETOR

        //    QUANTIDADE MEDIA DIÁRIA DE SERVICOS EXCUTADOS * POR SETOR *, DESDE O INÍCIO DA PRODUCAO - 
            $indProducaoSetor = SetorExecutante::select(SetorExecutante::raw("avg((servicoExecutado.quantConcluido)/(TIMESTAMPDIFF(DAY,producao.dataInicio,'".$now."'))) as total,setor.nome,meta.valor")) //MEDIA DA QUANTIDADE DE SERVICO
            ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
            ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
            ->leftjoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
            ->leftjoin('meta','meta.setor_id','=','setor.id')
            ->where('producao.id',$idProducao)
            ->groupBy('setor.nome','meta.valor')->get()->all();

        return ['indicadorProdSetor'=>$indProducaoSetor,'indicadorProdGeral'=>ROUND($indProducaoTotal,2),'metaGeralProd'=>$metaGeralProducao,'otif'=>ROUND($otif,2),'tempoParado'=>ROUND($percentParado,2),'metaParado'=>$metaGeralTempoParado];
        
    }
    
    
    //FIM INDICADORES GERAIS 
   
    // DEVOLVE INFORMAÇÕES POR SETOR, PASSANDO O ID DO SETOR  

    public function estatisticasSetor(Request $request){

        $idProducao=$request->idProducao;
        $idSetor=$request->idSetor;
        // devolve a Soma todos os servicos previstos segundo o roteiro e calcula 
        // o percentual de todo servicos feitos em  cada uma seção        
        $producao = Producao::findOrFail($idProducao);
        $idProduto = $producao->produto_id;
        
        // QUANTIDADE DE SERVICOS PARA UM PRODUTO PREVISTA POR SETOR

        $produtoServico = ProdutoServico::select(ProdutoServico::raw("SUM(produto_servico.quantEquipe) as total"))
        ->where('produto_servico.setor_id',$idSetor)
        ->where('produto_servico.produto_id',$idProduto)->value('total');

        // // QUANTIDADE DE SERVICOS  EXCUTADOS POR SETOR
        $setorExecutante = SetorExecutante::select(SetorExecutante::raw("SUM(servicoExecutado.quantConcluido) as total"))
        ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
        ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('setor_executante.id',$idSetor)
        ->where('producao.id',$idProducao)->value('total');
        //->where('producao.id',$idProducao)->toSql();

        // Média de servicos produzidos por dia em uma produção especifica
        // media(quantidade de servicos concluidos /quantos dias desde o inicio da produção)

        $now = date('Y/m/d H:i:s', time());
        $indicadorProducao = SetorExecutante::select(SetorExecutante::raw("avg((servicoExecutado.quantConcluido)/(TIMESTAMPDIFF(DAY,producao.dataInicio,'".$now."'))) as total")) 
        ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
        ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('setor_executante.id',$idSetor)
        ->where('producao.id',$idProducao)->value('total');

        //->where('producao.id',$idProducao)->toSql();

        // TEMPO GASTO POR SETOR CONSIDERANDO DATA DE INICIO E FIM NO SETOR

        $horasTrabalhadas = SetorExecutante::select(SetorExecutante::raw("SUM((TIMESTAMPDIFF(MINUTE,servicoExecutado.dtInicio,servicoExecutado.dtFim))/60) as total"))
        ->leftjoin('servicoExecutado','servicoExecutado.id_setorExecutante','=','setor_executante.id')
        ->leftjoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('setor_executante.id',$idSetor)
        ->where('producao.id',$idProducao)->value('total');
        // ->where('producao.id',$idProducao)->toSql();
                
        // TEMPO PREVISTO(BASEADO NA SÉRIE HISTÓRICA) POR SERVICO-SETOR

        $horasPrevistas = ProdutoServico::select(ProdutoServico::raw("SUM((produto_servico.quantEquipe * produto_servico.tempoMedioMin)/60) as total"))
        ->where('produto_servico.setor_id',$idSetor)
        ->where('produto_servico.produto_id',$idProduto)->value('total');
        //->where('produto_servico.produto_id',$idProduto)->toSql();

       if($setorExecutante===null){$setorExecutante=0;};

       // Percentual já executado de servicos, em relação aos servicos previstos; 
       $percentual = 100;//((int) $setorExecutante * 100)/(int) $produtoServico;

       $saida = ['svPrevistos'=>$produtoServico,'svExecutados'=>$setorExecutante,'percentual'=>$percentual,'setor'=>$idSetor,'horasTrab'=>ROUND($horasTrabalhadas,2),'horasPrevistas'=>ROUND($horasPrevistas,2),'indicadorProducao'=>round($indicadorProducao,2)];

       return $saida ;
    }
}
