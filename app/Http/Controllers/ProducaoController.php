<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducaoRequest;
use Illuminate\Http\Request;
use App\Models\Producao;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\SetorExecutante;

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
    public function listaContainers($id){
        $producao = SetorExecutante::leftJoin('setor', 'setor.id', '=', 'setor_executante.id_setor')
        ->leftJoin('producao','producao.id','=','setor_executante.id_producao')
        ->where('producao.id',$id)
        ->select('setor.nome')->get()->all();

        return $producao;

    }


}
