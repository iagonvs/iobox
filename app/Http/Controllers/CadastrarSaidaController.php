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
use App\Http\Controllers\View;


use DB;


class CadastrarSaidaController extends Controller
{

    public function index()
    {
        $estoque = new Estoque();
        $estoque = $estoque::all();

        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();

        $saida = new Saida();

        // return view('cadastrar_estoque', ['estoque'=>$estoque], ['fornecedor'=>$fornecedor], ['item'=>$item]);

        return view('listar_estoque')

        ->with(compact('editar'))

        ->with(compact('saida'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('item'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request, $id)
    {
        $editar = new Estoque();
        $editar = $editar::all();

        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        $saida = new Saida();
        
        $editar = DB::table('tbEstoque')
        ->where('idEstoque', $id)
        ->decrement('quantidade_total', $saida->quantidade_saida = $request->input('quantidade_saida'));
 
        return redirect()->route('home')
       

        ->with(compact('editar'))

        ->with(compact('saida'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('item'));
    }

    public function listar(){

        $estoque = new Estoque();
        $saida = new Saida();

        $saida = DB::table ('tbSaida')
        ->join('tbEstoque', 'tbSaida.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbLocalidade.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->select('idSaida','quantidade_saida','data_saida','tbLocalidade.localidade','tbEstoque.idEstoque','tbItem.descricao_item') 
        ->get();

        
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();
        
        $localidade = new Localidade();
        $localidade = $localidade::all();

        return view('listar_estoque')

        ->with(compact('saida'))

        ->with(compact('estoque'))

        ->with(compact('item'))

        ->with(compact('localidade'))

        ->with(compact('saida'));
        
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $editar = new Estoque();

  

        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor') 
        ->where('idEstoque', $id)
        ->first();

        $item = new Item();
        $item = $item::all();
       

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();
        
        

       
        return view('cadastrar_saida')

        ->with(compact('editar'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('localidade'))

        ->with(compact('item'));
    }


    public function update(Request $request, $id)
    {
        $editar = new Estoque();
        $editar = $editar::all();

        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        $saida = new Saida();

        $editar->quantidade_total = $request->input('quantidade_total') ;

        if($editar->quantidade_total > 0){
        $editar = DB::table('tbEstoque')
        ->where('idEstoque', $id)
        ->decrement('quantidade_total', $saida->quantidade_saida = $request->input('quantidade_saida'));

        $saida->quantidade_saida = $request->input('quantidade_saida') ;
        $saida->idLocalidade = $request->input('idLocalidade') ;
        $saida->idEstoque = $request->input('idEstoque') ;
        $saida->descricao_saida = $request->input('descricao_saida') ;
        $saida->data_saida = now();
        $saida->save();

        return redirect()->back()
       
            ->with(compact('editar'))
    
            ->with(compact('saida'))
    
            ->with(compact('estoque'))
    
            ->with(compact('fornecedor'))
    
            ->with(compact('item'))

            ->with('saidaok','Saida registrada com sucesso');

      }else{
          
        return redirect()
        ->back()
        ->with('errors', 'Infelizmente não tem como gerar saída: Não existem itens');
                   
      }
        
      
       

        return redirect()->route('home')
       
        ->with(compact('editar'))

        ->with(compact('saida'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('item'));
    }



    public function destroy($id)
    {
      
    }
}
