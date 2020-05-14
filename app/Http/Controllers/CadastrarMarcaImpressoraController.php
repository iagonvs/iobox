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



use DB;

class CadastrarMarcaImpressoraController extends Controller
{
    
    public function index()
    {
        $marca_impressora = new Marca_Impressora();
        $marca_impressora = $marca_impressora::all();

        return view('cadastrar_marca_impressora', compact('marca_impressora'));
    }

    public function store(Request $request)
    {
        $marca_impressora = new Marca_Impressora();
        
        $marca_impressora->marca_impressora = $request->input('marca_impressora');
        $marca_impressora->save();

        

        if ($marca_impressora) {
            return redirect()
                       ->back() 
                       ->with(compact('marca_impressora'))
                       ->with('sucess','Marca de Impressora cadastrada com sucesso');
            } else {
                        return redirect()
                               ->back()
                               ->with(compact('marca_impressora'))
                               ->with('errors', 'Ocorreu um erro ao tentar cadastrar marca de impressora');
                    }
    }

    public function listar(Request $request){

        $search = $request->get('search');

        $marca_impressora = Marca_Impressora::where('idMarca_Impressora', 'LIKE', '%'.$search.'%')
        ->Paginate(10);

        return view('listar_marca_impressora')

        ->with(compact('marca_impressora'))

        ->with(compact('search'));
    }


  
    public function edit($id)
    {
        $marca_impressora = new Marca_Impressora();
        $marca_impressora = DB::table('tbMarca_Impressora')
        ->where('idMarca_Impressora', $id)
        ->first();

        return view('editar_marca_impressora', compact('marca_impressora'));
    }

    public function update(Request $request, $id)
    {
        $marca_impressora = DB::table('tbMarca_Impressora')
        ->where('idMarca_Impressora', $id)
        ->update(['Marca_Impressora' => $request->imput('marca_impressora')]);

        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $marca_impressora = new Marca_Impressora();
        $deletedRows = $marca_impressora::where('idMarca_Impressora', $id)->delete();
        if(isset($marca_impressora)){
            return redirect()->route('listar_marca_impressora', compact('marca_impressora'));
        }
    }
}
