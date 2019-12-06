<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Estoque;
use App\Item;
use App\Fornecedor;
use App\Localidade;
use App\Saida;
use App\Entrada;


use DB;

class CadastrarEntradaController extends Controller
{

    public function index()
    {
    
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {

        //Função para levar os dados do estoque pra view de cadastro da entrada;


        //Instanciando a Model "Estoque"
        $editar = new Estoque();

  
        //Consultando os dados com JOIN da tabela estoque
        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor') 
        ->where('idEstoque', $id)
        ->first();

        //Instanciando e fazendo uma consulta geral na tabela itens
        $item = new Item();
        $item = $item::all();
       
        //Instanciando e fazendo uma consulta geral na tabela Fornecedor
        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        //Instanciando e fazendo uma consulta geral na tabela Localidade
        $localidade = new Localidade();
        $localidade = $localidade::all();
        
        

       //Retornando pra view de cadastro de entrada e puxandoa as variáveis
        return view('cadastrar_entrada')

        ->with(compact('editar'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('localidade'))

        ->with(compact('item'));
    }


    public function update(Request $request, $id)
    {   

        //Função para atualizar o estoque;

        $editar = new Estoque();
        $editar = $editar::all();

        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        $entrada = new Entrada();
        
        
        //Adicionando o valor da entrada a quantidade total do item selecionado;

        $editar = DB::table('tbEstoque')
        ->where('idEstoque', $id)
        ->increment('quantidade_total', $entrada->quantidade_entrada = $request->input('quantidade_entrada'));

        $entrada->quantidade_entrada = $request->input('quantidade_entrada') ;
        $entrada->idLocalidade = $request->input('idLocalidade') ;
        $entrada->idEstoque = $request->input('idEstoque') ;
        $entrada->data_entrada = now();
        $entrada->save();

   
        


        return redirect()->back()
       
        ->with(compact('editar'))

        ->with(compact('entrada'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with('cadastrook','Entrada registrada com sucesso')

        ->with(compact('item'));
    }


    public function destroy($id)
    {
        //
    }
}
