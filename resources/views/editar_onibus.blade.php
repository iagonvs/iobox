@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Onibus</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_onibus.update', $editar->idOnibus)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">Numero do Onibus</label>
                  <input type="text" class="form-control" id="Numero_Onibus" name="Numero_Onibus" value="{{$editar->Numero_Onibus}}"  placeholder="Numero_Onibus">
                </div>
                <br>
                <select name='idTipo_Bus' class="form-control form-control-lg">
                    <option value='{{$editar->idTipo_Bus}}'>{{$editar->Tipo_Bus}}</option>
                        @foreach ($tipoonibus as $listar)
                      <option value='{{$listar->idTipo_Bus}}'>{{$listar->Tipo_Bus}}</option>
                      @endforeach
                </select >
                <small>Por favor selecione o Tipo de Onibus</small>
                <br>
                <br>  
                <select name='idEmpresa' class="form-control form-control-lg">
                    <option value='{{$editar->idEmpresa}}'>{{$editar->Empresa}}</option>
                  @foreach ($empresa as $listar)
                <option value='{{$listar->idEmpresa}}'>{{$listar->Empresa}}</option>
                @endforeach
               </select >
               <small>Por favor selecione a localidade</small>
                <br>
                <br>
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_onibus')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection