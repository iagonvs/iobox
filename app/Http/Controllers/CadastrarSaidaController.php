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
use App\Admin;
use App\Entrada;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\View;

use PDF;


use DB;

//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO A SAÍDA
class CadastrarSaidaController extends Controller
{

    public function index($id)
    {
        //MÉTODO PRINCIPAL PRA CADATRAR A SAÍDA. JOIN NA TABELA DE ESTOQUE, SELECIONANDO O ESTOQUE E TRAZENDO OS DADOS DESSE ESTOQUE SELECIONADO PARA GERAR A SAÍDA
        $editar = new Estoque();
        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor')
        ->where('tbItem.idItem', $id) 
        ->first();

        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        $localidade = new Localidade();
        $localidade = $localidade::all();

        $saida = new Saida();
        $saida = $saida::all();

        //REDIRECIONANDO PRA TELA DO REGISTRO DE SAÍDA
        return redirect()->route('registrar_saida')

        ->with(compact('editar'))

        ->with(compact('localidade'))

        ->with(compact('saida'))

        ->with(compact('estoque'))

        ->with(compact('fornecedor'))

        ->with(compact('item'));
    }




    public function store(Request $request, $id)
    {
        // $editar = new Estoque();
        // $editar = $editar::all();

        // $item = new Item();
        // $fornecedor = new Fornecedor();
        // $localidade = new Localidade();

        // $saida = new Saida();
        
        // $editar = DB::table('tbEstoque')
        // ->where('idEstoque', $id)
        // ->decrement('quantidade_total', $saida->quantidade_saida = $request->input('quantidade_saida'));
 
        // return redirect()->route('home')
       

        // ->with(compact('editar'))

        // ->with(compact('saida'))

        // ->with(compact('estoque'))

        // ->with(compact('fornecedor'))

        // ->with(compact('item'));
    }

    public function listar(Request $request){

        $estoque = new Estoque();
        $saida = new Saida();

        
        $search = $request->get('search');
        $search_localidade = $request->get('search_localidade');

        if(!\Gate::allows('isAdmin')){
            $estoque = DB::table ('tbEstoque')
            ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
            ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
            ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
            ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade')
            ->where('tbItem.descricao_item', 'LIKE', '%'.$search.'%')
            ->where('tbLocalidade.localidade', 'LIKE', '%'.$search_localidade.'%')
            ->where('tbLocalidade.idUser', '=',  Auth::user()->id)
            ->Paginate(15);
        }else{
            $estoque = DB::table ('tbEstoque')
            ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
            ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
            ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
            ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade')
            ->where('tbItem.descricao_item', 'LIKE', '%'.$search.'%')
            ->where('tbLocalidade.localidade', 'LIKE', '%'.$search_localidade.'%')
            ->Paginate(15);
        }

        //SELECT NA TABELA DE ESTOQUE PRA MOSTRAR TODOS OS ITENS PRA GERAR UMA SAÍDA
   

        
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();
        
        $localidade = new Localidade();
        $localidade = $localidade::all();

        //REDIRECIONANDO PRA TELA DE LISTAR ITEM PRA DAR SAÍDA
        return view('listar_item_saida')

        ->with(compact('saida'))

        ->with(compact('search'))

        ->with(compact('search_localidade'))

        ->with(compact('estoque'))

        ->with(compact('item'))

        ->with(compact('localidade'))

        ->with(compact('fornecedor'))

        ->with(compact('saida'));
        
    }



