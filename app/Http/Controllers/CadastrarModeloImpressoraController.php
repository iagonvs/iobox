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



use DB;

class CadastrarModeloImpressoraController extends Controller
{

    public function index()
    {
        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::all();

        $marca_impressora = new Marca_Impressora();
        $marca_impressora = $marca_impressora::all();

        return view('cadastrar_modelo_impressora', compact('modelo_impressora', 'marca_impressora'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        
        $marca_impressora = new Marca_Impressora();
        $marca_impressora = $marca_impressora::all();

        $modelo_impressora = new Modelo_Impressora();

        $modelo_impressora->modelo_impressora = $request->input('modelo_impressora');
        $modelo_impressora->idMarca_Impressora = $request->input('marca_impressora');
        $modelo_impressora->save();

        
        if ($modelo_impressora) {
            return redirect()
                       ->back() 
                       ->with(compact('modelo_impressora', 'marca_impressora'))
                       ->with('sucess','Impressora cadastrada com sucesso');
            } else {
                        return redirect()
                               ->back()
                               ->with(compact('modelo_impressora', 'marca_impressora'))
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar impressora');
                    }

    }

    public function listar(Request $request){

        $search = $request->get('search'); 

        $modelo_impressora = new Modelo_Impressora();
        $modelo_impressora = $modelo_impressora::All();
        $marca_impressora = new Marca_Impressora();
        $marca_impressora = $marca_impressora::All();

        $modelo_impressora = DB::table('tbModelo_Impressora')
        ->join('tbMarca_Impressora','tbModelo_Impressora.idMarca_Impressora','tbMarca_Impressora.idMarca_Impressora')
        ->select('idModelo_Impressora', 'Modelo_Impressora', 'tbMarca_Impressora.idMarca_Impressora', 'tbMarca_Impressora.Marca_Impressora')
        ->where('idModelo_Impressora', 'LIKE', '%'.$search.'%')
        ->Paginate(10);

        
        return view('listar_modelo_impressora')

        ->with(compact('marca_impressora'))

        ->with(compact('modelo_impressora'))

        ->with(compact('search'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $modelo_impressora = new Modelo_Impressora();
        $marca_impressora = new Marca_Impressora();
        $marca_impressora = $marca_impressora::All();

        $modelo_impressora = DB::table('tbModelo_Impressora')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->select('idModelo_Impressora', 'Modelo_Impressora', 'tbMarca_Impressora.idMarca_Impressora', 'tbMarca_Impressora.Marca_Impressora')
        ->where('idModelo_Impressora', $id)
        ->first();

        return view('editar_modelo_impressora', compact('modelo_impressora', 'marca_impressora'));
    }

    public function update(Request $request, $id)
    {
        $modelo_impressora = new Modelo_Impressora();
        $marca_impressora = new Marca_Impressora();
        $marca_impressora = $marca_impressora::All();

        $modelo_impressora = DB::table('tbModelo_Impressora')
        ->join('tbMarca_Impressora', 'tbModelo_Impressora.idMarca_Impressora', 'tbMarca_Impressora.idMarca_Impressora')
        ->select('idModelo_Impressora', 'Modelo_Impressora', 'tbMarca_Impressora.idMarca_Impressora', 'tbMarca_Impressora.Marca_Impressora')
        ->where('idModelo_Impressora', $id)
        ->update(['Modelo_impressora' => $request->input('modelo_impressora'),
                'tbMarca_Impressora.idMarca_Impressora' => $request->input('marca_impressora')]);

                return redirect()->route('home');
    }


    public function destroy($id)
    {
        $modelo_impressora = new Modelo_Impressora();

        $deleteRows = $modelo_impressora::where('idModelo_Impressora', $id)->delete();

        if(isset($modelo_impressora)){
            return redirect()->route('listar_modelo_impressora', compact('modelo_impressora'));
        }
    }
}
