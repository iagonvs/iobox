@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Editar Setor/Agência</h3>
        </div>
        <div class="col-lg-36" style="margin-left: 1000px;">
            <a href="{{route('listar_setor_agencia')}}"><button type="submit" class="btn btn-info">Listar Setor/Agencia</button></a>
        </div>

    <form role="form" action="{{route('cadastrar_setor_agencia.update', $setor_agencia->idSetor_Agencia)}}" method="post">
       
        @csrf
        @method('PUT')
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Digite o Setor/Agência *</label>
                <br>
                <br>
        <input type="text" class="form-control" name="setor_agencia" placeholder="Marca da Impressora" value="{{$setor_agencia->Setor_Agencia}}">
              </div>
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            
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
