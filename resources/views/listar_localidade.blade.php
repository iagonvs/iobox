@extends('layouts.template')

@section('content')


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Localidade</th>
        <th scope="col">Setor</th>
      </tr>
    </thead>
    @foreach ($localidade as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idLocalidade}}</th>
        <td>{{$listar->localidade}}</td>
        <td>{{$listar->setor}}</td>
        <td><a href="cadastrar_localidade/{{$listar->idLocalidade}}/edit">Editar</a></td>
        <form action="{{route('cadastrar_localidade.destroy', $listar->idLocalidade)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

    {{ $localidade->links() }}
  </table>


@endsection