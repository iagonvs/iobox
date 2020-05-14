@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Estoque</h3>

  
        </div><!-- /.box-header -->

            <div class="col-lg-36" style="margin-left: 1000px;">
            <a href="{{route('listar_estoque')}}"><button type="submit" class="btn btn-info">Listar estoques</button></a>
            </div>

    <form role="form" action="{{route('cadastrar_estoque.store')}}" method="post">
            <div class="box-body">
        @csrf
        <label for="quantidade">Item *</label>
        <select name='idItem' class="form-control form-control-lg">
                
                @foreach ($item as $listar)
              <option value='{{$listar->idItem}}'>{{$listar->descricao_item}}</option>
              @endforeach
        </select >
      <br>
        <div class="form-group">
                <label for="quantidade">Número da NF</label>
                <input type="text" class="form-control" name="numero_nf" placeholder="Número da NF">
        </div>
        <div class="form-group">
                <label for="quantidade">Data da NF</label>
                <input type="date" class="form-control" name="data_nf" placeholder="Data da NF">
        </div>
        <div class="form-group">
                <label for="quantidade">Data da Garantia</label>
                <input type="date" class="form-control" name="data_garantia" placeholder="Data da Garantia">
        </div>
 
        <label for="quantidade">Fornecedor *</label>
        <select name='idFornecedor' class="form-control form-control-lg">
                
                @foreach ($fornecedor as $listar)
              <option value='{{$listar->idFornecedor}}'>{{$listar->razao_social}}</option>
              @endforeach
        </select >
        <br>
        <label for="quantidade">Localidade *</label>
        <select name='idLocalidade' class="form-control form-control-lg">
                
                @foreach ($localidade as $listar)
              <option value='{{$listar->idLocalidade}}'>{{$listar->localidade}}</option>
              @endforeach
        </select >
<br>
        <div class="form-group">
            <label for="quantidade">Quantidade total *</label>
            <input type="number" class="form-control" name="quantidade_total" placeholder="Quantidade total">
    </div>

    <div class="form-group">
        <label for="quantidade">Estoque Minimo *</label>
        <input type="number" class="form-control" name="estoque_min" placeholder="Quantidade Minima">
</div>
        
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



@endsection
