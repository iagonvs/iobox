@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Impressora | SAÍDA: {{date( 'd/m/Y' , strtotime($controle_impressora->Data_Status))}} </h3>
        </div><!-- /.box-header -->
<form role="form"  action="{{route('cadastrar_controle_impressora.update', $controle_impressora->idControle_Impressora)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

            <select readonly="readonly"  name='idModelo_Impressora' class="form-control form-control-lg">
                <option value='{{$controle_impressora->idModelo_Impressora}}'>{{$controle_impressora->Modelo_Impressora}}</option>
            </select >
                <br>
                <select readonly="readonly"  name='idSetor_Agencia' class="form-control form-control-lg">
                    <option value='{{$controle_impressora->idSetor_Agencia}}'>{{$controle_impressora->Setor_Agencia}}</option>
                </select >
                <small>Por favor selecione o Setor/Agência</small>
                <br>
                <br>  
                <select name='idStatus_Controle' class="form-control form-control-lg">
                    
                  @foreach ($status_controle as $listar)
                <option value='{{$listar->idStatus_Controle}}'>{{$listar->Status_Controle}}</option>
                @endforeach
               </select >
               <small>Por favor selecione o novo STATUS</small>
                <br>
                <br>
                {{-- @if($controle_impressora->idStatus_Controle == 2) --}}
                <div class="form-group">
                    <label for="quantidade">Observação da saída para manutenção</label>
                <input type="text" class="form-control" name="descricao_controle_impressora" placeholder="Observação da saída" value="{{$controle_impressora->descricao_controle_impressora}}">
                  </div>
                  {{-- @endif --}}
                  
                  <div class="form-group">
                    <label for="quantidade">Observação da volta</label>
                <input type="text" class="form-control" name="descricao_controle_impressora_volta" placeholder="Digite uma observação" value="{{$controle_impressora->descricao_controle_impressora_volta}}">
                  </div>
                
              
           
                <button type="submit" class="btn btn-primary">Atualizar Registro</button>
         
                <a href="{{route('listar_controle_impressora')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
            @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
  @if(session('sucess'))
<div class="alert alert-success">
    <p>{{session('sucess')}}</p>
</div>
@endif
            </div>
            

@endsection