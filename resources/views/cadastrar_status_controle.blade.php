@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Status do controle</h3>
        </div><!-- /.box-header -->
        <div class="col-lg-36" style="margin-left: 1000px;">
            <a href="{{route('listar_status_controle')}}"><button type="submit" class="btn btn-info">Listar Status</button></a>
        </div>

    <form role="form" action="{{route('cadastrar_status_controle.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Digite o nome do Status *</label>
                <br>
                <br>
                <input type="text" class="form-control" name="status_controle" placeholder="Marca da Impressora">
              </div>
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar Status</button>
            
        </div>
    </div>
      </form>
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
</div>



@endsection
