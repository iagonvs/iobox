@extends('layouts.template')

@section('content')
<div class="container">
<form action="{{route('cadastrar_localidade.update', $editar->idLocalidade)}}" method="post">
        @csrf
        @method('PUT')
        <div style="text-align: center;">
                <h2>Atualizar Localidade</h2>
                <br>
        </div>
                <div class="form-group">
                  <label for="item">Localidade</label>
                  <input type="text" class="form-control" id="localidade" name="localidade" value="{{$editar->localidade}}"  >
                </div>
                <div class="form-group">
                        <label for="item">Setor</label>
                        <input type="text" class="form-control" id="setor" name="setor" value="{{$editar->setor}}"  >
                      </div>
                     
        
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
            </div>
@endsection