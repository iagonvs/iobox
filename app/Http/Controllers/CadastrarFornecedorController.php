<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Fornecedor;


use DB;

//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO O FORNECEDOR
class CadastrarFornecedorController extends Controller
{


    public function index()
    {   
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        //ACESSO PRINCIPAL A TELA DE CADASTRO DE FORNECEDOR
        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        return view('cadastrar_fornecedor')

        ->with(compact('fornecedor')); 
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
        //INSTANCIANDO A MODEL FORNECEDOR
        $fornecedor = new Fornecedor();

        //VALIDAÇÃO DOS CAMPOS A SEREM PREENCHIDOS NO FORMULÁRIO
        $fornecedor = $request->validate([
            'razao_social' => 'required|max:255',
            'cpf_cnpj' => 'required|max:255',
           
        ]);

        //INSTANCIANDO NOVAMENTE A MODEL FORNECEDOR, PORÉM COM UMA VARIAVEL DIFERENTE PARA FAZER O INSERT NO BANCO DE DADOS
        $fornecedor_cadastrar = new Fornecedor();
        
        //COLETANDO OS DADOS PREENCHIDOS NOS CAMPOS DO FORMULÁRIO
        $fornecedor_cadastrar->razao_social = $request->input('razao_social') ;
        $fornecedor_cadastrar->cpf_cnpj = $request->input('cpf_cnpj') ;
        $fornecedor_cadastrar->telefone_celular = $request->input('telefone_celular') ;
        $fornecedor_cadastrar->telefone_resid = $request->input('telefone_resid') ;
        $fornecedor_cadastrar->telefone_comercial = $request->input('telefone_comercial') ;
        $fornecedor_cadastrar->email_fornecedor = $request->input('email_fornecedor') ;
        //INSERINDO NA TABELA DE FORNECEDORES NO BANCO DE DADOS
        $fornecedor_cadastrar->save();
        
        //SE DER TUDO CERTO, VOLTA PRA TELA DE CADASTRO E APRESENTA UMA MENSSAGEM DE EXITO 
        if ($fornecedor) {
            return redirect()
                       ->back()
                       ->with('sucess','Fornecedor cadastrado com sucesso');
        //SE NÃO, NÃO CADASTRA E APRESENTA MENSSAGEM DE ERRO
            } else {
                        return redirect()
                               ->back()
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar Fornecedor');
                    }

        return view('cadastrar_fornecedor', compact('item'));
    }


    public function show($id)
    {
        //
    }

    public function listar(Request $request){

        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
  
        $fornecedor = new Fornecedor();

        //USANDO A FUNÇÃO "SEARCH" PARA O CAMPO "PESQUISAR" NA TELA DE LISTAGEM
        $search = $request->get('search');

        //SELECT NA TABELA FORNECEDOR TRAZENNDO TODOS OS FORNECEDORES 
        $fornecedor = Fornecedor::where('razao_social', 'LIKE', '%'.$search.'%')->Paginate(10);


        return view('listar_fornecedor', compact('fornecedor', 'search'));
    }


    public function edit($id)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $editar = new Fornecedor();

        //TRAZENDO TODOS OS DADOS DO FORNECEDOR SELECIONADO PARA EDITA-LO
        $editar =  Fornecedor::get()
        ->where('idFornecedor', $id)
        ->first();
        
        //REDIRECIONA PARA TELA DE EDIÇAO PARA DAR O UPDATE/OU NÃO NO FORNECEDOR SELECIONADO
        if(isset($editar)){
            return view('editar_fornecedor', ['editar'=>$editar]);
        }
    }


    public function update(Request $request, $id)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $editar = new Fornecedor();

        //DANDO UM UPDATE NO FORNECEDOR SELECIONADO
        $editar = DB::table ('tbFornecedor')
        ->where('idFornecedor', $id)
        ->update(
        ['razao_social' =>$request->input('razao_social'),
        'cpf_cnpj' =>$request->input('cpf_cnpj'),
        'telefone_celular' =>$request->input('telefone_celular'),
        'telefone_resid' =>$request->input('telefone_resid'),
        'telefone_comercial' =>$request->input('telefone_comercial'),
        'email_fornecedor' =>$request->input('email_fornecedor')]
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
        $fornecedor = new Fornecedor();
        
        //DELETANDO UM FORNECEDOR SELECIONADO
        $deletedRows =  $fornecedor::where('idFornecedor', $id)->delete();
        
        

        if(isset($fornecedor)){
            return redirect()->route('home', compact('fornecedor'));
        }
    }
}
