@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        <h2></h2>
   
</div>
<div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Registrar Entrada</h3>
                </div><!-- /.box-header -->

    <form role="form" action="{{route('cadastrar_entrada.update', $editar->idEstoque)}}" method="post">
        @csrf
        <div class="box-body">
        @method('PUT')
        <div class="form-group">
                <label for="quantidade">Quantidade Total</label>
                <input type="number" class="form-control" name="quantidade_total" readonly="readonly" value="{{$editar->quantidade_total}}">
        </div>

        <div class="form-group">
                
                <input type="hidden" class="form-control" name="idEstoque" readonly="readonly" value="{{$editar->idEstoque}}">
        </div>

        <label for="quantidade">Item</label>
        <select readonly="readonly"  name='idItem' class="form-control form-control-lg">
                @foreach ($item as $listar)
              <option value='{{$listar->descricao_item}}'>{{$editar->descricao_item}}</option>
              @endforeach
        </select >
<br>
        <div class="form-group">
                <label for="quantidade">Quantidade Adicional</label>
                <input type="number" class="form-control" name="quantidade_entrada" placeholder="Quantidade Adicional">
        </div>

        <label for="quantidade">Localidade</label>
        <select name='idLocalidade' class="form-control form-control-lg">
                
                @foreach ($localidade as $listar)
              <option value='{{$listar->idLocalidade}}'>{{$listar->localidade}} / {{$listar->setor}}</option>
              @endforeach
        </select >
        <br>
     
        <br>
        
 <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
</div>
      </form>
</div>
</div>
@endsection
