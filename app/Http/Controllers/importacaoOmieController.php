<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\OmieMotivo;
use App\Models\OmieOportunidade;

class importacaoOmieController extends Controller
{
    public function buscaMotivo(){
    
        $i=1;
        $result="";
        while($i > 0){
            try{
                $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
                $body['call'] = 'ListarMotivos';
                $body['app_key'] = '257661075672';
                $body['app_secret'] = '1da646f79ab9e8299292ee8ff6bb4d4e';
                $body['param'] = array([
                    'pagina'=>$i,
                    'registros_por_pagina'=>20
                ]);  
                $result = $client->post('https://app.omie.com.br/api/v1/crm/motivos/', [ 'body' => json_encode($body) ]);
                $i=$i+1;
            }catch (\Exception $e) {
                $i=0;
            }
        }
        $resposta = json_decode((string) $result->getBody());
        $count=0;
        for($i=0;$i < $resposta->total_de_registros;$i++){
            $omieMotivo = OmieMotivo::create([
                'cDescricao' => $resposta->cadastros[$i]->cDescricao,
                'cObservacao' => $resposta->cadastros[$i]->cObservacao,
                'nCodigo'=> $resposta->cadastros[$i]->nCodigo
            ]);
            $count=$count+1;
        }
        return ['msg'=>$count.' registos gravados'];
    }
    public function buscaOportunidade(){
        $itensGravados=0;

        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $body['call'] = 'ListarOportunidades';$body['app_key'] = '257661075672';$body['app_secret'] = '1da646f79ab9e8299292ee8ff6bb4d4e';$body['param'] = array(['pagina'=>1,'registros_por_pagina'=>20]);  
        $result = $client->post('https://app.omie.com.br/api/v1/crm/oportunidades/', [ 'body' => json_encode($body) ]);
        $resposta = json_decode((string) $result->getBody());
        $quantPaginas = $resposta->total_de_paginas;

        for($i=1;$i < $quantPaginas;$i++){// ITERA AS PÁGINAS
            $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
            $body['call'] = 'ListarOportunidades';$body['app_key'] = '257661075672';$body['app_secret'] = '1da646f79ab9e8299292ee8ff6bb4d4e';$body['param'] = array(['pagina'=>$i,'registros_por_pagina'=>20]);  
            $result = $client->post('https://app.omie.com.br/api/v1/crm/oportunidades/', [ 'body' => json_encode($body) ]);
            //TODOS OS REGISTROS DE UMA PÁGINA
            $resposta = json_decode((string) $result->getBody());
                // ITERA OS REGISTROS DE UMA PÁGINA,GRAVANDO NO BANCO.
                    for($j=0; $j<count($resposta->cadastros); $j++){
                        $dataConc = (string)$resposta->cadastros[$j]->fasesStatus->dConclusao;
                        $dataConc =str_replace('/','-',$dataConc);
                        $dataConc = \Carbon\Carbon::parse($dataConc)->format('Y-m-d');

                        $dataLead = (string)$resposta->cadastros[$j]->fasesStatus->dNovoLead;
                        $dataLead =str_replace('/','-',$dataLead);
                        $dataLead = \Carbon\Carbon::parse($dataLead)->format('Y-m-d');
                        
                        $cDesOp = $resposta->cadastros[$j]->identificacao->cDesOp;
                        $cDesOp = str_replace("/","",$cDesOp);
                        $omieMotivo = OmieOportunidade::create([                 
                            'dConclusao' => $dataConc,
                            'dNovoLead' => $dataLead,
                            'nCodFase'=> $resposta->cadastros[$j]->fasesStatus->nCodFase,
                            'nCodMotivo'=> $resposta->cadastros[$j]->fasesStatus->nCodMotivo,
                            'nCodStatus'=> $resposta->cadastros[$j]->fasesStatus->nCodStatus,
                            'cDesOp'=> "'$cDesOp'",
                            'nCodVendedor'=> $resposta->cadastros[$j]->identificacao->nCodVendedor,
                            'nTicket'=> $resposta->cadastros[$j]->ticket->nTicket
                        ]);
                        $itensGravados=$itensGravados+1;
                    }
        }
        
        return ['msg'=>$itensGravados.' registos gravados'];
    }
}
