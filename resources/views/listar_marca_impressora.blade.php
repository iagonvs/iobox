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
                <h3 class="box-title">Marca Impressora</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="col-sm-6">
                    <form action="{{ route('listar_marca_impressora') }}" method="post">
                        @csrf
                        <label class="control-label">Pesquisar</label>
        
                        <input type="search" class="" name="search" value="{{ $search }}">
        
                        <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </button>
                    </form>
                </div>
                <div class="col-lg-24">
                    <a href="{{route('cadastrar_marca_impressora')}}">
                    <button type="submit" class="btn btn-primary">Cadastrar Marca de Impressora</button>
                  </a>
                    </div>
                    <div class="col-lg-24">
                      <a href="{{route('cadastrar_modelo_impressora')}}">
                      <button style="margin-left: 50%; margin-top: 1%" type="submit" class="btn btn-primary">Cadastrar Modelo de Impressora</button>
                    </a>
                      </div>
             
                <br>
                <br>
        <table id="example1" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Marca da Impressora</th>
        <th scope="col">Ações</th>
        <th scope="col">Deletar</th>
      </tr>
    </thead>
    @foreach ($marca_impressora as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idMarca_Impressora}}</th>
        <td>{{$listar->Marca_Impressora}}</td>
        
        <td><a href="cadastrar_marca_impressora/{{$listar->idMarca_Impressora}}/edit">Editar</a></td>
        <form action="{{route('cadastrar_marca_impressora.destroy', $listar->idMarca_Impressora)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

    {{ $marca_impressora->appends(['search' => $search])->links() }}
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