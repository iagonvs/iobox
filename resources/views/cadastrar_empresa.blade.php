@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Empresa</h3>
        </div><!-- /.box-header -->

    <form role="form" action="{{route('cadastrar_empresa.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Nome da Empresa</label>
                <br>
                <br>
                <input type="text" class="form-control" name="empresa" placeholder="Empresa">
              </div>
             
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar Empresa</button>
        </div>
    </div>
      </form>
    </div>

</div>



@endsection
