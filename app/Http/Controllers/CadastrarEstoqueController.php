<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Estoque;
use App\Item;
use App\Fornecedor;
use App\Localidade;
use App\Http\Controllers\View;


use DB;

class CadastrarEstoqueController extends Controller
{
 
    public function index()
    {
        $estoque = new Estoque();
        $estoque = $estoque::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();

        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        // return view('cadastrar_estoque', ['estoque'=>$estoque], ['fornecedor'=>$fornecedor], ['item'=>$item]);

        return redirect()->route('cadastrar_estoque')

        ->with(compact('estoque'))

        ->with(compact('localidade'))

        ->with(compact('fornecedor'))

        ->with(compact('item'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        
        //Função pra 
        $estoque = new Estoque();
        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        
        $estoque->quantidade_total = $request->input('quantidade_total') ;
        $estoque->numero_nf = $request->input('numero_nf') ;
        $estoque->data_nf = $request->input('data_nf') ;
        $estoque->data_garantia = $request->input('data_garantia') ;
        $estoque->idItem = $request->input('idItem') ;
        $estoque->idFornecedor = $request->input('idFornecedor') ;
        $estoque->idLocalidade = $request->input('idLocalidade') ;
        $estoque->data_entrada = now();

        $estoque->save();

 
        return redirect()->route('home')

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('localidade'))

        ->with('sucess','Estoque cadastrado com sucesso')

        ->with(compact('item'));

        
    }


    public function show($id)
    {
        //
    }

    public function listar(){

        $estoque = new Estoque();

        $estoque = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbEstoque.idLocalidade')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbFornecedor.razao_social', 'tbLocalidade.localidade', 'tbLocalidade.setor') 
        ->orderBy('data_entrada', 'DESC')
        ->get();

        
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();
        

        return view('listar_estoque')

        ->with(compact('estoque'))

        ->with(compact('localidade'))

        ->with(compact('item'))

        ->with(compact('fornecedor'));
        
    }

    public function edit($id)
    {
       
        $editar = new Estoque();

        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor') 
        ->where('idEstoque', $id)
        ->first();

        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        
        $localidade = new Localidade();
        $localidade = $localidade::all();
        

       
        return view('editar_estoque')

        ->with(compact('editar'))

        ->with(compact('fornecedor'))

        ->with(compact('localidade'))

        ->with(compact('item'));

    }

    public function update(Request $request, $id)
    {
        $editar = new Estoque();
        $editar = DB::table ('tbEstoque')
        ->where('idEstoque', $id)
        ->update(
        ['quantidade_total' =>$request->input('quantidade_total'),
        'numero_nf' =>$request->input('numero_nf'),
        'data_nf' =>$request->input('data_nf'),
        'data_garantia' =>$request->input('data_garantia'),
        'idItem' =>$request->input('idItem'),
        'idFornecedor' =>$request->input('idFornecedor')]
        );
       
            
        if(isset($editar)){
            
        return redirect()->route('home');
       
        }
    }

    public function destroy($id)
    {
        $estoque = new Estoque();
        

        $deletedRows =  $item::where('idEstoque', $id)->delete();
        
        

        if(isset($item)){
            return redirect()->route('editar_estoque', compact('estoque'));
        }
    }
}