    public function listar_entrada(Request $request){

        $estoque = new Estoque();
        $saida = new Saida();

        $search = $request->get('search');
        $search_localidade = $request->get('search_localidade');

        //SELECT NA TABELA DE ESTOQUE PRA MOSTRAR TODOS OS ITENS PRA GERAR UMA ENTRADA
        if(!\Gate::allows('isAdmin')){
            $estoque = DB::table ('tbEstoque')
            ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
            ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
            ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
            ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade')
            ->where('tbItem.descricao_item', 'LIKE', '%'.$search.'%')
            ->where('tbLocalidade.localidade', 'LIKE', '%'.$search_localidade.'%')
            ->where('tbLocalidade.idUser', '=',  Auth::user()->id)
            ->Paginate(15);
        }else{
            $estoque = DB::table ('tbEstoque')
            ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
            ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
            ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
            ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade')
            ->where('tbItem.descricao_item', 'LIKE', '%'.$search.'%')
            ->where('tbLocalidade.localidade', 'LIKE', '%'.$search_localidade.'%')
            ->Paginate(15);
        }

        
        $item = new Item();
        $item = $item::all();

        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();
        
        $localidade = new Localidade();
        $localidade = $localidade::all();

        //REDIRECIONANDO PRA TELA DE LISTAR ITEM PRA DAR ENTRADA
        return view('listar_item_entrada')

        ->with(compact('saida'))

        ->with(compact('estoque'))

        ->with(compact('search'))

        ->with(compact('search_localidade'))

        ->with(compact('item'))

        ->with(compact('fornecedor'))

        ->with(compact('localidade'))

        ->with(compact('saida'));
        
    }

    
    public function imprimir_pdf(){

        //MÉTODO PRA FAZER UMA EXIBIÇÃO DE RELATÓRIO DE TODAS AS SAÍDAS, GERANDO UM PDF
        $item = new Item();
        $fornecedor = new Fornecedor();
        $localidade = new Localidade();

        $estoque = new Estoque();

        //CONSULTA TRAZENDO TODOS OS DADOS NA TABELA DE SAÍDA
        $saida = new Saida();
        $saida = DB::table ('tbSaida')
        ->join('tbEstoque', 'tbSaida.idEstoque', '=', 'tbEstoque.idEstoque')
        ->join('tbLocalidade', 'tbSaida.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbItem', 'tbItem.idItem', '=', 'tbEstoque.idItem')
        ->join('users', 'tbSaida.idUsuario', '=', 'users.id')
        ->select('idSaida','quantidade_saida', 'data_saida','descricao_saida','tbLocalidade.localidade','tbEstoque.idEstoque','tbItem.descricao_item', 'users.name') 
        ->orderBy('data_saida', 'DESC')
        ->get();


        //FUNÇÃO PRINCIPAL USANDO ATRIBUTOS DO DOMPDF / REDIRECIONANDO PRA VIEW relatorio_saida QUE SERÁ O HTML RESPONSÁVEL DO TEMPLATE DO PDF
        $pdf = Pdf::loadView('relatorio_saida', compact('saida'));
       

        //MODELO DE FOLHA E DE EXIBIÇÃO
        return $pdf->setPaper('a4')->download('Relatório Saída.pdf');
       

    }

    public function edit($id)
    {
        $editar = new Estoque();

  

        $editar = DB::table ('tbEstoque')
        ->join('tbItem', 'tbEstoque.idItem', '=', 'tbItem.idItem')
        ->join('tbLocalidade', 'tbEstoque.idLocalidade', '=', 'tbLocalidade.idLocalidade')
        ->join('tbFornecedor', 'tbEstoque.idFornecedor', '=', 'tbFornecedor.idFornecedor')
        ->select('idEstoque','quantidade_total','numero_nf','data_nf','data_garantia','tbItem.descricao_item', 'tbItem.idItem',  'tbFornecedor.razao_social', 'tbFornecedor.idFornecedor', 'tbLocalidade.localidade', 'tbLocalidade.setor','tbLocalidade.idLocalidade') 
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


        $saida = new Saida();

        //ESSE MÉTODO TERÁ 2 FUNÇÕES: SUBTRAIR O VALOR QUE FOI DADO A SAÍDA PELO VALOR ANTIGO. REGISTRAR A SAÍDA NA TABELA DE SAÍDAS


        //PRIMEIRO PEGO A QUANTIDADE TOTAL PRA SABER SE ELA É MAIOR QUE 0
        $editar->quantidade_total = $request->input('quantidade_total') ;

        //SE FOR MAIOR QUE 0 ELE SUBTRAI A QUANTIDADE TOTAL PELA QUANTIDADE SAÍDA E SALVA ESE REGISTRO NA TABELA SAÍDA
        if($editar->quantidade_total > 0){
        $editar = DB::table('tbEstoque')
        ->where('idEstoque', $id)
        ->decrement('quantidade_total', $saida->quantidade_saida = $request->input('quantidade_saida'));

        $saida->quantidade_saida = $request->input('quantidade_saida') ;
        $saida->idLocalidade = $request->input('idLocalidade') ;
        $saida->idEstoque = $request->input('idEstoque') ;
        $saida->descricao_saida = $request->input('descricao_saida');
        $saida->idLocalidade = $request->input('idLocalidade');
        $saida->data_saida = now();
        $saida->idUsuario = $usuario = Auth::user()->id;
        $saida->idChamado = $request->input('idChamado');
        $saida->save();

        return redirect()->back()
       
            ->with(compact('editar'))

            ->with(compact('usuario'))

            ->with(compact('localidade'))
    
            ->with(compact('saida'))
    
            ->with(compact('fornecedor'))
    
            ->with(compact('item'))

            ->with('saidaok','Saida registrada com sucesso');
      //SE FOR MENOR QUE 0 ELE NÃO FAZ NADA E EXIBE A MENSSAGEM DE ERRO
      }else{
          
        return redirect()
        ->back()
        ->with('errors', 'Infelizmente não tem como gerar saída: Não existem itens a serem retirados');
                   
      }
        
    }



    public function destroy($id)
    {
      
    }
}
