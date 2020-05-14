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



use DB;


class CadastrarLinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cadastrar_linha');
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
        $linha = new Linha();

        //VALIDANDO OS CAMPOS PREENCHIDOS NO FORMULÁRIO DE CADASTRO DA LINHA
  
        $linha_cadastrar = new Linha();
        
        //PEGANDO O DADO DO CAMPO PREENCHIDO 
        $linha_cadastrar->linha = $request->input('linha');
        $linha_cadastrar->chip = $request->input('chip');
        //SALVANDO NO BANCO DE DADOS
        $linha_cadastrar->save();

        return view('cadastrar_linha', compact('linha', 'linha_cadastrar'));
    }

    public function listar(Request $request){

        $linha = new Linha();

        $search = $request->get('search');

        
        $linha = Linha::where('linha', 'LIKE', '%'.$search.'%')
                            ->paginate(10);

        return view('listar_linha', compact('linha', 'search'));
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
        $editar = new Linha();
        $editar =  Linha::get()
        ->where('idLinha_Chip', $id)
        ->first();
        

        
            return view('editar_linha', compact('editar'));
      
    }

    public function update(Request $request, $id)
    {
        $editar = new Linha();

        //DANDO O UPDATE NO ITEM SELECIONADO  
        $editar = DB::table ('tbLinha_Chip')
        ->where('idLinha_Chip', $id)
        ->update(
        ['Linha' =>$request->input('linha'),
         'Chip' => $request-> input('chip')]
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
        $linha = new Linha();
        
        //DELETANDO O ITEM SELECIONADO
        $deletedRows =  $linha::where('idLinha_Chip', $id)->delete();
        
        

        if(isset($linha)){
            return redirect()->route('listar_linha', compact('linha','search'));
        }
    }
}
