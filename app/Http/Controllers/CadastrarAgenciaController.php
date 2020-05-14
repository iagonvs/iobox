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
use App\ControleWifi;
use App\Inventario;
use App\Agencia;



use DB;

class CadastrarAgenciaController extends Controller
{

    public function index()
    {
        $agencia = new Agencia();
        $agencia = Agencia::All();

        return view('cadastrar_agencia', compact('agencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agencia = new Agencia();
        
        $agencia->Nome_Agencia =  $request->input('Nome_Agencia');
        $agencia->save();

        return view('cadastrar_agencia', compact('agencia'));
    }

    public function listar(){
        $agencia = new Agencia();
        $agencia = Agencia::All();

        return view('listar_agencia', compact('agencia'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = new Agencia();
        $editar = Agencia::get()
        ->where('idAgencia', $id)
        ->first();

        return view('editar_agencia', compact('editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $editar = new Agencia();

        $editar = DB::table('tbAgencia')
        ->where('idAgencia', $id)
        ->update(['Nome_Agencia'=>$request->input('Nome_Agencia')]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $agencia = new Agencia();

         $deletedRows =  $agencia::where('idAgencia', $id)->delete();
        
        

         if(isset($agencia)){
             return redirect()->route('listar_agencia', compact('agencia'));
         }
    }
}
