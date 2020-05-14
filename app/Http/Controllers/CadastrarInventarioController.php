<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
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



class CadastrarInventarioController extends Controller
{


    public function index()
    {
        $inventario = new Inventario();
        $inventario = Inventario::All();

        $agencia = new Agencia();
        $agencia = Agencia::All();

        return view('home', compact('inventario', 'agencia'));
    }

    public function imagem()
    {
        return view('agencia_imagem');

        
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
        try{
            $agencia = new Agencia();
            $agencia = Agencia::All();
    
            $inventario = new Inventario();
    
            $inventario_agencia = new Inventario();
    
            $inventario_agencia = $request->validate([
                'Nome_Responsavel' => 'required|max:255',
                'Tel_Responsavel' => 'required|max:255',
                'Inicio_Exp' => 'required|max:255',
                'Fim_Exp' => 'required|max:255',
                'Qtde_Agentes' => 'required|max:255',
                'Qtde_Computadores' => 'required|max:255',
                'Qtde_Mapas' => 'required|max:255',
                'Qtde_bpe' => 'required|max:255',
                'Qtde_pinpad' => 'required|max:255',
                'Qtde_internet' => 'required|max:255',
                'Nome_provedor1' => 'required|max:255',
                'Valor_provedor1' => 'required|max:255',
                'idAgencia' => 'required|max:255',
                'CNPJ' => 'required|max:255'
            ]);
    
    
            $inventario->Nome_Responsavel = $request->input('Nome_Responsavel');
            $inventario->Tel_Responsavel = $request->input('Tel_Responsavel');
            $inventario->Inicio_Exp = $request->input('Inicio_Exp');
            $inventario->Fim_Exp = $request->input('Fim_Exp');
            $inventario->Qtde_Agentes = $request->input('Qtde_Agentes');
            $inventario->Qtde_Computadores = $request->input('Qtde_Computadores');
            $inventario->Qtde_Mapas = $request->input('Qtde_Mapas');
            $inventario->Qtde_bpe = $request->input('Qtde_bpe');
            $inventario->Qtde_pinpad = $request->input('Qtde_pinpad');
            $inventario->Qtde_internet = $request->input('Qtde_internet');
            $inventario->Nome_provedor1 = $request->input('Nome_provedor1');
            $inventario->Valor_provedor1 = $request->input('Valor_provedor1');
            $inventario->Velocidade_provedor1 = $request->input('Velocidade_provedor1');
            $inventario->Nome_provedor2 = $request->input('Nome_provedor2');
            $inventario->Valor_provedor2 = $request->input('Valor_provedor2');
            $inventario->Velocidade_provedor2 = $request->input('Velocidade_provedor2');
            $inventario->sugestoes = $request->input('sugestoes');
            $inventario->idAgencia = $request->input('idAgencia');
            $inventario->cep = $request->input('cep');
            $inventario->rua = $request->input('rua');
            $inventario->bairro = $request->input('bairro');
            $inventario->cidade = $request->input('cidade');
            $inventario->uf = $request->input('uf');
            $inventario->Modelo_Impressora = $request->input('Modelo_Impressora');
            $inventario->Config_pc = $request->input('Config_pc');
            $inventario->CNPJ = $request->input('CNPJ');
    
            $inventario->save();
            
            
            
            $nameFile = null;
            
        
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
             
                // Define um aleatório para o arquivo baseado no timestamps atual
                $name = $request->input('idAgencia');
    
                // $name = $request->image->getClientOriginalName();
         
                // Recupera a extensão do arquivo
                $extension = $request->image->extension();
         
                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";
         
                // Faz o upload:
                $upload = $request->image->storeAs('categories', $nameFile);
                // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
         
                // Verifica se NÃO deu certo o upload (Redireciona de volta)
                if ( !$upload )
                    return redirect()
                                ->back()
                                ->with('error', 'Falha ao fazer upload')
                                ->withInput();
         
            }
    
            if ($inventario) {
                return redirect()
                           ->back() 
                           ->with(compact('inventario', 'inventario_agencia'))
                           ->with('sucess','Pesquisa cadastrada com sucesso');
                } else {
                            return redirect()
                                   ->back()
                                   ->with(compact('inventario', 'inventario_agencia'))
                                   ->with('errors', 'Ocorreu um erro ao tentar cadastrar a Pesquisa');
                        }
    

        }catch (Exception $e) {
            abort(403,"Não pode executar essa ação");
        }
       
    }   

    public function listar(Request $request)
    {   

        $search = $request->get('search');

        $agencia = new Agencia();
        $agencia = Agencia::All();
        $inventario = new Inventario();

        $inventario = DB::table('tbInventario_Agencia')
        ->join('tbAgencia', 'tbInventario_Agencia.idAgencia', 'tbAgencia.idAgencia')
        ->select('idInventario_Agencia', 'Nome_Responsavel', 'Tel_Responsavel', 
        'Inicio_Exp', 'Fim_Exp', 'Qtde_Agentes', 'Qtde_Computadores', 'Qtde_Mapas', 
        'Qtde_bpe', 'Qtde_pinpad', 'Qtde_internet', 'Nome_provedor1', 'Valor_provedor1', 
        'Velocidade_provedor1', 'Nome_provedor2', 'Valor_provedor2', 'Velocidade_provedor2',
         'sugestoes', 'tbAgencia.idAgencia', 'tbAgencia.Nome_Agencia', 'cep', 'rua', 'bairro', 'cidade', 'uf',
         'Modelo_Impressora', 'Config_pc','CNPJ')
        ->where('tbAgencia.Nome_Agencia', 'LIKE', '%'.$search.'%')
        ->Paginate(10);

        return view('listar_inventario', compact('inventario', 'agencia', 'search'));
    
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
        $agencia = new Agencia();
        $agencia = Agencia::All();
        $editar = new Inventario();

        $editar = DB::table('tbInventario_Agencia')
        ->join('tbAgencia', 'tbInventario_Agencia.idAgencia', 'tbAgencia.idAgencia')
        ->select('idInventario_Agencia', 'Nome_Responsavel', 'Tel_Responsavel', 
        'Inicio_Exp', 'Fim_Exp', 'Qtde_Agentes', 'Qtde_Computadores', 'Qtde_Mapas', 
        'Qtde_bpe', 'Qtde_pinpad', 'Qtde_internet', 'Nome_provedor1', 'Valor_provedor1', 
        'Velocidade_provedor1', 'Nome_provedor2', 'Valor_provedor2', 'Velocidade_provedor2',
         'sugestoes', 'tbAgencia.idAgencia', 'tbAgencia.Nome_Agencia', 'cep', 'rua', 'bairro', 'cidade', 'uf',
         'Modelo_Impressora', 'Config_pc','CNPJ')
        ->where('idInventario_Agencia', $id)
        ->first();

        return view('editar_inventario', compact('editar', 'agencia'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario = new Inventario();

        $deleteRows = $inventario->where('idInventario_Agencia', $id)->delete();

        if(isset($inventario)){
            return redirect()->route('listar_inventario', compact('inventario'));
        }
    }
}
