@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Agencia</h3>
        </div><!-- /.box-header -->

    <form role="form" action="{{route('cadastrar_agencia.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Nome da Agencia</label>
                <br>
                <br>
                <input type="text" class="form-control" name="Nome_Agencia" placeholder="Agencia">
              </div>
             
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar Agencia</button>
        </div>
    </div>
      </form>
    </div>

</div>



@endsection
