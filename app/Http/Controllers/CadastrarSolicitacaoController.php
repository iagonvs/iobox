<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Estoque;
use App\Item;
use App\Fornecedor;
use App\Localidade;
use App\SolicitacaoCompra;
use App\SolicitacaoStatus;
use App\Usuario;
use App\Http\Controllers\View;
use Illuminate\Support\Facades\Auth;

use DB;


//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO A SOLICITAÇÃO DE COMPRA
class CadastrarSolicitacaoController extends Controller
{

    public function index()
    {   
        //ACESSO PRINCIPAL AO CADASTRO DE SOLICITAÇÃO DE COMPRA, TRAZENDO DADOS DA LOCALIDADE, STATUS E USUÁRIO
        $compra = new SolicitacaoCompra();
        $compra = $compra::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();

        $status = new SolicitacaoStatus();
        $status = $status::all();

        $user = new Usuario();
        $user = $user::all();

        return view('cadastrar_solicitacao')

        ->with(compact('compra'))

        ->with(compact('localidade'))

        ->with(compact('status'))

        ->with(compact('user'));
    }


    public function store(Request $request)
    {
        $compra = new SolicitacaoCompra();
        $localidade = new Localidade();
        $status = new SolicitacaoStatus();
        $user = new Usuario();


        //REGISTRANDO A SOLICITAÇÃO DA COMPRA 
        $compra->descricao_solicitacao = $request->input('descricao_solicitacao');
        $compra->quantidade_solicitacao = $request->input('quantidade_solicitacao');
        $compra->data_solicitacao = now();
        $compra->idUsuario = $user = Auth::user()->id;
        $compra->idSolicitacaoStatus = $request->input('idSolicitacaoStatus');
        $compra->idLocalidade = $request->input('idLocalidade');
        $compra->save();

        return redirect()->back()
       
        ->with(compact('compra'))

        ->with(compact('localidade'))

        ->with(compact('status'))

        ->with(compact('user'))

        ->with('saidaok','Saida registrada com sucesso');
    }

    public function listar(){

       

        if(!\Gate::allows('isAdmin')){
            $comprar = new SolicitacaoCompra();
            $localidade = new Localidade();
            $status = new SolicitacaoStatus();
            $user = new Usuario();
            
            //LISTANDP TODAS AS SOLICITAÇÕES
            $comprar = DB::table ('tbSolicitacao_Compra')
            ->join('users', 'tbSolicitacao_Compra.idUsuario', '=', 'users.id')
            ->join('tbLocalidade', 'tbSolicitacao_Compra.idLocalidade', '=', 'tbLocalidade.idLocalidade')
            ->join('tbSolicitacao_Status', 'tbSolicitacao_Compra.idSolicitacaoStatus', '=', 'tbSolicitacao_Status.idSolicitacaoStatus')
            ->select('idSolicitacaoCompra','descricao_solicitacao', 'quantidade_solicitacao', 'data_solicitacao','users.name','tbLocalidade.localidade','tbSolicitacao_Status.solicitacao_status')
            ->where('users.id', '=',  $usuario = Auth::user()->id)
            ->get();
    
        }else{
            $comprar = new SolicitacaoCompra();
            $localidade = new Localidade();
            $status = new SolicitacaoStatus();
            $user = new Usuario();
    
            //LISTANDP TODAS AS SOLICITAÇÕES
            $comprar = DB::table ('tbSolicitacao_Compra')
            ->join('users', 'tbSolicitacao_Compra.idUsuario', '=', 'users.id')
            ->join('tbLocalidade', 'tbSolicitacao_Compra.idLocalidade', '=', 'tbLocalidade.idLocalidade')
            ->join('tbSolicitacao_Status', 'tbSolicitacao_Compra.idSolicitacaoStatus', '=', 'tbSolicitacao_Status.idSolicitacaoStatus')
            ->select('idSolicitacaoCompra','descricao_solicitacao', 'quantidade_solicitacao', 'data_solicitacao','users.name','tbLocalidade.localidade','tbSolicitacao_Status.solicitacao_status')
            ->get();

        }

  


        return view('listar_solicitacao')

        ->with(compact('comprar'))

        ->with(compact('localidade'))

        ->with(compact('status'))

        ->with(compact('user'));
        
    }


    public function edit($id)
    {
        $comprar = new SolicitacaoCompra();
        $localidade = new Localidade();
        $localidade = $localidade::all();
        $status = new SolicitacaoStatus();
        $status = $status::all();
        $user = new Usuario();
        $user = $user::all();

  
        //CONSULTANDO TODAS AS INFORMAÇÕES DA SOLICITAÇÃO QUE FOI SELECIONADA E REDIRECIONANDO PRA TELA DE EDIÇÃO
        $comprar = DB::table ('tbSolicitacao_Compra')
        ->join('users', 'tbSolicitacao_Compra.idUsuario', '=', 'users.id')
        ->join('tbLocalidade', 'tbSolicitacao_Compra.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbSolicitacao_Status', 'tbSolicitacao_Compra.idSolicitacaoStatus', '=', 'tbSolicitacao_Status.idSolicitacaoStatus')
        ->select('idSolicitacaoCompra','descricao_solicitacao', 'quantidade_solicitacao', 'data_solicitacao','users.name', 'users.id','tbLocalidade.localidade', 'tbLocalidade.idLocalidade','tbSolicitacao_Status.solicitacao_status', 'tbSolicitacao_Status.idSolicitacaoStatus')
        ->where('idSolicitacaoCompra', $id)
        ->first();


        return view('editar_solicitacao')

        ->with(compact('comprar'))

        ->with(compact('localidade'))

        ->with(compact('status'))

        ->with(compact('user'));
    }

    public function update(Request $request, $id)
    {

        $localidade = new Localidade();
        $localidade = $localidade::all();
        $status = new SolicitacaoStatus();
        $status = $status::all();
        $user = new Usuario();
        $user = $user::all();

        //ATUALIZANDO A SOLICITAÇÃO
        $comprar = new SolicitacaoCompra();
        $comprar = DB::table ('tbSolicitacao_Compra')
        ->where('idSolicitacaoCompra', $id)
        ->update(
        ['descricao_solicitacao' =>$request->input('descricao_solicitacao'),
        'quantidade_solicitacao' =>$request->input('quantidade_solicitacao'),
        'idLocalidade' =>$request->input('idLocalidade'),
        'idSolicitacaoStatus' =>$request->input('idSolicitacaoStatus')]
        );

        return redirect()->back()
       

        ->with(compact('comprar'))

        ->with(compact('localidade'))

        ->with(compact('status'))

        ->with(compact('user'))

        ->with('saidaok','Saida registrada com sucesso');

    }

    public function destroy($id)
    {
        $comprar = new SolicitacaoCompra();
        
        //DELETANDO A SOLICITAÇÃO SELECIONADA
        $deletedRows =  SolicitacaoCompra::where('idSolicitacaoCompra', $id)->delete();
        
    
            return redirect()->route('listar_solicitacao', compact('comprar'));
       
    }
    }

