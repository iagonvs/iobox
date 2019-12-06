@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Localidade</h3>
        </div><!-- /.box-header -->
<form role="form" action="{{route('cadastrar_localidade.update', $editar->idLocalidade)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">
 
                <div class="form-group">
                  <label for="item">Localidade</label>
                  <input type="text" class="form-control" id="localidade" name="localidade" value="{{$editar->localidade}}"  >
                </div>
                <div class="form-group">
                        <label for="item">Setor</label>
                        <input type="text" class="form-control" id="setor" name="setor" value="{{$editar->setor}}"  >
                      </div>
                     <br>
                      <button type="submit" class="btn btn-primary">Atualizar</button>

                      <a href="{{route('listar_localidade')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
              </div>
                
              </form>
            </div>
            </div>
@endsection