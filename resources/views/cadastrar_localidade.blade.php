@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        <h2>Cadastrar Localidade</h2>
        <br>
</div>

    <form action="{{route('cadastrar_localidade.store')}}" method="post">
        @csrf

        <div class="form-group">
                <label for="quantidade">Localidade</label>
                <input type="text" class="form-control" name="localidade" placeholder="Localidade">
        </div>
        <div class="form-group">
                <label for="quantidade">Setor</label>
                <input type="text" class="form-control" name="setor" placeholder="Setor">
        </div>
        
 
        <button type="submit" class="btn btn-primary">Cadastrar Localidade</button>
      </form>
@if(session('sucess'))
    <div class="alert alert-success">
        <p>{{session('sucess')}}</p>
    </div>
@endif
</div>


@endsection
