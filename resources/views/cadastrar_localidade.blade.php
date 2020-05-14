@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Localidade</h3>
        </div><!-- /.box-header -->

        <div class="col-lg-36" style="margin-left: 980px;">
            <a href="{{route('listar_localidade')}}"><button type="submit" class="btn btn-info">Listar Localidades</button></a>
        </div>

    <form role="form" action="{{route('cadastrar_localidade.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Localidade</label>
                <input type="text" class="form-control" name="localidade" placeholder="Localidade">
        </div>
        <div class="form-group">
                <label for="quantidade">Setor</label>
                <input type="text" class="form-control" name="setor" placeholder="Setor">
        </div>
        
 
        <button type="submit" class="btn btn-primary">Cadastrar Localidade</button>
    </div>
      </form>
    </div>
@if(session('sucess'))
    <div class="alert alert-success">
        <p>{{session('sucess')}}</p>
    </div>
@endif
</div>


@endsection
