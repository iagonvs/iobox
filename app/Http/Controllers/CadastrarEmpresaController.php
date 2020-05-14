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



use DB;

class CadastrarEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastrar_empresa');
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
        $empresa = new Empresa();

        $empresa->empresa = $request->input('empresa');
        $empresa->save();

        return view('cadastrar_empresa', compact('empresa'));
    }

    public function listar(){
        $empresa = new Empresa();

        $empresa = Empresa::All();

        return view('listar_empresa', compact('empresa'));
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
        $editar = new Empresa();

        $editar = Empresa::get()
        ->where('idEmpresa', $id)
        ->first();

        return view('editar_empresa', compact('editar'));
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
       $editar = new Empresa();

       $editar = DB::table ('tbEmpresa')
       ->where('idEmpresa', $id)
       ->update (['empresa'=>$request->input('empresa')]);

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
        $empresa = new Empresa();
        
        //DELETANDO O ITEM SELECIONADO
        $deletedRows =  $empresa::where('idEmpresa', $id)->delete();
        
        

        if(isset($empresa)){
            return redirect()->route('listar_empresa', compact('empresa'));
        }
    }
}
