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
use App\TipoOnibus;



use DB;

class CadastrarTipoOnibusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastrar_tipo_onibus');
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
       $tipoonibus = new TipoOnibus();

       $tipoonibus->Tipo_Bus = $request->input('tipo_bus');
       $tipoonibus->save();

       return view('cadastrar_tipo_onibus', compact('tipoonibus'));
    }

    public function listar(){
        $tipoonibus = new TipoOnibus();

        $tipoonibus = TipoOnibus::All();

        return view('listar_tipo_onibus', compact('tipoonibus'));
    }

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
        $editar = new TipoOnibus();

        $editar = DB::table('tbTipo_Bus')
        ->where('idTipo_Bus', $id)
        ->first();

        return view('editar_tipo_onibus', compact('editar'));
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
       
        $editar = new TipoOnibus();

        $editar = DB::table('tbTipo_Bus')
        ->where('idTipo_Bus', $id)
        ->update(['Tipo_Bus'=>$request->input('tipo_bus')]);

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
        $tipoonibus = new TipoOnibus();

        $deletedRows = $tipoonibus::where('idTipo_Bus', $id)->delete();

        
        if(isset($tipoonibus)){
            return redirect()->route('listar_tipo_onibus', compact('tipoonibus'));
        }
    }
}
