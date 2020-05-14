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
use App\Roteador;




use DB;

class CadastrarRoteadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('cadastrar_roteador');
    
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $roteador = new Roteador();

        $roteador->SSID_Roteador = $request->input('SSID_Roteador');
        $roteador->Senha_Padrao = $request->input('Senha_Padrao');
        $roteador->save();

        return view('cadastrar_roteador', compact('roteador'));
    }

    public function listar(){
   
        $roteador = Roteador::All();

        return view('listar_roteador', compact('roteador'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $editar = new Roteador();

        $editar = Roteador::get()
        ->where('idRoteador', $id)
        ->first();

        return view('editar_roteador', compact('editar'));
    }

    public function update(Request $request, $id)
    {
        $editar = new Roteador();

        $editar = DB::table('tbRoteador')
        ->where('idRoteador', $id)
        ->update(['SSID_Roteador' => $request->input('SSID_Roteador'),
                  'Senha_Padrao' => $request->input('Senha_Padrao')]);

        return redirect()->route('home');
    }


    public function destroy($id)
    {
        $roteador = new Roteador();

        $deleteRows = $roteador::where('idRoteador', $id)->delete();

        if(isset($roteador)){
            return redirect()->route('listar_roteador', compact('roteador'));
        }
    }
}
