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
use App\Setor_Agencia;



use DB;

class CadastrarSetorAgenciaController extends Controller
{

    public function index()
    {
        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        return view('cadastrar_setor_agencia', compact('setor_agencia'));
    }


    public function store(Request $request)
    {
        $setor_agencia = new Setor_Agencia();
        $setor_agencia->Setor_Agencia = $request->input('setor_agencia');
        $setor_agencia->save();

        return view('cadastrar_setor_agencia', compact('setor_agencia'));

        if($setor_agencia){
            return redirect()->back()
                    ->with(compact('setor_agencia'))
                    ->with('sucess', 'Setor/Agencia cadastrado com sucesso');
        }else{
            return redirect()->back()
            ->with(compact('setor_agencia'))
            ->with('errors', 'Ocorreu um erro no cadastro do Setor/Agencia');
        }
    }

    public function listar(Request $request){

        $search = $request->get('search');

        $setor_agencia = DB::table('tbSetor_Agencia')
        ->where('idSetor_Agencia', 'LIKE', '%'.$search.'%')
        ->Paginate(15);

        return view('listar_setor_agencia', compact('setor_agencia', 'search'));
    }

    public function edit($id)
    {
        $setor_agencia = new Setor_Agencia();

        $setor_agencia = DB::table('tbSetor_Agencia')
        ->where('idSetor_Agencia', $id)
        ->first();

        return view('editar_setor_agencia', compact('setor_agencia'));
    }

    public function update(Request $request, $id)
    {
        $setor_agencia = new Setor_Agencia();

        $setor_agencia = DB::table('tbSetor_Agencia')
        ->where('idSetor_Agencia', $id)
        ->update(['Setor_Agencia'=> $request->input('setor_agencia')]);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $setor_agencia = new Setor_Agencia();

        $deleteRows = $setor_agencia::where('idSetor_Agencia', $id)->delete();

        
        if(isset($setor_agencia)){
            return redirect()->route('listar_setor_agencia', compact('setor_agencia'));
        }
    }
}
