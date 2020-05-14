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
use App\Usuario;
use Illuminate\Support\Facades\Auth;
use PDF;

use DB;

//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO ENTRADA DE UMA QUANTIDADE DE UM ITEM NO ESTOQUE
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

    public function imprimir_pdf(){

        //MÉTODO PRA FAZER UMA EXIBIÇÃO DE RELATÓRIO DE TODAS AS SAÍDAS, GERANDO UM PDF
        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        $estoque = new Estoque();

        //CONSULTA TRAZENDO TODOS OS DADOS NA TABELA DE ENTRADA
        $entrada = new Entrada();
        $entrada = DB::table ('tbEntrada')
        ->join('tbEstoque', 'tbEntrada.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbEntrada.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->join('users', 'tbEntrada.idUser', '=', 'users.id')
        ->select('idEntrada','quantidade_entrada', 'tbEntrada.data_entrada','descricao_entrada','tbLocalidade.localidade','tbEstoque.idEstoque','tbItem.descricao_item', 'users.name') 
        ->orderBy('data_entrada', 'DESC')
        ->get();

        //FUNÇÃO PRINCIPAL USANDO ATRIBUTOS DO DOMPDF / REDIRECIONANDO PRA VIEW relatorio_saida QUE SERÁ O HTML RESPONSÁVEL DO TEMPLATE DO PDF
        $pdf2 = Pdf::loadView('relatorio_entrada', compact('entrada'));

        //MODELO DE FOLHA E DE EXIBIÇÃO
        return $pdf2->setPaper('a4')->download('Relatório Entrada.pdf');

    }

 
    public function edit($id)
    {

        //Função para levar os dados do estoque pra view de cadastro da entrada;


        //Instanciando a Model "Estoque"
        $editar = new Estoque();

  
        //Consultando os dados com JOIN da tabela estoque
        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor','tbLocalidade.localidade','tbLocalidade.setor') 
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
        $usuario = new Usuario();

        $entrada = new Entrada();
        
        
        //Adicionando o valor da entrada a quantidade total do item selecionado;

        $editar = DB::table('tbEstoque')
        ->where('idEstoque', $id)
        ->increment('quantidade_total', $entrada->quantidade_entrada = $request->input('quantidade_entrada'));

        $entrada->quantidade_entrada = $request->input('quantidade_entrada') ;
        $entrada->idLocalidade = $request->input('idLocalidade') ;
        $entrada->idEstoque = $request->input('idEstoque') ;
        $entrada->data_entrada = now();
        $entrada->idUsuario = $usuario = Auth::user()->id;
        $entrada->descricao_entrada = $request->input('descricao_entrada') ;
        $entrada->idUser = $usuario = Auth::user()->id;
        $entrada->save();



        return redirect()->back()
       
        ->with(compact('editar'))

        ->with(compact('usuario'))

        ->with(compact('entrada'))

        ->with(compact('fornecedor'))

        ->with('cadastrook','Entrada registrada com sucesso')

        ->with(compact('item'));
    }


    public function destroy($id)
    {
        //
    }
}
