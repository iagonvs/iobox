<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Item;
use App\Fornecedor;
use App\Localidade;
use App\Estoque;
use App\Saida;
use App\Entrada;


use DB;

class CadastrarItemController extends Controller
{

    public function main(){

        $count = Item::count(); 
        $count_fornecedor = Fornecedor::count(); 
        $count_Localidade = Localidade::count(); 
        $count_estoque = Estoque::count(); 

        $saida = new Saida();
        $saida = DB::table ('tbSaida')
        ->join('tbEstoque', 'tbSaida.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbLocalidade.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->join('users', 'tbSaida.idUsuario', '=', 'users.id')
        ->select('idSaida','quantidade_saida', 'data_saida','descricao_saida','tbLocalidade.localidade','tbEstoque.idEstoque','tbItem.descricao_item', 'users.name') 
        ->orderBy('data_saida', 'DESC')
        ->Paginate(5);

        $entrada = new Entrada();
        $entrada = DB::table ('tbEntrada')
        ->join('tbEstoque', 'tbEntrada.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbLocalidade.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->select('idEntrada','quantidade_entrada', 'tbEntrada.data_entrada','tbLocalidade.localidade','tbEstoque.idEstoque','tbItem.descricao_item', 'tbEstoque.quantidade_total') 
        ->orderBy('data_entrada', 'DESC')
        ->Paginate(5);

        
        $item = new Item();
        $item = $item::all();

        
        

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        return view('home')

        ->with(compact('count'))

        ->with(compact('count_fornecedor'))

        ->with(compact('count_estoque'))

        ->with(compact('entrada'))

        ->with(compact('saida'))

        ->with(compact('count_Localidade'));
    }

    public function index()
    {
        $item = new Item();
        $item = $item::all();

        return view('cadastrar_item')

        ->with(compact('item'));

        
    }


    public function create()
    {
        //
    }

    public function saida(Request $request, $id){

    }


    public function store(Request $request)
    {
       
        $item = new Item();

        
        $item->descricao_item = $request->input('descricao_item') ;

        $item->save();

        if ($item) {
        return redirect()
                   ->back()
                   ->with('sucess','Item cadastrado com sucesso');
        } else {
                    return redirect()
                           ->back()
                           ->with('errors', 'Ocorreu um erro ao tentar cadastrar item');
                }
    }

 
    public function show($id)
    {
        // $item = Item::find($id);

        // return view('listar_item', compact('item'));
    }

    public function listar(Request $request){

        $item = new Item();

        $search = $request->get('search');

        $item = Item::where('descricao_item', 'LIKE', '%'.$search.'%')
                            ->paginate(10);

        return view('listar_item', compact('item', 'search'));
    

    }

    public function edit($id)
    {
        $editar = new Item();
        $editar =  Item::get()
        ->where('idItem', $id)
        ->first();
        

        if(isset($editar)){
            return view('editar_item', ['editar'=>$editar]);
        }
        
    }

    public function update(Request $request, $id)
    {
        $editar = new Item();
        $editar = DB::table ('tbItem')
        ->where('idItem', $id)
        ->update(
        ['descricao_item' =>$request->input('descricao_item')]
        );
       
            
        if(isset($editar)){
            
        return redirect()->route('home');
       
        }
    }


    public function destroy($id)
    {
        $item = new Item();
        

        $deletedRows =  $item::where('idItem', $id)->delete();
        
        

        if(isset($item)){
            return redirect()->route('listar', compact('item'));
        }
    }
}
