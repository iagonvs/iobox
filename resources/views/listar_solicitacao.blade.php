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
                <h3 class="box-title">Solicitações</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <div class="col-lg-24">
                    <a href="{{route('cadastrar_solicitacao')}}">
                    <button type="submit" class="btn btn-primary">Cadastrar Solicitação</button>
                  </a>
                    </div>
        <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Data Solicitação</th>
        <th scope="col">Quantidade Solicitada</th>
        <th scope="col">Descrição</th>
        <th scope="col">Localidade</th>
        <th scope="col">Solicitante</th>
        <th scope="col">Status</th>
        @can('isAdmin')
        <th scope="col">Ações</th>
        <th scope="col">Deletar</th>
        @endcan
      </tr>
    </thead>
    @foreach ($comprar as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idSolicitacaoCompra}}</th>
        <td>{{$listar->data_solicitacao}}</td>
        <td>{{$listar->quantidade_solicitacao}}</td>
        <td>{{$listar->descricao_solicitacao}}</td>
        <td>{{$listar->localidade}}</td>
        <td>{{$listar->name}}</td>
        <td>{{$listar->solicitacao_status}}</td>
        @can('isAdmin')
        <td><a href="cadastrar_solicitacao/{{$listar->idSolicitacaoCompra}}/edit">Atualizar</a>
        <form onclick="return confirm('Deseja excluir?');" action="{{route('cadastrar_solicitacao.destroy', $listar->idSolicitacaoCompra)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button onclick="return confirm('Deseja excluir?');" class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>
        @endcan
      </tr>
    </tbody>
    @endforeach

@if(session('saidaok'))
    <div class="alert alert-success">
        <p>{{session('sucess')}}</p>
    </div>
@endif
@if(session('errors'))
    <div class="alert alert-success">
        <p>{{session('errors')}}</p>
    </div>
@endif

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