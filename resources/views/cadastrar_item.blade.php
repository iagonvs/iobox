@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        <h2>Cadastrar Item</h2>
        <br>
</div>

    <form action="{{route('cadastrar_item.store')}}" method="post">
        @csrf

        <div class="form-group">
                <label for="quantidade">Descrição do Item</label>
                <br>
                <br>
                <input type="text" class="form-control" name="descricao_item" placeholder="Descrição do Item">
              </div>
        <div class="form-group form-check">

            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar Item</button>
        </div>
       
      </form>

      @if(session('sucess'))
    <div class="alert alert-success">
        <p>{{session('sucess')}}</p>
    </div>
@endif
</div>



@endsection
