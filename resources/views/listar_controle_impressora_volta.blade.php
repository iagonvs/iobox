@extends('layouts.template')

@section('content')

<meta charset="UTF-8">
        <title>AdminLTE | Data Tables</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Controle - IMPRESSORAS QUE VOLTARAM DA MANUTENÇÃO</h3>                                    
    </div><!-- /.box-header -->
  <div class="box-body table-responsive">
    <div class="col-lg-6" style="position: absolute;">
            <form action="{{ route('listar_controle_impressora') }}" method="post">
                @csrf
                <label class="control-label" style="MARGIN-BOTTOM: 11PX;">Modelo da Impressora</label>

                <input type="search_modelo" class="" name="search_modelo" value="{{ $search_modelo }}" placeholder="Digite o Modelo">

                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                <div class="col-sm-12">
                <label class="control-label" style="MARGIN-BOTTOM: 11PX; margin-left: 61px;">Status</label>
                <input type="search_status" class="" name="search_status" value="{{ $search_status }}" placeholder="Digite o Status">

                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                </div>
                <div class="col-sm-24">
                <label class="control-label">Setor/Agência</label>
                <input type="search_setor" class="" name="search_setor" value="{{ $search_setor }}" placeholder="Digite a Agência/Setor">

                <button style="margin-bottom: 5px;" type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                </div>
  </form>
        </div> 
        <div style="position: absolute; margin-left: 700px;">
          <div class="col-lg-24" >
        <a href="{{route('cadastrar_controle_impressora')}}">
        <button style="margin-bottom: 1px;" type="submit" class="btn btn-success">Registrar Controle  <span style="margin-left: 13px;" class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
      </a>
        </div>
        <div class="">
            <a href="{{route('listar_controle_impressora')}}">
            <button style="margin-bottom: 1px;" type="submit" class="btn btn-primary">Todos Registros</button>
          </a>
            </div>
        <div class="">
            <a href="{{route('listar_controle_impressora_saida')}}">
            <button style="margin-bottom: 1px;" type="submit" class="btn btn-primary">Impressoras em manutenção</button>
          </a>
            </div>
            <div class="">
              <a href="{{route('listar_controle_impressora_volta')}}">
              <button  type="submit" class="btn btn-primary">Impressoras que voltaram da manutenção</button>
            </a>
              </div>
            </div>
        <br>
        <br>
<table id="example1" class="table table-bordered table-striped" style="margin-top: 116px;">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Data</th>
        <th scope="col">Marca da Impressora</th>
        <th scope="col">Modelo da Impressora</th>
        <th scope="col">Setor/Agência</th>
        <th scope="col">Usuário</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
        <th scope="col">Deletar</th>
      </tr>
    </thead>
    @foreach ($controle_impressora as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idControle_Impressora}}</th>
        <td>{{date( 'd/m/Y' , strtotime($listar->Data_Status))}}</td>
        <td>{{$listar->Marca_Impressora}}</td>
        <td>{{$listar->Modelo_Impressora}}</td>
        <td>{{$listar->Setor_Agencia}}</td>
        <td>{{$listar->name}}</td>
        <td>{{$listar->Status_Controle}}</td>
        
       
        <td><a href="{{route('cadastrar_controle_impressora.edit', $listar->idControle_Impressora)}}">ATUALIZAR STATUS </a></td>
      
        <form onclick="return confirm('Deseja excluir?');"  action="{{route('cadastrar_controle_impressora.destroy', $listar->idControle_Impressora)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button onclick="return confirm('Deseja excluir?');"  class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

   {{ $controle_impressora->appends(['search_modelo' => $search_modelo])->links() }}
   {{ $controle_impressora->appends(['search_status' => $search_status])->links() }}
   {{ $controle_impressora->appends(['search_setor' => $search_setor])->links() }}

  </table>
</div>
</div>
<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function() {
      $("#example1").dataTable();
      $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
      });
  });
</script>
@endsection