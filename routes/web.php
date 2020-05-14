<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/////////////////////////////////////////////////////////////////////////////////////
// //ROTA PRINCIPAL - DASHBOARD
Route::get('/', 'CadastrarItemController@main')->name('home')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ROTAS DE CADASTROS, EDIÇÕES, ATUALIZAÇÕES E EXCLUSÕES; RESOURCE = TODAS FUNCTIONS / GET = ACESSO A URL 
Route::resource('cadastrar_item', 'CadastrarItemController')->middleware('auth');
Route::get('cadastrar_item', 'CadastrarItemController@index')->name('cadastrar_item')->middleware('auth');


Route::resource('cadastrar_fornecedor', 'CadastrarFornecedorController')->middleware('auth');
Route::get('cadastrar_fornecedor', 'CadastrarFornecedorController@index')->name('cadastrar_fornecedor')->middleware('auth');

Route::resource('cadastrar_localidade', 'CadastrarLocalidadeController')->middleware('auth');
Route::get('cadastrar_localidade', 'CadastrarLocalidadeController@index')->name('cadastrar_localidade')->middleware('auth');

Route::resource('cadastrar_estoque', 'CadastrarEstoqueController')->middleware('auth');
Route::get('cadastrar_estoque', 'CadastrarEstoqueController@index')->name('cadastrar_estoque')->middleware('auth');

Route::resource('cadastrar_saida', 'CadastrarSaidaController')->middleware('auth');
Route::resource('registrar_saida', 'CadastrarSaidaController')->middleware('auth');
Route::resource('cadastrar_entrada', 'CadastrarEntradaController')->middleware('auth');

Route::resource('cadastrar_solicitacao', 'CadastrarSolicitacaoController')->middleware('auth');
Route::get('cadastrar_solicitacao', 'CadastrarSolicitacaoController@index')->name('cadastrar_solicitacao')->middleware('auth');

Route::resource('cadastrar_transicao', 'CadastrarTransicaoController')->middleware('auth');

Route::resource('cadastrar_linha', 'CadastrarLinhaController')->middleware('auth');
Route::get('cadastrar_linha', 'CadastrarLinhaController@index')->name('cadastrar_linha')->middleware('auth');

Route::resource('cadastrar_empresa', 'CadastrarEmpresaController')->middleware('auth');
Route::get('cadastrar_empresa', 'CadastrarEmpresaController@index')->name('cadastrar_empresa')->middleware('auth');

Route::resource('cadastrar_onibus', 'CadastrarOnibusController')->middleware('auth');
Route::get('cadastrar_onibus', 'CadastrarOnibusController@index')->name('cadastrar_onibus')->middleware('auth');

Route::resource('cadastrar_tipo_onibus', 'CadastrarTipoOnibusController')->middleware('auth');
Route::get('cadastrar_tipo_onibus', 'CadastrarTipoOnibusController@index')->name('cadastrar_tipo_onibus')->middleware('auth');

Route::resource('cadastrar_roteador', 'CadastrarRoteadorController')->middleware('auth');
Route::get('cadastrar_roteador', 'CadastrarRoteadorController@index')->name('cadastrar_roteador')->middleware('auth');

Route::resource('cadastrar_controle_wifi', 'CadastrarControleWifiController')->middleware('auth');
Route::get('cadastrar_controle_wifi', 'CadastrarControleWifiController@index')->name('cadastrar_controle_wifi')->middleware('auth');

Route::resource('cadastrar_agencia', 'CadastrarAgenciaController')->middleware('auth');
Route::get('cadastrar_agencia', 'CadastrarAgenciaController@index')->name('cadastrar_agencia')->middleware('auth');

Route::resource('cadastrar_inventario', 'CadastrarInventarioController')->middleware('auth');
Route::get('cadastrar_inventario', 'CadastrarInventarioController@index')->name('cadastrar_inventario')->middleware('auth');
Route::get('cadastrar_imagem', 'CadastrarInventarioController@imagem')->name('cadastrar_imagem')->middleware('auth');

