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

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Inventario Agencias 2020.1</h3>                                    
    </div>    
    <div class="col-sm-6">
      <form action="{{ route('listar_inventario') }}" method="post">
          @csrf
          <label class="control-label">Pesquisar Agência</label>

          <input type="search" class="" name="search" value="{{ $search }}" placeholder="Nome da Agência">

          <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          </button>
</form>
  </div>
        <br>
        <br>
<table id="example1" class="table table-bordered table-striped">
    <thead class="thead-dark">
      <tr>
       
        <th scope="col">Nome da Agencia</th>
        <th scope="col">Nome Responsavel</th>
        <th scope="col">Telefone Responsavel</th>
        <th scope="col">Inicio Expediente</th>
        <th scope="col">Final Expediente</th>
        <th scope="col">Ações</th>
        <th scope="col">Deletar</th>
      </tr>
    </thead>
    @foreach ($inventario as $listar)
    <tbody>
      <tr>
        
        <td>{{$listar->Nome_Agencia}}</td>
        <td>{{$listar->Nome_Responsavel}}</td>
        <td>{{$listar->Tel_Responsavel}}</td>
        <td>{{$listar->Inicio_Exp}}</td>
        <td>{{$listar->Fim_Exp}}</td>

       
        <td><a href="{{route('cadastrar_inventario.edit', $listar->idInventario_Agencia)}}">Visualizar</a></td>
      
        <form onclick="return confirm('Deseja excluir?');" action="{{route('cadastrar_inventario.destroy', $listar->idInventario_Agencia)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button onclick="return confirm('Deseja excluir?');" class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach     

  
    {{ $inventario->appends(['search' => $search])->links() }}
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