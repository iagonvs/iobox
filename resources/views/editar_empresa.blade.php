@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Empresa</h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_empresa.update', $editar->idEmpresa)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

                <div class="form-group">
                  <label for="item">Linha</label>
                  <input type="text" class="form-control" id="empresa" name="empresa" value="{{$editar->Empresa}}"  placeholder="Empresa">
                </div>
                <br>

       
           
                <button type="submit" class="btn btn-primary">Atualizar</button>
         
                <a href="{{route('listar_empresa')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            </div>
@endsection