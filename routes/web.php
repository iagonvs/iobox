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

// //AuthAdmin
// Route::get('/home', 'AdminController@index')->name('home')->middleware('auth');

// //Principal
Route::get('/', 'CadastrarItemController@main')->name('home')->middleware('auth');

// Route::prefix('/admin')->group(function() {
//     Route::get('/login', 'Auth\AdminLoginController@index')->name('admin.login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('home.submit');
//     Route::get('/', 'CadastrarItemController@main')->name('/home2');
// });

//Cadastros, atualizações e exclusões
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



//Listagens
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

Route::get('relatorio_saida', 'CadastrarSaidaController@imprimir_pdf')->name('relatorio_saida')->middleware('auth');

// Route::get('/', 'HomeController@index')->name('regular')->middleware('auth');
// Route::get('/', 'HomeController@main')->name('login')->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
