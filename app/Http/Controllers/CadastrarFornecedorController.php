<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Fornecedor;


use DB;


class CadastrarFornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main(){

      
    }
    public function index()
    {
        $fornecedor = new Fornecedor();
        $fornecedor = $fornecedor::all();

        return view('cadastrar_fornecedor')

        ->with(compact('fornecedor')); 
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
        $fornecedor = new Fornecedor();

        
        $fornecedor->razao_social = $request->input('razao_social') ;
        $fornecedor->cpf_cnpj = $request->input('cpf_cnpj') ;
        $fornecedor->telefone_celular = $request->input('telefone_celular') ;
        $fornecedor->telefone_resid = $request->input('telefone_resid') ;
        $fornecedor->telefone_comercial = $request->input('telefone_comercial') ;
        $fornecedor->email_fornecedor = $request->input('email_fornecedor') ;

        $fornecedor->save();

        if ($fornecedor) {
            return redirect()
                       ->back()
                       ->with('sucess','Fornecedor cadastrado com sucesso');
            } else {
                        return redirect()
                               ->back()
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar Fornecedor');
                    }

        return view('cadastrar_fornecedor', compact('item'));
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

    public function listar(){

        $fornecedor = new Fornecedor();

        $fornecedor = DB::table ('tbFornecedor')->Paginate(10);

    

        

        return view('listar_fornecedor', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = new Fornecedor();
        $editar =  Fornecedor::get()
        ->where('idFornecedor', $id)
        ->first();
        

        if(isset($editar)){
            return view('editar_fornecedor', ['editar'=>$editar]);
        }
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
        $editar = new Fornecedor();
        $editar = DB::table ('tbFornecedor')
        ->where('idFornecedor', $id)
        ->update(
        ['razao_social' =>$request->input('razao_social'),
        'cpf_cnpj' =>$request->input('cpf_cnpj'),
        'telefone_celular' =>$request->input('telefone_celular'),
        'telefone_resid' =>$request->input('telefone_resid'),
        'telefone_comercial' =>$request->input('telefone_comercial'),
        'email_fornecedor' =>$request->input('email_fornecedor')]
        );
       
            
        if(isset($editar)){
            
        return redirect()->route('home');
       
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
        $item = new Fornecedor();
        

        $deletedRows =  $item::where('idItem', $id)->delete();
        
        

        if(isset($item)){
            return redirect()->route('listar', compact('item'));
        }
    }
}
