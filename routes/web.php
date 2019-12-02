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
Route::get('/', 'CadastrarItemController@main')->name('home');

//Cadastros, atualizações e exclusões
Route::resource('cadastrar_item', 'CadastrarItemController');
Route::resource('cadastrar_fornecedor', 'CadastrarFornecedorController');
Route::resource('cadastrar_localidade', 'CadastrarLocalidadeController');
Route::resource('cadastrar_estoque', 'CadastrarEstoqueController');
Route::resource('cadastrar_saida', 'CadastrarSaidaController');
Route::resource('cadastrar_entrada', 'CadastrarEntradaController');



//Listagens
Route::get('listar_item', 'CadastrarItemController@listar')->name('listar_item');
Route::get('listar_fornecedor', 'CadastrarFornecedorController@listar')->name('listar_fornecedor');
Route::get('listar_localidade', 'CadastrarLocalidadeController@listar')->name('listar_localidade');
Route::get('listar_estoque', 'CadastrarEstoqueController@listar')->name('listar_estoque');
Route::get('listar_saida', 'CadastrarSaidaController@listar')->name('listar_saida');


// Route::get('/home', 'HomeController@index')->name('home');