Route::resource('cadastrar_marca_impressora', 'CadastrarMarcaImpressoraController')->middleware('auth');
Route::get('cadastrar_marca_impressora', 'CadastrarMarcaImpressoraController@index')->name('cadastrar_marca_impressora')->middleware('auth');

Route::resource('cadastrar_modelo_impressora', 'CadastrarModeloImpressoraController')->middleware('auth');
Route::get('cadastrar_modelo_impressora', 'CadastrarModeloImpressoraController@index')->name('cadastrar_modelo_impressora')->middleware('auth');

Route::resource('cadastrar_status_controle', 'CadastrarStatusControleController')->middleware('auth');
Route::get('cadastrar_status_controle', 'CadastrarStatusControleController@index')->name('cadastrar_status_controle')->middleware('auth');

Route::resource('cadastrar_setor_agencia', 'CadastrarSetorAgenciaController')->middleware('auth');
Route::get('cadastrar_setor_agencia', 'CadastrarSetorAgenciaController@index')->name('cadastrar_setor_agencia')->middleware('auth');

Route::resource('cadastrar_controle_impressora', 'CadastrarControleImpressoraController')->middleware('auth');
Route::get('cadastrar_controle_impressora', 'CadastrarControleImpressoraController@index')->name('cadastrar_controle_impressora')->middleware('auth');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//ROTAS DAS LISTAGENS
Route::get('listar_solicitacao', 'CadastrarSolicitacaoController@listar')->name('listar_solicitacao')->middleware('auth');

Route::get('listar_item', 'CadastrarItemController@listar')->name('listar_item')->middleware('auth');
Route::POST('listar_item', 'CadastrarItemController@listar')->name('listar_item')->middleware('auth');

Route::post('listar_fornecedor', 'CadastrarFornecedorController@listar')->name('listar_fornecedor')->middleware('auth');
Route::get('listar_fornecedor', 'CadastrarFornecedorController@listar')->name('listar_fornecedor')->middleware('auth');

Route::post('listar_localidade', 'CadastrarLocalidadeController@listar')->name('listar_localidade')->middleware('auth');
Route::get('listar_localidade', 'CadastrarLocalidadeController@listar')->name('listar_localidade')->middleware('auth');

Route::post('listar_estoque', 'CadastrarEstoqueController@listar')->name('listar_estoque')->middleware('auth');
Route::get('listar_estoque', 'CadastrarEstoqueController@listar')->name('listar_estoque')->middleware('auth');

Route::get('listar_saida', 'CadastrarSaidaController@listar')->name('listar_saida')->middleware('auth');

Route::post('listar_item_saida', 'CadastrarSaidaController@listar')->name('listar_item_saida')->middleware('auth');
Route::post('listar_item_entrada', 'CadastrarSaidaController@listar_entrada')->name('listar_item_entrada')->middleware('auth');
Route::get('listar_item_saida', 'CadastrarSaidaController@listar')->name('listar_item_saida')->middleware('auth');
Route::get('listar_item_entrada', 'CadastrarSaidaController@listar_entrada')->name('listar_item_entrada')->middleware('auth');

Route::post('listar_item_transicao', 'CadastrarTransicaoController@listar')->name('listar_item_transicao')->middleware('auth');
Route::get('listar_item_transicao', 'CadastrarTransicaoController@listar')->name('listar_item_transicao')->middleware('auth');

Route::post('listar_linha', 'CadastrarLinhaController@listar')->name('listar_linha')->middleware('auth');
Route::get('listar_linha', 'CadastrarLinhaController@listar')->name('listar_linha')->middleware('auth');

Route::post('listar_empresa', 'CadastrarEmpresaController@listar')->name('listar_empresa')->middleware('auth');
Route::get('listar_empresa', 'CadastrarEmpresaController@listar')->name('listar_empresa')->middleware('auth');

Route::post('listar_onibus', 'CadastrarOnibusController@listar')->name('listar_onibus')->middleware('auth');
Route::get('listar_onibus', 'CadastrarOnibusController@listar')->name('listar_onibus')->middleware('auth');

