<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use App\Item;
use App\Fornecedor;
use App\Localidade;
use App\Estoque;
use App\Saida;
use App\Entrada;
use App\ControleWifi;
use App\Agencia;
use App\Inventario;
use App\Controle_Impressora;
use App\Marca_Impressora;
use App\Modelo_Impressora;
use App\Status_Controle;
use App\Setor_Agencia;
use App\Usuario;


use DB;

//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO O ITEM
class CadastrarItemController extends Controller
{

    //ESSE MÉTODO É O RESPONSÁVEL POR TODA EXIBIÇÃO NA DASHBOARD DO BOX IO
    public function main(){

        
        //VARIÁVEIS "COUNT" PRA TRAZER O TOTAL 
        $count = Item::count(); 
        $count_fornecedor = Fornecedor::count(); 
        $count_wifi = ControleWifi::count(); 
        $count_estoque = Estoque::count(); 
        $count_entrada = Entrada::count(); 


        $controle_impressora = new Controle_Impressora();
        $modelo_impressora = new Modelo_Impressora();
        $status_controle = new Status_Controle();
        $setor_agencia = new Setor_Agencia();
        $usuario = new Usuario();
        
        //VARIÁVEIS "COUNT" PRA TRAZER O TOTAL 
        $count_controle_impressora = DB::table('tbControle_Impressora')
        ->join('tbModelo_impressora','tbControle_Impressora.idModelo_Impressora', 'tbModelo_Impressora.idModelo_Impressora')
        ->join('tbStatus_Controle','tbControle_Impressora.idStatus_Controle', 'tbStatus_Controle.idStatus_Controle')
        ->join('tbSetor_Agencia', 'tbControle_Impressora.idSetor_Agencia', 'tbSetor_Agencia.idSetor_Agencia')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->join('users', 'tbControle_Impressora.idUser', 'users.id')
        ->select('idControle_Impressora', 'tbModelo_Impressora.idModelo_Impressora', 'tbModelo_Impressora.Modelo_Impressora', 'tbStatus_Controle.idStatus_Controle', 'tbStatus_Controle.Status_Controle','tbSetor_Agencia.idSetor_Agencia', 'tbSetor_Agencia.Setor_Agencia', 'Data_Status', 'tbMarca_Impressora.idMarca_Impressora','tbMarca_Impressora.Marca_Impressora', 'users.name','Flag_Volta')
        ->where('tbStatus_Controle.idStatus_Controle', '=', '1')
        ->where('Flag_Volta', '=', '0')
        ->Count();

        // $count_controle_impressora = $controle_impressora::count();

        $agencia = new Agencia();
        $agencia = $agencia::all();
        $inventario = new Inventario();
        $inventario = $inventario::all();


        //JOIN NA TABELA DE SAÍDA PRA MOSTRAR AS ULTIMAS 5 SAÍDAS 
        $saida = new Saida();
        $saida = DB::table ('tbSaida')
        ->join('tbEstoque', 'tbSaida.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbSaida.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->join('users', 'tbSaida.idUsuario', '=', 'users.id')
        ->select('idSaida','quantidade_saida', 'data_saida','descricao_saida','tbLocalidade.localidade','tbEstoque.idEstoque','tbItem.descricao_item', 'users.name') 
        ->orderBy('data_saida', 'DESC')
        ->Paginate(5);

        //JOIN NA TABELA ENTRADA PRA MOSTRAR AS ULTIMAS 5 ENTRADAS
        $entrada = new Entrada();
        $entrada = DB::table ('tbEntrada')
        ->join('tbEstoque', 'tbEntrada.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbEntrada.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->join('users', 'tbEntrada.idUsuario', '=', 'users.id')
        ->select('idEntrada','quantidade_entrada', 'tbEntrada.data_entrada','tbEstoque.idEstoque','tbLocalidade.localidade','tbItem.descricao_item', 'tbEstoque.quantidade_total', 'users.name','descricao_entrada') 
        ->orderBy('data_entrada', 'DESC')
        ->Paginate(5);

       
        //JOIN NA TABELA ESTOQUE PARA MOSTRAR O ESTOQUE MÍNIMO NA DASHBOARD
        $estoque = new Estoque();
        $estoque = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item','tbItem.idItem', 'tbFornecedor.razao_social', 'tbLocalidade.localidade', 'tbLocalidade.setor', 'estoque_min') 
        ->whereRaw('quantidade_total <= estoque_min')
        ->where('tbItem.idItem', '!=', '35')
        // ->where('tbItem.idItem', '!=', '28')
        ->get();

        $estoqueagencia = new Estoque();
        $estoqueagencia = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->select('idEstoque','quantidade_total','data_entrada','numero_nf','data_nf','data_garantia','tbItem.descricao_item','tbItem.idItem', 'tbFornecedor.razao_social', 'tbLocalidade.localidade', 'tbLocalidade.setor', 'estoque_min')
        ->where('tbLocalidade.idLocalidade', '=', '12') 
        ->get();


        
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        return view('home')

        ->with(compact('count'))

        ->with(compact('count_entrada'))

        ->with(compact('count_fornecedor'))

        ->with(compact('count_estoque'))

        ->with(compact('entrada'))

        ->with(compact('estoque'))

        ->with(compact('saida'))

        ->with(compact('agencia'))

        ->with(compact('inventario'))

        ->with(compact('estoqueagencia'))

        ->with(compact('count_controle_impressora'))

        ->with(compact('controle_impressora'))

        ->with(compact('count_wifi'));
    }


    public function index()
    {   
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        //ACESSO PRINCIPAL A TELA DE CADASTRO DE ITEM
        $item = new Item();
        $item = $item::all();

        return view('cadastrar_item')

        ->with(compact('item'));
    }


    public function store(Request $request)
    {

        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
       
        $item = new Item();

        //VALIDANDO OS CAMPOS PREENCHIDOS NO FORMULÁRIO DE CADASTRO DO ITEM
        $item = $request->validate([
            'descricao_item' => 'required|max:255',
           
        ]);

        $item_cadastrar = new Item();
        
        //PEGANDO O DADO DO CAMPO PREENCHIDO 
        $item_cadastrar->descricao_item = $request->input('descricao_item');
        //SALVANDO NO BANCO DE DADOS
        $item_cadastrar->save();

        if ($item) {
        return redirect()
                   ->back() 
                   ->with(compact('item'))
                   ->with('sucess','Item cadastrado com sucesso');
        } else {
                    return redirect()
                           ->back()
                           ->with(compact('item'))
                           ->with('errors', 'Ocorreu um erro ao tentar cadastrar item');
                }
    }


    public function listar(Request $request){


        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $item = new Item();

        $search = $request->get('search');

        //LISTANDO TODOS OS ITENS 
        $item = Item::where('descricao_item', 'LIKE', '%'.$search.'%')
                            ->paginate(10);

        return view('listar_item', compact('item', 'search'));
    

    }

    public function edit($id)
    {   
        //TRAZENDO OS DADOS DO ITEM SELECIONANDO E REDIRECIONANDO PRA TELA DE EDIÇÃO PARA DAR O UPDATE
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

        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $editar = new Item();

        //DANDO O UPDATE NO ITEM SELECIONADO  
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
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $item = new Item();
        
        //DELETANDO O ITEM SELECIONADO
        $deletedRows =  $item::where('idItem', $id)->delete();
        
        

        if(isset($item)){
            return redirect()->route('listar_item', compact('item'));
        }
    }
}
