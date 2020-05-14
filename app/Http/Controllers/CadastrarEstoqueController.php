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

//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO O ESTOQUE
class CadastrarEstoqueController extends Controller
{
 
    public function index()
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        //ACESSO PRINCIPAL A TELA DE CADASTRO DE ESTOQUE, MOSTRANDO TODOS OS ITENS, LOCALIDADES E FORNECEDORES. 
        $estoque = new Estoque();
        $estoque = $estoque::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();

        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        return view('cadastrar_estoque')

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

        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        
        //CHAMANDO TODAS AS MODELS QUE SERÃO INSERIDAS NA ENTRADA DO ESTOQUE
        $estoque = new Estoque();
        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        //VALIDAÇÃO DOS CAMPOS A SEREM PREENCHIDOS 
        $estoque = $request->validate([
            'quantidade_total' => 'required',
            'idItem' => 'required',
            'idFornecedor' => 'required',
            'idLocalidade' => 'required',
        ]);

        //INSTANCIANDO NOVAMENTE A MODEL "ESTOQUE" PARA FAZER O INSERT NO BANCO
        $estoque_cadastrar = new Estoque();

        //INSERINDO OS DADOS DIGITADOS NO INPUT DO FORMULÁRIO DE CADASTRO DE ESTOQUE
        $estoque_cadastrar->quantidade_total = $request->input('quantidade_total') ;
        $estoque_cadastrar->numero_nf = $request->input('numero_nf') ;
        $estoque_cadastrar->data_nf = $request->input('data_nf') ;
        $estoque_cadastrar->data_garantia = $request->input('data_garantia') ;
        $estoque_cadastrar->idItem = $request->input('idItem') ;
        $estoque_cadastrar->idFornecedor = $request->input('idFornecedor') ;
        $estoque_cadastrar->idLocalidade = $request->input('idLocalidade') ;
        $estoque_cadastrar->estoque_min = $request->input('estoque_min') ;
        $estoque_cadastrar->data_entrada = now();

        //SALVADO NO BANCO DE DADOS NA TABELA "ESTOQUE"
        $estoque_cadastrar->save();

        //APÓS A INSERSÃO ELE RETORNA PRA TELA DE LISTAGEM
        return redirect()->route('listar_estoque')

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

    public function listar(Request $request){

        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }

        //INSTANCIANDO A MODEL DE ESTOQUE NA VARIÁVEL $estoque
        $estoque = new Estoque();

        //USANDO A FUNÇÃO "SEARCH" PARA O CAMPO "PESQUISAR" NA TELA DE LISTAGEM
        $search = $request->get('search');
        $search_localidade = $request->get('search_localidade');
                
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();

        //CONSULTA TRAZENDO TODOS OS DADOS INSERIDOS NA TABELA DE ESTOQUE, COM A OPÇÃO DE PESQUISA USANDO A FUNÇÃO "SEARCH" NO WHERE
        $estoque = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbFornecedor.razao_social', 'tbLocalidade.localidade', 'tbLocalidade.setor', 'estoque_min') 
        ->where('tbItem.descricao_item', 'LIKE', '%'.$search.'%')
        ->where('tbLocalidade.localidade', 'LIKE', '%'.$search_localidade.'%')
        ->Paginate(10);


        //RETORNANDO PARA TELA DE LISTAGEM
        return view('listar_estoque')

        ->with(compact('estoque'))

        ->with(compact('localidade'))

        ->with(compact('item'))

        ->with(compact('search'))

        ->with(compact('search_localidade'))

        ->with(compact('fornecedor'));
        
    }

    public function edit($id)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        //O EDIT É UM SELECT COM UM WHERE PUXANDO O ID DO ITEM CADASTRADO/SELECIONADO
        $editar = new Estoque();

        //CONSULTA COM O WHERE idEstoque = $id 
        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade', 'tbLocalidade.setor', 'tbLocalidade.idLocalidade','estoque_min' ) 
        ->where('idEstoque', $id)
        ->first();

        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        
        $localidade = new Localidade();
        $localidade = $localidade::all();
        

        //INDO PRA TELA DE EDIÇÃO PARA DAR UM UPDATE NAS INFORMAÇÕES
        return view('editar_estoque')

        ->with(compact('editar'))

        ->with(compact('fornecedor'))

        ->with(compact('localidade'))

        ->with(compact('item'));

    }

    public function update(Request $request, $id)
    {   
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        //UPDATE NOS DADOS MODIFICADOS (OU NÃO)  
        $editar = new Estoque();
        $editar = DB::table ('tbEstoque')
        ->where('idEstoque', $id)
        ->update(
        ['quantidade_total' =>$request->input('quantidade_total'),
        'numero_nf' =>$request->input('numero_nf'),
        'data_nf' =>$request->input('data_nf'),
        'data_garantia' =>$request->input('data_garantia'),
        'idItem' =>$request->input('idItem'),
        'idFornecedor' =>$request->input('idFornecedor'),
        'estoque_min' =>$request->input('estoque_min'),
        'idLocalidade' =>$request->input('idLocalidade')]
        );
       
        //SE EXISTIR O UPDATE ELE VOLTA PRA TELA DE HOME
        if(isset($editar)){
            
        return redirect()->route('home');
       
        }
    }

    public function destroy($id)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $estoque = new Estoque();
        
        //DELETE NO ESTOQUE SELECIONADO
        $deletedRows =  $estoque::where('idEstoque', $id)->delete();
        
               
        return redirect()->route('home')

        ->with(compact('estoque'));


    }
}
