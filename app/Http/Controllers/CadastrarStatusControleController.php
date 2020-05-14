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
use App\Linha;
use App\Empresa;
use App\Onibus;
use App\TipoOnibus;
use App\Marca_Impressora;
use App\Modelo_Impressora;
use App\Status_Controle;



use DB;

class CadastrarStatusControleController extends Controller
{
    
    public function index()
    {
        $status_controle = new Status_Controle();
        $status_controle = $status_controle::All();

        return view('cadastrar_status_controle', 'status_controle');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $status_controle = new Status_Controle();
        $status_controle = $status_controle::All();

        $status_controle->Status_Controle = $request->input('status_controle');
        $status_controle->save();

  
        
        if($status_controle){
            return redirect()->back()
                    ->with(compact('status_cotrole'))
                    ->with('sucess','Status cadastrado com sucesso');
        }else{
                return redirect()->back()
                        ->with(compact('status_controle'))
                        ->with('errors','Ocooreu um erro ao tentar cadastrar status');
                    }
        }

        public function listar(Request $request){
            $search = $request->get('search');

            $status_controle = new Status_Controle();
            $status_controle = DB::table('tbStatus_Controle')
            ->where('idStatus_Controle', 'LIKE', '%'.$search.'%')
            ->Paginate(15);

            return view('listar_status_controle', compact('status_controle', 'search'));


        }


    public function edit($id)
    {
        $status_controle = new Status_Controle();
        $status_controle = DB::table('tbSatus_Controle')
        ->where('idStatus_Controle', $id)
        ->first();

        return view('editar_status_controle', compact('status_controle'));
    }

    public function update(Request $request, $id)
    {
        $status_controle = new Status_Controle();
        $status_controle = DB::table('tbSatus_Controle')
        ->where('idStatus_Controle', $id)
        ->update(['Status_Controle'=>$request->input('status_controle')]);
        
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $status_controle = new Status_Controle();

        $deleteRows = $status_controle::where('idStatus_Controle', $id)->delete();

        if(isset($status_controle)){
            return redirect()->route('listar_status_controle', compact('status_controle'));
        }
    }
}
