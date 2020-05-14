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
        <h3 class="box-title">Controle</h3>                                    
    </div><!-- /.box-header -->
  <div class="box-body table-responsive">
        <div class="col-sm-6">
            <form action="{{ route('listar_controle_wifi') }}" method="post">
                @csrf
                <label class="control-label" style="MARGIN-BOTTOM: 11PX;">  Onibus</label>

                <input type="search" class="" name="search" value="{{ $search }}" placeholder="Digite o Onibus">

                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                <div class="col-sm-12">
                <label class="control-label" style="MARGIN-BOTTOM: 11PX;">Linha</label>
                <input type="searchlinha" class="" name="searchlinha" value="{{ $searchlinha }}" placeholder="Digite a Linha">

                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                </div>
                <div class="col-sm-24">
                <label class="control-label">Roteador</label>
                <input type="searchlinha" class="" name="searchroteador" value="{{ $searchroteador }}" placeholder="Digite o Roteador">

                <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
                </div>
  </form>
        </div> 
        <div class="">
        <a href="{{route('cadastrar_controle_wifi')}}">
        <button type="submit" class="btn btn-primary">Registrar Controle</button>
      </a>
        </div>
        <br>
        <br>
<table id="example1" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Numero do Onibus</th>
        <th scope="col">Tipo do Onibus</th>
        <th scope="col">Empresa</th>
        <th scope="col">Linha</th>
        <th scope="col">Chip</th>
        <th scope="col">Roteador</th>
        <th scope="col">Ações</th>
        <th scope="col">Deletar</th>
      </tr>
    </thead>
    @foreach ($controle as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idWifi_Onibus}}</th>
        <td>{{$listar->Numero_Onibus}}</td>
        <td>{{$listar->Tipo_Bus}}</td>
        <td>{{$listar->Empresa}}</td>
        <td>{{$listar->Linha}}</td>
        <td>{{$listar->Chip}}</td>
        <td>{{$listar->SSID_Roteador}}</td>
       
        <td><a href="{{route('cadastrar_controle_wifi.edit', $listar->idWifi_Onibus)}}">Editar</a></td>
      
        <form onclick="return confirm('Deseja excluir?');"  action="{{route('cadastrar_controle_wifi.destroy', $listar->idWifi_Onibus)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button onclick="return confirm('Deseja excluir?');"  class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

   {{ $controle->appends(['search' => $search])->links() }}

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