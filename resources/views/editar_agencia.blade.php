@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Agencia</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_agencia.update', $editar->idAgencia)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">Agencia</label>
                  <input type="text" class="form-control" id="empresa" name="Nome_Agencia" value="{{$editar->Nome_Agencia}}"  placeholder="Agencia">
                </div>
                <br>

       
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_agencia')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection