@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">


        <div class="box-header">
            <h3 class="box-title">Cadastrar Roteador</h3>
        </div><!-- /.box-header -->

        <div class="col-lg-24" style="margin-left: 10px;">
            <a href="{{route('listar_roteador')}}">
                <button type="submit" class="btn btn-secundary">Listar Roteador</button>
            </a>
        </div>

    <form role="form" action="{{route('cadastrar_roteador.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="SSID_Roteador">SSID Roteador</label>
                <input type="text" class="form-control" name="SSID_Roteador" placeholder="SSID_Roteador">
        </div>
        <div class="form-group">
                <label for="Senha">Senha Padrao</label>
                <input type="text" class="form-control" name="Senha_Padrao" placeholder="Senha">
        </div>
        
 
        <button type="submit" class="btn btn-primary">Cadastrar Roteador</button>

      
        
    </div>
 
      </form>

    </div>

</div>


@endsection
