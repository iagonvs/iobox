@extends('layouts.template')

@section('content')


<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Data Entrada</th>
        <th scope="col">Quantidade Total</th>
        <th scope="col">Número da NF</th>
        <th scope="col">Data da NF</th>
        <th scope="col">Data da Garantia</th>
        <th scope="col">Item</th>
        <th scope="col">Fornecedor</th>
      </tr>
    </thead>
    @foreach ($estoque as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idEstoque}}</th>
        <td>{{$listar->data_entrada}}</td>
        <td>{{$listar->quantidade_total}}</td>
        <td>{{$listar->numero_nf}}</td>
        <td>{{$listar->data_nf}}</td>
        <td>{{$listar->data_garantia}}</td>
        <td>{{$listar->descricao_item}}</td>
        <td>{{$listar->razao_social}}</td>
        <td><a href="cadastrar_estoque/{{$listar->idEstoque}}/edit">Editar</a></td>
        <td><a href="cadastrar_saida/{{$listar->idEstoque}}/edit">Saida</a></td>
        <td><a href="cadastrar_entrada/{{$listar->idEstoque}}/edit">Entrada</a></td>
        <form action="{{route('cadastrar_estoque.destroy', $listar->idEstoque)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

@if(session('saidaok'))
    <div class="alert alert-success">
        <p>{{session('sucess')}}</p>
    </div>
@endif
@if(session('errors'))
    <div class="alert alert-success">
        <p>{{session('errors')}}</p>
    </div>
@endif
  
  </table>



@endsection