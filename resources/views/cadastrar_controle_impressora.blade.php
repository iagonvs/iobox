@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Registrar Controle</h3>
        </div><!-- /.box-header -->

        <div class="col-lg-24" style="margin-left: 10px;">
            <a href="{{route('listar_controle_impressora')}}">
                <button type="submit" class="btn btn-secundary">Listar Controle Impressora</button>
            </a>
        </div>


    <form role="form" action="{{route('cadastrar_controle_impressora.store')}}" method="post">
            <div class="box-body">
        @csrf
        
        <label for="idModelo_Impressora" style="margin-top: 20px;">Modelo da Impressora</label>
        <select name='idModelo_Impressora' class="chosen" style="width:250px;">       
                @foreach ($modelo_impressora as $listar)
              <option value='{{$listar->idModelo_Impressora}}'>{{$listar->Modelo_Impressora}}</option>
              @endforeach
        </select >
       
        <label for="idSetor_Agencia" style="margin-left: 274px; margin-bottom: 26px;">Setor/Agencia</label>
        <select name='idSetor_Agencia' class="chosen" style="width:250px; margin-left: 274px;">
                
                @foreach ($setor_agencia as $listar)
              <option value='{{$listar->idSetor_Agencia}}'>{{$listar->Setor_Agencia}}</option>
              @endforeach
        </select >
        <br>
        <label for="idStatus_Controle" style="margin-bottom: 20px;">STATUS </label>
        
        <select name='idStatus_Controle' class="chosen" style="width:300px;">
                @foreach ($status_controle as $listar)
              <option value='{{$listar->idStatus_Controle}}'>{{$listar->Status_Controle}}</option>
              @endforeach
        </select >

        <div class="form-group">
            <label for="quantidade">Observação saída para manutenção</label>
            <input type="text" class="form-control" name="descricao_controle_impressora" placeholder="Digite uma observação">
          </div>
        
 <br>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
      </form>
</div>
</div>

<script type="text/javascript">
$(".chosen").chosen();
</script>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
  @if(session('sucess'))
<div class="alert alert-success">
    <p>{{session('sucess')}}</p>
</div>
@endif
@endsection
