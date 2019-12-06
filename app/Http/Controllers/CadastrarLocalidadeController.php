<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Localidade;


use DB;

class CadastrarLocalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localidade = new Localidade();
        $localidade = $localidade::all();

        return redirect()->route('cadastrar_localidade')

        ->with(compact('localidade')); 
        
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
        $localidade = new Localidade();

        
        $localidade->localidade = $request->input('localidade') ;
        $localidade->setor = $request->input('setor') ;

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

        $localidade = new Localidade();

        $localidade = DB::table ('tbLocalidade')->Paginate(10);

        return view('listar_localidade', compact('localidade'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editar = new Localidade();
        $editar =  Localidade::get()
        ->where('idLocalidade', $id)
        ->first();
        

        if(isset($editar)){
            return view('editar_localidade', ['editar'=>$editar]);
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
        $editar = new Localidade();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $localidade = new Localidade();
        

        $deletedRows =  $item::where('idLocalidade', $id)->delete();
        
        

        if(isset($item)){
            return redirect()->route('listar_localidade', compact('localidade'));
        }
    }
}
