@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Linha</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_linha.update', $editar->idLinha_Chip)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">Linha</label>
                  <input type="text" class="form-control" id="linha" name="linha" value="{{$editar->Linha}}"  placeholder="Linha">
                </div>
                <br>

                <div class="form-group">
                    <label for="item">Chip</label>
                    <input type="text" class="form-control" id="chip" name="chip" value="{{$editar->Chip}}"  placeholder="Chip">
                  </div>
                  <br>
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_linha')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection