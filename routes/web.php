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

//Principal
Route::get('/', 'CadastrarItemController@main')->name('home')->middleware('auth');

//Cadastros, atualizações e exclusões
Route::resource('cadastrar_item', 'CadastrarItemController')->middleware('auth');
Route::resource('cadastrar_fornecedor', 'CadastrarFornecedorController')->middleware('auth');
Route::resource('cadastrar_localidade', 'CadastrarLocalidadeController')->middleware('auth');
Route::resource('cadastrar_estoque', 'CadastrarEstoqueController')->middleware('auth');
Route::resource('cadastrar_saida', 'CadastrarSaidaController')->middleware('auth');
Route::resource('cadastrar_entrada', 'CadastrarEntradaController')->middleware('auth');



//Listagens
Route::get('listar_item', 'CadastrarItemController@listar')->name('listar_item')->middleware('auth');
Route::get('listar_fornecedor', 'CadastrarFornecedorController@listar')->name('listar_fornecedor')->middleware('auth');
Route::get('listar_localidade', 'CadastrarLocalidadeController@listar')->name('listar_localidade')->middleware('auth');
Route::get('listar_estoque', 'CadastrarEstoqueController@listar')->name('listar_estoque')->middleware('auth');
Route::get('listar_saida', 'CadastrarSaidaController@listar')->name('listar_saida')->middleware('auth');


// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
