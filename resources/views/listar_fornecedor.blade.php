@extends('layouts.template')

@section('content')


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Razão Social</th>
        <th scope="col">CPF ou CNPJ</th>
        <th scope="col">Telefone Celular</th>
        <th scope="col">Telefone Residencial</th>
        <th scope="col">Telefone Comercial</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    @foreach ($fornecedor as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idFornecedor}}</th>
        <td>{{$listar->razao_social}}</td>
        <td>{{$listar->cpf_cnpj}}</td>
        <td>{{$listar->telefone_celular}}</td>
        <td>{{$listar->telefone_resid}}</td>
        <td>{{$listar->telefone_comercial}}</td>
        <td>{{$listar->email_fornecedor}}</td>
        <td><a href="cadastrar_fornecedor/{{$listar->idFornecedor}}/edit">Editar</a></td>
        <form action="{{route('cadastrar_fornecedor.destroy', $listar->idFornecedor)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

    {{ $fornecedor->links() }}
  </table>


@endsection