Route::post('listar_tipo_onibus', 'CadastrarTipoOnibusController@listar')->name('listar_tipo_onibus')->middleware('auth');
Route::get('listar_tipo_onibus', 'CadastrarTipoOnibusController@listar')->name('listar_tipo_onibus')->middleware('auth');

Route::post('listar_roteador', 'CadastrarRoteadorController@listar')->name('listar_roteador')->middleware('auth');
Route::get('listar_roteador', 'CadastrarRoteadorController@listar')->name('listar_roteador')->middleware('auth');

Route::post('listar_controle_wifi', 'CadastrarControleWifiController@listar')->name('listar_controle_wifi')->middleware('auth');
Route::get('listar_controle_wifi', 'CadastrarControleWifiController@listar')->name('listar_controle_wifi')->middleware('auth');

Route::post('listar_inventario', 'CadastrarInventarioController@listar')->name('listar_inventario')->middleware('auth');
Route::get('listar_inventario', 'CadastrarInventarioController@listar')->name('listar_inventario')->middleware('auth');

Route::post('listar_agencia', 'CadastrarAgenciaController@listar')->name('listar_agencia')->middleware('auth');
Route::get('listar_agencia', 'CadastrarAgenciaController@listar')->name('listar_agencia')->middleware('auth');

Route::post('listar_marca_impressora', 'CadastrarMarcaImpressoraController@listar')->name('listar_marca_impressora')->middleware('auth');
Route::get('listar_marca_impressora', 'CadastrarMarcaImpressoraController@listar')->name('listar_marca_impressora')->middleware('auth');

Route::post('listar_modelo_impressora', 'CadastrarModeloImpressoraController@listar')->name('listar_modelo_impressora')->middleware('auth');
Route::get('listar_modelo_impressora', 'CadastrarModeloImpressoraController@listar')->name('listar_modelo_impressora')->middleware('auth');

Route::post('listar_status_controle', 'CadastrarStatusControleController@listar')->name('listar_status_controle')->middleware('auth');
Route::get('listar_status_controle', 'CadastrarStatusControleController@listar')->name('listar_status_controle')->middleware('auth');

Route::post('listar_setor_agencia', 'CadastrarSetorAgenciaController@listar')->name('listar_setor_agencia')->middleware('auth');
Route::get('listar_setor_agencia', 'CadastrarSetorAgenciaController@listar')->name('listar_setor_agencia')->middleware('auth');

Route::post('listar_controle_impressora', 'CadastrarControleImpressoraController@listar')->name('listar_controle_impressora')->middleware('auth');
Route::get('listar_controle_impressora', 'CadastrarControleImpressoraController@listar')->name('listar_controle_impressora')->middleware('auth');

Route::post('listar_controle_impressora_saida', 'CadastrarControleImpressoraController@listar_saida')->name('listar_controle_impressora_saida')->middleware('auth');
Route::get('listar_controle_impressora_saida', 'CadastrarControleImpressoraController@listar_saida')->name('listar_controle_impressora_saida')->middleware('auth');

Route::post('listar_controle_impressora_volta', 'CadastrarControleImpressoraController@listar_volta')->name('listar_controle_impressora_volta')->middleware('auth');
Route::get('listar_controle_impressora_volta', 'CadastrarControleImpressoraController@listar_volta')->name('listar_controle_impressora_volta')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ROTA DAS EXPORTAÇÕES DE RELATÓRIO PDF
Route::get('relatorio_saida', 'CadastrarSaidaController@imprimir_pdf')->name('relatorio_saida')->middleware('auth');
Route::get('relatorio_entrada', 'CadastrarEntradaController@imprimir_pdf')->name('relatorio_entrada')->middleware('auth');
Route::get('relatorio_wifi', 'CadastrarControleWifiController@imprimir_pdf')->name('relatorio_wifi')->middleware('auth');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////
//ROTAS DO LOGIN, PARA CONSULTAR: "PHP ARTISAN ROUTE:LIST"
Auth::routes();

////////////////////////////////////////////////////////////////
