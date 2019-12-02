@extends('layouts.template')

@section('content')
<div class="container">
<form action="{{route('cadastrar_item.update', $editar->idItem)}}" method="post">
        @csrf
        @method('PUT')
        <div style="text-align: center;">
                <h2>Atualizar Item</h2>
                <br>
        </div>
                <div class="form-group">
                  <label for="item">Descrição do Item</label>
                  <input type="text" class="form-control" id="descricao_item" name="descricao_item" value="{{$editar->descricao_item}}"  placeholder="Item">
                </div>
        
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
            </div>
@endsection