@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Item</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_item.update', $editar->idItem)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">Descrição do Item</label>
                  <input type="text" class="form-control" id="descricao_item" name="descricao_item" value="{{$editar->descricao_item}}"  placeholder="Item">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Atualizar</button>

                <a href="{{route('listar_item')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection