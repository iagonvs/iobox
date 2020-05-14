@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Tipo do Onibus</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_tipo_onibus.update', $editar->idTipo_Bus)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">Linha</label>
                  <input type="text" class="form-control" id="tipo_bus" name="tipo_bus" value="{{$editar->Tipo_Bus}}"  placeholder="tipo_bus">
                </div>
                <br>
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_tipo_onibus')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection