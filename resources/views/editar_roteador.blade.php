@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Roteador</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_roteador.update', $editar->idRoteador)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">SSID Roteador</label>
                  <input type="text" class="form-control" id="SSID_Roteador" name="SSID_Roteador" value="{{$editar->SSID_Roteador}}"  placeholder="SSID_Roteador">
                </div>
                <br>

                <div class="form-group">
                    <label for="item">Senha Padrao</label>
                    <input type="text" class="form-control" id="Senha_Padrao" name="Senha_Padrao" value="{{$editar->Senha_Padrao}}"  placeholder="Senha_Padrao">
                  </div>
                  <br>
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_roteador')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection