<?php

use App\Http\Controllers\SistemaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionalidadeController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProducaoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SeguimentoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\TipoProdutoController;
use App\Http\Controllers\TipoServicoController;
use App\Http\Controllers\TrabalhoController;
use App\Http\Controllers\NotaFiscalController;
use App\Http\Controllers\SetorExecutanteController;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OmieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

##### NOTA FISCAL #####
Route::post('/omie', [OmieController::class, 'store']);
#####


##### NOTA FISCAL #####
 Route::post('/upload/nf', [NotaFiscalController::class, 'uploadNF']);
 Route::get('/upload/nf/{id}', [NotaFiscalController::class, 'show']);
#####

##### LOGIN #####
 Route::post('/register',[AuthController::class,'register']);
 Route::post('/login',[AuthController::class,'login']);
#####

##### SISTEMA #####
 Route::get('/sistema',[SistemaController::class,'index']);
 Route::post('/sistema',[SistemaController::class,'store']);
 Route::get('/sistema/{id}',[SistemaController::class,'show']);
 Route::put('/sistema/{id}',[SistemaController::class,'update']);
 Route::delete('/sistema/{id}',[SistemaController::class,'destroy']);
 Route::get('/sistema/{id}/funcionalidades',[SistemaController::class,'listaFuncSistema']);
#####

##### GRUPO #####
 Route::get('/grupo',[GrupoController::class,'index']);
 Route::post('/grupo',[GrupoController::class,'store']);
 Route::get('/grupo/{id}',[GrupoController::class,'show']);
 Route::put('/grupo/{id}',[GrupoController::class,'update']);
 Route::delete('/grupo/{id}',[GrupoController::class,'destroy']);
 Route::get('/grupo/{id}/funcionalidades',[GrupoController::class,'listaFuncGrupo']);/**  CRIA UM REGISTRO NA TABELA DE UM USUARIO EM UM GRUPO **/
 Route::get('/grupo/{id}/usuarios',[GrupoController::class,'listaUsuariosGrupo']); /**  LISTA USUARIOS DE UM GRUPO **/
#####

##### USUÁRIO #####
 Route::get('/usuario/{id}/grupos',[GrupoController::class,'listaGruposUsuario']);/**  LISTA GRUPOS DE UM USUARIO EM UM GRUPO **/
Route::delete('/usuario/grupo',[GrupoController::class,'excluiUsuarioGrupo']);/**  EXCLUI UM REGISTRO NA TABELA DE UM USUARIO EM UM GRUPO **/
 Route::delete('/usuario/{id}',[AuthController::class,'destroy']);
 Route::get('/usuario',[AuthController::class,'index']);
 //  ##################    INICIO - ROTAS LOGADAS E AUTORIZADAS    ##################
 // Todo sistema que for logar e autorizar deveria apontar para as tabelas daqui, implementar o md abaixo
 Route::group(['middleware'=>['auth:sanctum']],function(){
    //Route::get('/usuario',[AuthController::class,'index'])->middleware(PermissaoMiddleware::class);
 });
 //  ##################    FIM - ROTAS LOGADAS E AUTORIZADAS    ##################

 Route::post('/usuario/grupo',[GrupoController::class,'usuarioGrupo']); // Insere um usuário e grupo na tabela pivot
 Route::get('/usuario/{id}/funcionalidades',[AuthController::class,'usuFunc']);

 Route::get('/usuario/{id}',[AuthController::class,'show']);
 Route::put('/usuario/{id}',[AuthController::class,'update']);
#####

##### FUNCIONALIDADE #####
 Route::get('/funcionalidade',[FuncionalidadeController::class,'index']);
 Route::post('/funcionalidade',[FuncionalidadeController::class,'store']);
 Route::get('/funcionalidade/{id}',[FuncionalidadeController::class,'show']);
 Route::put('/funcionalidade/{id}',[FuncionalidadeController::class,'update']);
 Route::delete('/funcionalidade/{id}',[FuncionalidadeController::class,'destroy']);
 Route::post('/funcionalidade/grupo',[FuncionalidadeController::class,'funcionalidadeGrupo']); // Associa funcionalidade a grupo
 Route::post('/funcionalidades/grupo',[FuncionalidadeController::class,'funcionalidadeGrupoArray']);
 Route::get('/grupo/{id}/funcionalidades',[FuncionalidadeController::class,'listaFuncionalidadesGrupo']);/**  LISTA GRUPOS DE UM FUNCIONALIDADES **/
 Route::get('/funcionalidade/{id}/grupos',[FuncionalidadeController::class,'listaGruposFuncionalidade']);/**  LISTA GRUPOS em que um FUNCIONALIDADE está **/
 Route::delete('/func/grupo',[FuncionalidadeController::class,'excluiFuncGrupo']);
 Route::get('/menu/usuario/{id}',[FuncionalidadeController::class,'montaMenu']);
 Route::post('/menu/usuario/',[FuncionalidadeController::class,'montaMenuEmail']);
#####

##### PERMISSÃO #####
 Route::get('/permissao',[PermissaoController::class,'index']);
 Route::post('/permissao',[PermissaoController::class,'store']);
 Route::get('/permissao/{id}',[PermissaoController::class,'show']);
 Route::put('/permissao/{id}',[PermissaoController::class,'update']);
 Route::delete('/permissao/{id}',[PermissaoController::class,'destroy']);

 Route::group(['middleware'=>['auth:sanctum']],function(){
 Route::post('/acl',[AuthController::class,'acl']);
 Route::post('/logout',[AuthController::class,'logout']);
 Route::post('/logado/grupo/{id}',[GrupoController::class,'usuarioLogadoGrupo']);//Usuario logado inscreve-se num grupo
 Route::get('/logado/funcionalidades',[AuthController::class,'usuLogadoFunc']);
 });
