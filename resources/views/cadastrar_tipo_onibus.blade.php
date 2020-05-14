@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Tipo de Onibus</h3>
        </div><!-- /.box-header -->

        <div class="col-lg-24" style="margin-left: 10px;">
            <a href="{{route('listar_tipo_onibus')}}">
                <button type="submit" class="btn btn-secundary">Listar Tipo Onibus</button>
            </a>
        </div>


    <form role="form" action="{{route('cadastrar_tipo_onibus.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Tipo</label>
                <br>
                <br>
                <input type="text" class="form-control" name="tipo_bus" placeholder="Semi-Leito, Leito, Executivo, etc...">
              </div>
             
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar Tipo</button>
        </div>
    </div>
      </form>
    </div>

</div>



@endsection
