@extends('layouts.template')

@section('content')


<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Descrição do item</th>
      </tr>
    </thead>
    @foreach ($item as $listar)
    <tbody>
      <tr>
        <th scope="row">{{$listar->idItem}}</th>
        <td>{{$listar->descricao_item}}</td>
        <td><a href="cadastrar_item/{{$listar->idItem}}/edit">Editar</a></td>
        <form action="{{route('cadastrar_item.destroy', $listar->idItem)}}" method="POST">
          @csrf
          @method('DELETE')
        <td><button class="fa fa-trash-o" aria-hidden="true" type="submit"></button></td>
        </form>

      </tr>
    </tbody>
    @endforeach

    {{ $item->links() }}
  </table>


@endsection