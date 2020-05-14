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
use App\Controle_Impressora;
use App\Usuario;
use Illuminate\Support\Facades\Auth;



use DB;

class CadastrarControleImpressoraController extends Controller
{

    public function index()
    {
        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        $controle_impressora = new Controle_Impressora();
        $controle_impressora = $controle_impressora::all();

        return view('cadastrar_controle_impressora', compact('modelo_impressora', 'status_controle', 'setor_agencia', 'controle_impressora'));

    }

    public function store(Request $request)
    {

        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        $usuario = new Usuario();
        $usuario = $usuario::all();

        $controle_impressora = new Controle_Impressora();

        $controle_impressora->idSetor_Agencia = $request->input('idSetor_Agencia');
        $controle_impressora->idModelo_Impressora = $request->input('idModelo_Impressora');
        $controle_impressora->idStatus_Controle = $request->input('idStatus_Controle');
        $controle_impressora->Data_Status = now();
        $controle_impressora->idUser = $usuario = Auth::user()->id;
        $controle_impressora->descricao_controle_impressora = $request->input('descricao_controle_impressora');
        $controle_impressora->descricao_controle_impressora_volta = $request->input('descricao_controle_impressora_volta');
        $controle_impressora->Flag_Volta = '0';
        $controle_impressora->save();

        if($controle_impressora){
            return redirect()->back()
                    ->with(compact('modelo_impressora', 'status_controle', 'setor_agencia', 'controle_impressora'))
                    ->with('sucess', 'Controle registrado com sucesso!');
        }else{
            return redirect()->back()
            ->with(compact('modelo_impressora', 'status_controle', 'setor_agencia', 'controle_impressora'))
            ->with('errors', 'Ocorreu um erro no registro do controle!');
        }
      
    }

    public function listar(Request $request){

        $search_modelo = $request->get('search_modelo');
        $search_status = $request->get('search_status');
        $search_setor = $request->get('search_setor');

        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        $usuario = new Usuario();
        $usuario = $usuario::all();

        $controle_impressora = DB::table('tbControle_Impressora')
        ->join('tbModelo_impressora','tbControle_Impressora.idModelo_Impressora', 'tbModelo_Impressora.idModelo_Impressora')
        ->join('tbStatus_Controle','tbControle_Impressora.idStatus_Controle', 'tbStatus_Controle.idStatus_Controle')
        ->join('tbSetor_Agencia', 'tbControle_Impressora.idSetor_Agencia', 'tbSetor_Agencia.idSetor_Agencia')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->join('users', 'tbControle_Impressora.idUser', 'users.id')
        ->select('idControle_Impressora', 'tbModelo_Impressora.idModelo_Impressora', 'tbModelo_Impressora.Modelo_Impressora', 'tbStatus_Controle.idStatus_Controle', 'tbStatus_Controle.Status_Controle','tbSetor_Agencia.idSetor_Agencia', 'tbSetor_Agencia.Setor_Agencia', 'Data_Status', 'tbMarca_Impressora.idMarca_Impressora','tbMarca_Impressora.Marca_Impressora', 'users.name')
        ->where('tbModelo_Impressora.Modelo_Impressora', 'LIKE', '%'.$search_modelo.'%')
        ->where('tbStatus_Controle.Status_Controle', 'LIKE', '%'.$search_status.'%')
        ->where('tbSetor_Agencia.Setor_Agencia', 'LIKE', '%'.$search_setor.'%')
        ->Paginate(15);

        return view('listar_controle_impressora', compact('modelo_impressora', 
                                                    'status_controle', 'setor_agencia', 
                                                    'controle_impressora', 'search_modelo','search_status','search_setor'));

    }

    public function listar_saida(Request $request){

        $search_modelo = $request->get('search_modelo');
        $search_status = $request->get('search_status');
        $search_setor = $request->get('search_setor');

        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        $usuario = new Usuario();
        $usuario = $usuario::all();

        $controle_impressora = DB::table('tbControle_Impressora')
        ->join('tbModelo_impressora','tbControle_Impressora.idModelo_Impressora', 'tbModelo_Impressora.idModelo_Impressora')
        ->join('tbStatus_Controle','tbControle_Impressora.idStatus_Controle', 'tbStatus_Controle.idStatus_Controle')
        ->join('tbSetor_Agencia', 'tbControle_Impressora.idSetor_Agencia', 'tbSetor_Agencia.idSetor_Agencia')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->join('users', 'tbControle_Impressora.idUser', 'users.id')
        ->select('idControle_Impressora', 'tbModelo_Impressora.idModelo_Impressora', 'tbModelo_Impressora.Modelo_Impressora', 'tbStatus_Controle.idStatus_Controle', 'tbStatus_Controle.Status_Controle','tbSetor_Agencia.idSetor_Agencia', 'tbSetor_Agencia.Setor_Agencia', 'Data_Status', 'tbMarca_Impressora.idMarca_Impressora','tbMarca_Impressora.Marca_Impressora', 'users.name','Flag_Volta')
        ->where('tbModelo_Impressora.Modelo_Impressora', 'LIKE', '%'.$search_modelo.'%')
        ->where('tbStatus_Controle.Status_Controle', 'LIKE', '%'.$search_status.'%')
        ->where('tbSetor_Agencia.Setor_Agencia', 'LIKE', '%'.$search_setor.'%')
        ->where('Flag_Volta', '=', '0')
        ->Paginate(15);

        return view('listar_controle_impressora_saida', compact('modelo_impressora', 
                                                    'status_controle', 'setor_agencia', 
                                                    'controle_impressora', 'search_modelo','search_status','search_setor'));

    }

