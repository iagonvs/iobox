<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\View;
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


use PDF;

use DB;

class CadastrarControleWifiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->get('search');

        $controle = new ControleWifi();

        $onibus = new Onibus();
        $onibus = Onibus::All();

        $roteador = new Roteador();
        $roteador = Roteador::All();

        $linha = new Linha();
        $linha = Linha::All();

        return view('cadastrar_controle_wifi', compact('controle','onibus','roteador','linha', 'search'));
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
        $search = $request->get('search');

        $controle = new ControleWifi();

        $onibus = new Onibus();
        $onibus = Onibus::where('Numero_Onibus', 'LIKE', '%'.$search.'%')
        ->get();

        $roteador = new Roteador();
        $roteador = Roteador::All();

        $linha = new Linha();
        $linha = Linha::All();

        
        
        $controle->idRoteador = $request->input('idRoteador');
        $controle->idLinha_Chip = $request->input('idLinha_Chip');
        $controle->idOnibus = $request->input('idOnibus');

        

        $controle->save();





        if ($controle) {
            return redirect()
                       ->back() 
                       ->with(compact('onibus'))

                       ->with(compact('controle'))

                       ->with(compact('roteador'))

                       ->with(compact('linha'))
               
                       ->with(compact('search'))

                       ->with('sucess','Controle cadastrado com sucesso');
            } else {
                        return redirect()
                               ->back()
                               ->with(compact('onibus'))

                               ->with(compact('controle'))
        
                               ->with(compact('roteador'))
        
                               ->with(compact('linha'))
                       
                               ->with(compact('search'))
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar item');
                    }

    }

    public function listar(Request $request){

        $search =  $request->get('search');
        $searchlinha =  $request->get('searchlinha');
        $searchroteador =  $request->get('searchroteador');

        $controle = new ControleWifi();

        $onibus = new Onibus();

        $roteador = new Roteador();

        $linha = new Linha();

        $tipoonibus = new TipoOnibus();

        $empresa = new Empresa();

        $controle = DB::table('tbWifi_Onibus')
        ->join('tbRoteador', 'tbWifi_Onibus.idRoteador','tbRoteador.idRoteador')
        ->join('tbOnibus', 'tbWifi_Onibus.idOnibus','tbOnibus.idOnibus')
        ->join('tbLinha_Chip', 'tbWifi_Onibus.idLinha_Chip','tbLinha_Chip.idLinha_Chip')
        ->join('tbEmpresa', 'tbOnibus.idEmpresa','tbEmpresa.idEmpresa')
        ->join('tbTipo_Bus', 'tbOnibus.idTipo_Bus','tbTipo_Bus.idTipo_Bus')
        ->select('idWifi_Onibus','tbRoteador.idRoteador','tbRoteador.SSID_Roteador','tbOnibus.idOnibus','tbOnibus.Numero_Onibus','tbLinha_Chip.idLinha_Chip','tbLinha_Chip.Linha','tbLinha_Chip.Chip','tbEmpresa.idEmpresa','tbEmpresa.Empresa','tbTipo_Bus.idTipo_Bus','tbTipo_Bus.Tipo_Bus')
        ->where('Numero_Onibus', 'LIKE', '%'.$search.'%')
        ->where('Linha', 'LIKE', '%'.$searchlinha.'%')
        ->where('SSID_Roteador', 'LIKE', '%'.$searchroteador.'%')
        ->Paginate(15);

        return view('listar_controle_wifi', compact('controle','onibus','roteador','linha','empresa','tipoonibus', 'search','searchlinha','searchroteador'));

    }

    public function imprimir_pdf(){


        $controle = new ControleWifi();

        $onibus = new Onibus();

        $roteador = new Roteador();

        $linha = new Linha();

        $tipoonibus = new TipoOnibus();

        $empresa = new Empresa();

        $controle = DB::table('tbWifi_Onibus')
        ->join('tbRoteador', 'tbWifi_Onibus.idRoteador','tbRoteador.idRoteador')
        ->join('tbOnibus', 'tbWifi_Onibus.idOnibus','tbOnibus.idOnibus')
        ->join('tbLinha_Chip', 'tbWifi_Onibus.idLinha_Chip','tbLinha_Chip.idLinha_Chip')
        ->join('tbEmpresa', 'tbOnibus.idEmpresa','tbEmpresa.idEmpresa')
        ->join('tbTipo_Bus', 'tbOnibus.idTipo_Bus','tbTipo_Bus.idTipo_Bus')
        ->select('idWifi_Onibus','tbRoteador.idRoteador','tbRoteador.SSID_Roteador','tbOnibus.idOnibus','tbOnibus.Numero_Onibus','tbLinha_Chip.idLinha_Chip','tbLinha_Chip.Linha','tbLinha_Chip.Chip','tbEmpresa.idEmpresa','tbEmpresa.Empresa','tbTipo_Bus.idTipo_Bus','tbTipo_Bus.Tipo_Bus')
        ->get();


       //FUNÇÃO PRINCIPAL USANDO ATRIBUTOS DO DOMPDF / REDIRECIONANDO PRA VIEW relatorio_saida QUE SERÁ O HTML RESPONSÁVEL DO TEMPLATE DO PDF
        $pdf = Pdf::loadView('relatorio_wifi', compact('controle'));
       

        //MODELO DE FOLHA E DE EXIBIÇÃO
        return $pdf->setPaper('a4')->download('Relatório Wifi-Bus.pdf');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $editar = new ControleWifi();

       
        $onibus = new Onibus();
        $onibus = Onibus::All();

        $roteador = new Roteador();
        $roteador = Roteador::All();

        $linha = new Linha();
        $linha = Linha::All();


        $editar = DB::table('tbWifi_Onibus')
        ->join('tbRoteador', 'tbWifi_Onibus.idRoteador','tbRoteador.idRoteador')
        ->join('tbOnibus', 'tbWifi_Onibus.idOnibus','tbOnibus.idOnibus')
        ->join('tbLinha_Chip', 'tbWifi_Onibus.idLinha_Chip','tbLinha_Chip.idLinha_Chip')
        ->select('idWifi_Onibus','tbRoteador.idRoteador','tbRoteador.SSID_Roteador','tbOnibus.idOnibus','tbOnibus.Numero_Onibus','tbLinha_Chip.idLinha_Chip','tbLinha_Chip.Linha')
        ->where('idWifi_Onibus', $id)
        ->first();

        return view('editar_controle_wifi', compact('editar','onibus','roteador','linha'));
    }


    public function update(Request $request, $id)
    {
        $editar = new ControleWifi();

       
        $onibus = new Onibus();
        $onibus = Onibus::All();

        $roteador = new Roteador();
        $roteador = Roteador::All();

        $linha = new Linha();
        $linha = Linha::All();

        $editar = DB::table('tbWifi_Onibus')
        ->join('tbRoteador', 'tbWifi_Onibus.idRoteador','tbRoteador.idRoteador')
        ->join('tbOnibus', 'tbWifi_Onibus.idOnibus','tbOnibus.idOnibus')
        ->join('tbLinha_Chip', 'tbWifi_Onibus.idLinha_Chip','tbLinha_Chip.idLinha_Chip')
        ->select('idWifi_Onibus','tbRoteador.idRoteador','tbRoteador.SSID_Roteador','tbOnibus.idOnibus','tbOnibus.Numero_Onibus','tbLinha_Chip.idLinha_Chip','tbLinha_Chip.Linha')
        ->where('idWifi_Onibus', $id)
        ->update(['idRoteador' => $request->input('idRoteador'),
                  'idLinha_Chip' => $request->input('idLinha_Chip'),
                  'idOnibus' => $request->input('idOnibus')]);

        return redirect()->route('home');
    }


    public function destroy($id)
    {
        $controle = new ControleWifi();

        $deleteRows = $controle->where('idWifi_Onibus', $id)->delete();

        
        if(isset($controle)){
            return redirect()->route('listar_controle_wifi', compact('controle'));
        }
    }
}
