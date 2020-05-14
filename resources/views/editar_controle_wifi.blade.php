@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Controle</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_controle_wifi.update', $editar->idWifi_Onibus)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

            <select name='idOnibus' class="form-control form-control-lg">
                <option value='{{$editar->idOnibus}}'>{{$editar->Numero_Onibus}}</option>
                    @foreach ($onibus as $listar)
                  <option value='{{$listar->idOnibus}}'>{{$listar->Numero_Onibus}}</option>
                  @endforeach
            </select >
                <br>
                <select name='idRoteador' class="form-control form-control-lg">
                    <option value='{{$editar->idRoteador}}'>{{$editar->SSID_Roteador}}</option>
                        @foreach ($roteador as $listar)
                      <option value='{{$listar->idRoteador}}'>{{$listar->SSID_Roteador}}</option>
                      @endforeach
                </select >
                <small>Por favor selecione o Roteador</small>
                <br>
                <br>  
                <select name='idLinha_Chip' class="form-control form-control-lg">
                    <option value='{{$editar->idLinha_Chip}}'>{{$editar->Linha}}</option>
                  @foreach ($linha as $listar)
                <option value='{{$listar->idLinha_Chip}}'>{{$listar->Linha}}</option>
                @endforeach
               </select >
               <small>Por favor selecione a Linha</small>
                <br>
                <br>
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_controle_wifi')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection