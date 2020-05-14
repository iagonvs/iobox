<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Localidade;


use DB;

//CONTROLLER COM TODOS OS MÉTODOS ENVOLVENDO A LOCALIDADE
class CadastrarLocalidadeController extends Controller
{

    public function index()
    {   
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        //ACESSO PRINCIPAL A TELA DE CADASTRO DE LOCALIDADE
        $localidade = new Localidade();
        $localidade = $localidade::all();

        return view('cadastrar_localidade')

        ->with(compact('localidade')); 
        
    }


    public function store(Request $request)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $localidade = new Localidade();

        //COLETANDO OS DADOS PREENCHIDOS NO INPUT DO FORMULÁRIO
        $localidade->localidade = $request->input('localidade') ;
        $localidade->setor = $request->input('setor') ;
        //SALVANDO NO BANCO DE DADOS
        $localidade->save();

        if ($localidade) {
            return redirect()
                       ->back()
                       ->with('sucess','Localidade cadastrado com sucesso');
            } else {
                        return redirect()
                               ->back()
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar Localidade');
                    }

        return view('cadastrar_localidade', compact('localidade'));
    }


    public function listar(Request $request){
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }

        $search = $request->get('search');

        $localidade = new Localidade();

        //LISTANDO TODAS AS LOCALIDADES
        $localidade = Localidade::where('localidade', 'LIKE', '%'.$search.'%')->Paginate(10);

        return view('listar_localidade', compact('localidade', 'search'));
    }

    public function edit($id)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $editar = new Localidade();
        //TRAZENDO TODOS AS INFORMAÇÕES DA LOCALIDADE SELECIONADA E REDIRECIONANDO PRA TELA DE EDIÇÃO
        $editar =  Localidade::get()
        ->where('idLocalidade', $id)
        ->first();
        

        if(isset($editar)){
            return view('editar_localidade', ['editar'=>$editar]);
        }
    }


    public function update(Request $request, $id)
    {
        if(!\Gate::allows('isAdmin')){
            abort(403,"Não pode executar essa ação");
        }
        $editar = new Localidade();

        //DADNDO UM UPDATE NA LOCALIDADE SELECIONADA
        $editar = DB::table ('tbLocalidade')
        ->where('idLocalidade', $id)
        ->update(
        ['localidade' =>$request->input('localidade'),
        'setor' =>$request->input('setor')]
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
        $localidade = new Localidade();
        
        //DELETANDO A LOCALIDADE SELECIONADA
        $deletedRows =  $localidade::where('idLocalidade', $id)->delete();
        
        

        if(isset($localidade)){
            return redirect()->route('listar_localidade', compact('localidade'));
        }
    }
}
