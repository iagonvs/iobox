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
use App\Usuario;
use App\Transicao;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\View;


use DB;
//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO A TRANSIÇÃO DE UM ITEM DE UM ESTOQUE EM UMA LOCALIZAÇÃO, PRA OUTRO ESTOQUE EM OUTRA LOCALIZAÇÃO
class CadastrarTransicaoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function listar(Request $request){

        $estoque = new Estoque();
        $saida = new Saida();

        
        $search = $request->get('search');
        $search_localidade = $request->get('search_localidade');

        //LISTANDO TODOS OS ITENS CADASTRADOS NO ESTOQUE
        $estoque = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor','tbLocalidade.localidade')
        ->where('tbItem.descricao_item', 'LIKE', '%'.$search.'%')
        ->where('tbLocalidade.localidade', 'LIKE', '%'.$search_localidade.'%')
        ->Paginate(15);

        
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();
        
        $localidade = new Localidade();
        $localidade = $localidade::all();

        return view('listar_item_transicao')

        ->with(compact('saida'))

        ->with(compact('search'))

        ->with(compact('search_localidade'))

        ->with(compact('estoque'))

        ->with(compact('item'))

        ->with(compact('localidade'))

        ->with(compact('fornecedor'));
        
    }


 
    public function edit($id)
    {
        $editar = new Estoque();

  
        //CONSULTANDO O ITEM SELECIONADO PRA TRAZER TODAS AS INFORMAÇÕES
        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade', 'tbLocalidade.idLocalidade', 'tbLocalidade.setor') 
        ->where('idEstoque', $id)
        ->first();

        $item = new Item();
        $item = $item::all();
       

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();
        
        

       
        return view('cadastrar_transicao')

        ->with(compact('editar'))

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
        $usuario = new Usuario();
        $transicao = new Transicao();

        $editar->quantidade_total = $request->input('quantidade_total');


        //ESSA FUNÇÃO VAI SUBTRAIR A QUANTIDADE TOTAL PELA QUANTIDADE A SER RETIRADA E O ESTOQUE PRIMÁRIO TERÁ O VALOR DESSA SUBTRAÇÃO
        if($editar->quantidade_total > 0){
            $editar = DB::table('tbEstoque')
        ->where('idEstoque', $id)
        ->decrement('quantidade_total', $transicao->quantidade_transicao = $request->input('quantidade_transicao'));

        //APÓS ISSO ELE SALVARÁ UM NOVO ESTOQUE, NA NOVA LOCALIZAÇÃO E COM O VALOR DA QUANTIDADE QUE FOI RETIRADA DO ESTOQUE PRIMÁRIO
        if(isset($editar)){
            $estoque = new Estoque();
            $estoque = $estoque::all();
   
            $estoque = new Estoque();
            $estoque->quantidade_total = $request->input('quantidade_transicao') ;
            $estoque->numero_nf = $request->input('numero_nf') ;
            $estoque->data_nf = $request->input('data_nf') ;
            $estoque->data_garantia = $request->input('data_garantia') ;
            $estoque->idItem = $request->input('idItem') ;
            $estoque->idFornecedor = $request->input('idFornecedor') ;
            $estoque->idLocalidade = $request->input('idLocalidade') ;
            $estoque->estoque_min = $request->input('estoque_min') ;
            $estoque->data_entrada = now();
            $estoque->save();

            $transicao = new Transicao();
            $transicao->quantidade_transicao = $request->input('quantidade_transicao') ;
            $transicao->idEstoque = $request->input('idEstoque') ;
            $transicao->idLocalidade = $request->input('idLocalidade') ;
            $transicao->idUser = $usuario = Auth::user()->id;
            $transicao->data_transicao = now();
            $transicao->save();

            return redirect()->back()
       
            ->with(compact('editar'))

            ->with(compact('localidade'))
    
            ->with(compact('transicao'))
    
            ->with(compact('estoque'))
    
            ->with(compact('fornecedor'))
    
            ->with(compact('item'))

            ->with('sucess','Transição registrada com sucesso');

        }

        }else{
            return redirect()
            ->back()
            ->with('errors', 'Infelizmente não tem como gerar saída: Não existem itens a serem retirados');
        }
        

      
    
}

    public function destroy($id)
    {
        //
    }
}
