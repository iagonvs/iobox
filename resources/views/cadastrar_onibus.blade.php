@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Onibus</h3>
        </div><!-- /.box-header -->

        <div class="col-lg-24" style="margin-left: 10px;">
            <a href="{{route('listar_onibus')}}">
                <button type="submit" class="btn btn-secundary">Listar Onibus</button>
            </a>
        </div>


    <form role="form" action="{{route('cadastrar_onibus.store')}}" method="post">
            <div class="box-body">
        @csrf
        
        <div class="form-group">
                <label for="quantidade">Número do Onibus</label>
                <input type="text" class="form-control" name="Numero_Onibus" placeholder="Número do Onibus">
        </div>
       
        <label for="Tipo">Tipo do Onibus</label>
        <select name='idTipo_Bus' class="form-control form-control-lg">
                
                @foreach ($tipoonibus as $listar)
              <option value='{{$listar->idTipo_Bus}}'>{{$listar->Tipo_Bus}}</option>
              @endforeach
        </select >
        <br>
        <label for="Empresa">Empresa</label>
        <select name='idEmpresa' class="form-control form-control-lg">
                
                @foreach ($empresa as $listar)
              <option value='{{$listar->idEmpresa}}'>{{$listar->Empresa}}</option>
              @endforeach
        </select >
        
 <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
      </form>
</div>
</div>
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
