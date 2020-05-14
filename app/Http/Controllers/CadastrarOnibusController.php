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



use DB;

class CadastrarOnibusController extends Controller
{

    public function index()
    {   
        $onibus = new Onibus();
        $onibus = $onibus::all();

        $tipoonibus = new TipoOnibus();
        $tipoonibus = $tipoonibus::all();

        $empresa = new Empresa();
        $empresa = $empresa::all();

         return view('cadastrar_onibus')

        ->with(compact('onibus'))

        ->with(compact('tipoonibus'))

        ->with(compact('empresa'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $onibus = new Onibus();
       

        $tipoonibus = new TipoOnibus();
        $tipoonibus = $tipoonibus::all();

        $empresa = new Empresa();
        $empresa = $empresa::all();

        $onibus->Numero_Onibus = $request->input('Numero_Onibus');
        $onibus->idTipo_Bus = $request->input('idTipo_Bus');
        $onibus->idEmpresa = $request->input('idEmpresa');
        $onibus->save();

        
        if ($onibus) {
            return redirect()
                       ->back() 
                       ->with(compact('onibus'))

                       ->with(compact('tipoonibus'))
               
                       ->with(compact('empresa'))

                       ->with('sucess','Onibus cadastrado com sucesso');
            } else {
                        return redirect()
                               ->back()
                                  ->with(compact('onibus'))

                                ->with(compact('tipoonibus'))
                        
                                ->with(compact('empresa'))
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar item');
                    }
    }

    public function listar(Request $request){


        $search = $request->get('search');
        $searchtipo = $request->get('searchtipo');

        $onibus = new Onibus();
        $onibus = $onibus::all();

        $tipoonibus = new TipoOnibus();
        $tipoonibus = $tipoonibus::all();

        $empresa = new Empresa();
        $empresa = $empresa::all();

    

        $onibus = DB::table ('tbOnibus')
        ->join('tbTipo_Bus','tbOnibus.idTipo_Bus', '=', 'tbTipo_Bus.idTipo_Bus')
        ->join('tbEmpresa','tbOnibus.idEmpresa', '=', 'tbEmpresa.idEmpresa')
        ->select('idOnibus', 'Numero_Onibus', 'tbTipo_Bus.Tipo_Bus','tbTipo_Bus.idTipo_Bus', 'tbEmpresa.idEmpresa', 'tbEmpresa.Empresa')
        ->where('Numero_Onibus', 'LIKE', '%'.$search.'%')
        ->where('tbTipo_Bus.Tipo_Bus', 'LIKE', '%'.$searchtipo.'%')
        ->Paginate(10);

        return view('listar_onibus', compact('onibus','tipoonibus','empresa', 'search', 'searchtipo'));

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $editar = new Onibus();
        

        $tipoonibus = new TipoOnibus();
        $tipoonibus = $tipoonibus::all();

        $empresa = new Empresa();
        $empresa = $empresa::all();

    

        $editar = DB::table ('tbOnibus')
        ->join('tbTipo_Bus','tbOnibus.idTipo_Bus', '=', 'tbTipo_Bus.idTipo_Bus')
        ->join('tbEmpresa','tbOnibus.idEmpresa', '=', 'tbEmpresa.idEmpresa')
        ->select('idOnibus', 'Numero_Onibus', 'tbTipo_Bus.Tipo_Bus','tbTipo_Bus.idTipo_Bus', 'tbEmpresa.idEmpresa', 'tbEmpresa.Empresa')
        ->where('idOnibus', $id)
        ->first();

        return view('editar_onibus', compact('editar','tipoonibus','empresa'));

    }


    public function update(Request $request, $id)
    {
        $editar = new Onibus();
        $editar = $editar::all();

        $tipoonibus = new TipoOnibus();
        $tipoonibus = $tipoonibus::all();

        $empresa = new Empresa();
        $empresa = $empresa::all();

    

        $editar = DB::table ('tbOnibus')
        ->join('tbTipo_Bus','tbOnibus.idTipo_Bus', '=', 'tbTipo_Bus.idTipo_Bus')
        ->join('tbEmpresa','tbOnibus.idEmpresa', '=', 'tbEmpresa.idEmpresa')
        ->select('idOnibus', 'Numero_Onibus', 'tbTipo_Bus.Tipo_Bus','tbTipo_Bus.idTipo_Bus', 'tbEmpresa.idEmpresa', 'tbEmpresa.Empresa')
        ->where('idOnibus', $id)
        ->update(['Numero_Onibus' => $request->input('Numero_Onibus'),
                  'idTipo_Bus' => $request->input('idTipo_Bus'),
                  'idEmpresa' => $request->input('idEmpresa')]);

                  return redirect()->route('home');
    }


    public function destroy($id)
    {
        $onibus = new Onibus();

        $deletedRows = $onibus::where('idOnibus', $id)->delete();

        if(isset($onibus)){
            return redirect()->route('listar_onibus', compact('onibus'));
        }
    }
}