    public function listar_volta(Request $request){

        $search_modelo = $request->get('search_modelo');
        $search_status = $request->get('search_status');
        $search_setor = $request->get('search_setor');

        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        $usuario = new Usuario();
        $usuario = $usuario::all();

        $controle_impressora = DB::table('tbControle_Impressora')
        ->join('tbModelo_impressora','tbControle_Impressora.idModelo_Impressora', 'tbModelo_Impressora.idModelo_Impressora')
        ->join('tbStatus_Controle','tbControle_Impressora.idStatus_Controle', 'tbStatus_Controle.idStatus_Controle')
        ->join('tbSetor_Agencia', 'tbControle_Impressora.idSetor_Agencia', 'tbSetor_Agencia.idSetor_Agencia')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->join('users', 'tbControle_Impressora.idUser', 'users.id')
        ->select('idControle_Impressora', 'tbModelo_Impressora.idModelo_Impressora', 'tbModelo_Impressora.Modelo_Impressora', 'tbStatus_Controle.idStatus_Controle', 'tbStatus_Controle.Status_Controle','tbSetor_Agencia.idSetor_Agencia', 'tbSetor_Agencia.Setor_Agencia', 'Data_Status', 'tbMarca_Impressora.idMarca_Impressora','tbMarca_Impressora.Marca_Impressora', 'users.name','Flag_Volta')
        ->where('tbModelo_Impressora.Modelo_Impressora', 'LIKE', '%'.$search_modelo.'%')
        ->where('tbStatus_Controle.Status_Controle', 'LIKE', '%'.$search_status.'%')
        ->where('tbSetor_Agencia.Setor_Agencia', 'LIKE', '%'.$search_setor.'%')
        ->where('Flag_Volta', '=', '1')
        ->where('tbStatus_Controle.Status_Controle', '!=', 'SAIU PARA MANUTENÇÃO')
        ->Paginate(15);

        return view('listar_controle_impressora_volta', compact('modelo_impressora', 
                                                    'status_controle', 'setor_agencia', 
                                                    'controle_impressora', 'search_modelo','search_status','search_setor'));

    }



    public function edit($id)
    {   
        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();

        $controle_impressora = DB::table('tbControle_Impressora')
        ->join('tbModelo_impressora','tbControle_Impressora.idModelo_Impressora', 'tbModelo_Impressora.idModelo_Impressora')
        ->join('tbStatus_Controle','tbControle_Impressora.idStatus_Controle', 'tbStatus_Controle.idStatus_Controle')
        ->join('tbSetor_Agencia', 'tbControle_Impressora.idSetor_Agencia', 'tbSetor_Agencia.idSetor_Agencia')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->select('idControle_Impressora', 'tbModelo_Impressora.idModelo_Impressora', 'tbModelo_Impressora.Modelo_Impressora', 'tbStatus_Controle.idStatus_Controle', 'tbStatus_Controle.Status_Controle','tbSetor_Agencia.idSetor_Agencia', 'tbSetor_Agencia.Setor_Agencia', 'Data_Status', 'tbMarca_Impressora.idMarca_Impressora','tbMarca_Impressora.Marca_Impressora', 'descricao_controle_impressora', 'descricao_controle_impressora_volta')
        ->where('idControle_Impressora', $id)
        ->first();

        return view('editar_controle_impressora', compact('modelo_impressora', 'status_controle', 'setor_agencia', 'controle_impressora'));

    }


    public function update(Request $request, $id)
    {
        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $status_controle = new Status_Controle();
        $status_controle = $status_controle::all();

        $setor_agencia = new Setor_Agencia();
        $setor_agencia = $setor_agencia::all();
        
        $usuario = new Usuario();
        $usuario = $usuario::all();

        $controle_impressora = new Controle_Impressora();

        $controle_impressora->idSetor_Agencia = $request->input('idSetor_Agencia');
        $controle_impressora->idModelo_Impressora = $request->input('idModelo_Impressora');
        $controle_impressora->idStatus_Controle = $request->input('idStatus_Controle');
        $controle_impressora->Data_Status = now();
        $controle_impressora->idUser = $usuario = Auth::user()->id;
        $controle_impressora->descricao_controle_impressora = $request->input('descricao_controle_impressora');
        $controle_impressora->descricao_controle_impressora_volta = $request->input('descricao_controle_impressora_volta');
        $controle_impressora->Flag_Volta = '1';
        $controle_impressora->save();

        $controle_impressora = DB::table('tbControle_Impressora')
        ->where('idControle_Impressora', $id)
        ->update(['Flag_Volta'=>$controle_impressora->Flag_Volta = '1']);

        if($controle_impressora){
            return redirect()->back()
                    ->with(compact('modelo_impressora', 'status_controle', 'setor_agencia', 'controle_impressora'))
                    ->with('sucess', 'Controle registrado com sucesso!');
        }else{
            return redirect()->back()
            ->with(compact('modelo_impressora', 'status_controle', 'setor_agencia', 'controle_impressora'))
            ->with('errors', 'Ocorreu um erro no registro do controle!');
        }
      

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $controle_impressora = new Controle_Impressora();

        $deleteRows = $controle_impressora::where('idControle_Impressora', $id)->delete();

        if(isset($controle_impressora)){
            return redirect()->route('listar_controle_impressora', compact('controle_impressora'));
        }
    }
}
