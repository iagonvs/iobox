@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">


        <div class="box-header">
            <h3 class="box-title">Cadastrar Linha</h3>
        </div><!-- /.box-header -->

        <div class="col-lg-24" style="margin-left: 10px;">
            <a href="{{route('listar_linha')}}">
                <button type="submit" class="btn btn-secundary">Listar Linha</button>
            </a>
        </div>

    <form role="form" action="{{route('cadastrar_linha.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Linha</label>
                <input type="text" class="form-control" name="linha" placeholder="Linha">
        </div>
        <div class="form-group">
                <label for="quantidade">Chip</label>
                <input type="text" class="form-control" name="chip" placeholder="Chip">
        </div>
        
 
        <button type="submit" class="btn btn-primary">Cadastrar Linha</button>

      
        
    </div>
 
      </form>

    </div>

</div>


@endsection
