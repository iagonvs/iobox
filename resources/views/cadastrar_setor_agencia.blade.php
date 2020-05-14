@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Setor/Agencia</h3>
        </div><!-- /.box-header -->
        <div class="col-lg-24" style="margin-left: 1000px;">
            <a href="{{route('listar_setor_agencia')}}"><button type="submit" class="btn btn-info">Listar Setor/Agencia</button></a>
        </div>

    <form role="form" action="{{route('cadastrar_setor_agencia.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Digite o Setor/Agencia *</label>
                <br>
                <br>
                <input type="text" class="form-control" name="setor_agencia" placeholder="Setor/Agência">
              </div>
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar Setor/Agencia</button>
            
        </div>
    </div>
      </form>
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

</div>



@endsection
