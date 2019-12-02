@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        <h2>Cadastrar Estoque</h2>
        <br>
</div>

    <form action="{{route('cadastrar_estoque.store')}}" method="post">
        @csrf
        <div class="form-group">
                <label for="quantidade">Quantidade total</label>
                <input type="number" class="form-control" name="quantidade_total" placeholder="Quantidade total">
        </div>
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
        <select name='idItem' class="form-control form-control-lg">
                @foreach ($item as $listar)
              <option value='{{$listar->idItem}}'>{{$listar->descricao_item}}</option>
              @endforeach
        </select >
        <br>
        <select name='idFornecedor' class="form-control form-control-lg">
                @foreach ($fornecedor as $listar)
              <option value='{{$listar->idFornecedor}}'>{{$listar->razao_social}}</option>
              @endforeach
        </select >
        
 <br>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
</div>

@if(session('sucess'))
    <div class="alert alert-success">
        <p>{{session('sucess')}}</p>
    </div>
@endif


@if(session('sucess'))
<div class="alert alert-success">
    <p>{{session('sucess')}}</p>
</div>
@endif
@if(session('errors'))
<div class="alert alert-success">
    <p>{{session('errors')}}</p>
</div>
@endif
@endsection