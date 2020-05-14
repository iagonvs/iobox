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
            <a href="{{route('listar_controle_wifi')}}">
                <button type="submit" class="btn btn-secundary">Listar Controle</button>
            </a>
        </div>


    <form role="form" action="{{route('cadastrar_controle_wifi.store')}}" method="post">
            <div class="box-body">
        @csrf
        
        <label for="idRoteador" style="margin-top: 20px;">Roteador</label>
        <select name='idRoteador' class="chosen" style="width:250px;">       
                @foreach ($roteador as $listar)
              <option value='{{$listar->idRoteador}}'>{{$listar->SSID_Roteador}}</option>
              @endforeach
        </select >
       
        <label for="idLinha_Chip" style="margin-left: 274px; margin-bottom: 26px;">Linha - Chip</label>
        <select name='idLinha_Chip' class="chosen" style="width:250px; margin-left: 274px;">
                
                @foreach ($linha as $listar)
              <option value='{{$listar->idLinha_Chip}}'>{{$listar->Linha}} / {{$listar->Chip}}</option>
              @endforeach
        </select >
        <br>
        <label for="idOnibus" style="margin-bottom: 20px;">Onibus   </label>
        
        <select name='idOnibus' class="chosen" style="width:500px;">
                @foreach ($onibus as $listar)
              <option value='{{$listar->idOnibus}}'>{{$listar->Numero_Onibus}}</option>
              @endforeach
        </select >
        
 <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
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