#####

##### SEGUIMENTO #####
 Route::get('/seguimento',[SeguimentoController::class,'index']);
 Route::post('/seguimento',[SeguimentoController::class,'store']);
 Route::get('/seguimento/{id}',[SeguimentoController::class,'show']);
 Route::put('/seguimento/{id}',[SeguimentoController::class,'update']);
 Route::delete('/seguimento/{id}',[SeguimentoController::class,'destroy']);
 Route::get('/seguimento/{id}/clientes',[SeguimentoController::class,'clientes']);
#####

##### PRODUTO #####
 Route::get('/produto',[ProdutoController::class,'index']);
 Route::post('/produto',[ProdutoController::class,'store']);
 Route::get('/produto/{id}',[ProdutoController::class,'show']);
 Route::put('/produto/{id}',[ProdutoController::class,'update']);
 Route::delete('/produto/{id}',[ProdutoController::class,'destroy']);
#####

##### CLIENTES #####
 Route::get('/cliente',[ClienteController::class,'index']);
 Route::post('/cliente',[ClienteController::class,'store']);
 Route::get('/cliente/{id}',[ClienteController::class,'show']);
 Route::put('/cliente/{id}',[ClienteController::class,'update']);
 Route::delete('/cliente/{id}',[ClienteController::class,'destroy']);
#####

##### PRODUÇÃO #####
 Route::get('/producao',[ProducaoController::class,'index']);
 Route::post('/producao',[ProducaoController::class,'store']);
 Route::get('/producao/{id}',[ProducaoController::class,'show']);
 Route::put('/producao/{id}',[ProducaoController::class,'update']);
 Route::delete('/producao/{id}',[ProducaoController::class,'destroy']);
 Route::post('/prod/filtros',[ProducaoController::class,'filtrar']);
 Route::post('/prod/painel/desempenho',[ProducaoController::class,'estatisticasSetor']);
 Route::get('/producao/desempenho/{id}',[ProducaoController::class,'desempenho']);
 Route::get('/prod/desempenho/',[ProducaoController::class,'desempenhoTodos']);
 Route::get('/prod/{id}/setores',[ProducaoController::class,'listaContainers']);
 Route::get('/prod/{id}/percent',[ProducaoController::class,'percentualExecucao']);
 Route::post('/prod/estatistica/media-tempo-servico',[ProducaoController::class,'mediaTempoServico']);
 Route::post('/prod/estatistica/indicadores',[ProducaoController::class,'estatisticasOp']);
 
 
 
#####

##### SETOR #####
 Route::get('/setor',[SetorController::class,'index']);
 Route::post('/setor',[SetorController::class,'store']);
 Route::get('/setor/{id}',[SetorController::class,'show']);
 Route::post('/setor/nome',[SetorController::class,'showNome']);
 Route::put('/setor/{id}',[SetorController::class,'update']);
 Route::delete('/setor/{id}',[SetorController::class,'destroy']);
 Route::patch('/setor/{id}',[SetorController::class,'cadPeso']);
#####

##### SETOR EXECUTANTE #####
Route::get('/setor-executante',[SetorExecutanteController::class,'index']);
Route::post('/setor-executante',[SetorExecutanteController::class,'store']);
Route::get('/setor-executante/{id}',[SetorExecutanteController::class,'show']);
Route::put('/setor-executante/{id}',[SetorExecutanteController::class,'update']);
Route::delete('/setor-executante/{id}',[SetorExecutanteController::class,'destroy']);
#####

##### PESSOA #####
 Route::get('/pessoa',[PessoaController::class,'index']);
 Route::post('/pessoa',[PessoaController::class,'store']);
 Route::get('/pessoa/{id}',[PessoaController::class,'show']);
 Route::put('/pessoa/{id}',[PessoaController::class,'update']);
 Route::delete('/pessoa/{id}',[PessoaController::class,'destroy']);
#####

##### SERVIÇO #####
 Route::get('/servico',[ServicoController::class,'index']);
 Route::post('/servico',[ServicoController::class,'store']);
 Route::get('/servico/{id}',[ServicoController::class,'show']);
 Route::put('/servico/{id}',[ServicoController::class,'update']);
 Route::delete('/servico/{id}',[ServicoController::class,'destroy']);
#####

##### TRABALHO #####
 Route::get('/trabalho',[TrabalhoController::class,'index']);
 Route::post('/trabalho',[TrabalhoController::class,'store']);
 Route::get('/trabalho/{id}',[TrabalhoController::class,'show']);
 Route::put('/trabalho/{id}',[TrabalhoController::class,'update']);
 Route::delete('/trabalho/{id}',[TrabalhoController::class,'destroy']);
#####

##### TIPO PRODUTO #####
 Route::get('/tipoProduto',[TipoProdutoController::class,'index']);
 Route::post('/tipoProduto',[TipoProdutoController::class,'store']);
 Route::get('/tipoProduto/{id}',[TipoProdutoController::class,'show']);
 Route::put('/tipoProduto/{id}',[TipoProdutoController::class,'update']);
 Route::delete('/tipoProduto/{id}',[TipoProdutoController::class,'destroy']);
#####

##### TIPO SERVIÇO #####
 Route::get('/tipoServico',[TipoServicoController::class,'index']);
 Route::post('/tipoServico',[TipoServicoController::class,'store']);
 Route::get('/tipoServico/{id}',[TipoServicoController::class,'show']);
 Route::put('/tipoServico/{id}',[TipoServicoController::class,'update']);
 Route::delete('/tipoServico/{id}',[TipoServicoController::class,'destroy']);
#####
