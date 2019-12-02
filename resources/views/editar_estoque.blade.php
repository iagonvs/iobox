@extends('layouts.template')

@section('content')
<div class="container">
<form action="{{route('cadastrar_estoque.update', $editar->idEstoque)}}" method="post">
        @csrf
        @method('PUT')
        <div style="text-align: center;">
                <h2>Atualizar Estoque</h2>
                <br>
        </div>
                <div class="form-group">
                  <label for="item">Quantidade</label>
                  <input type="text" class="form-control" id="quantidade_total" name="quantidade_total" value="{{$editar->quantidade_total}}"  >
                </div>
                <div class="form-group">
                        <label for="item">Setor</label>
                        <input type="text" class="form-control" id="numero_nf" name="numero_nf" value="{{$editar->numero_nf}}"  >
                      </div>
                      <div class="form-group">
                            <label for="item">Setor</label>
                            <input type="text" class="form-control" id="data_nf" name="data_nf" value="{{$editar->data_nf}}"  >
                          </div>
                          <div class="form-group">
                                <label for="item">Setor</label>
                                <input type="text" class="form-control" id="data_garantia" name="data_garantia" value="{{$editar->data_garantia}}"  >
                              </div>

                      <select name='idItem' class="form-control form-control-lg">
                            @foreach ($item as $listar)
                          <option value='{{$listar->idItem}}'>{{$listar->descricao_item}}</option>
                          @endforeach
                    </select >
                    <br>
                    <select name='idFornecedor' class="form-control form-control-lg">
                            @foreach ($fornecedor as $listar)
                          <option value='{{$listar->idFornecedor}}'>{{$listar->razao_social}}</option>
                          @endforeach
                    </select >
        
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
              @if(session('sucess'))
              <div class="alert alert-success">
                  <p>{{session('sucess')}}</p>
              </div>
            @endif
            @if(session('errors'))
              <div class="alert alert-success">
                  <p>{{session('errors')}}</p>
              </div>
            @endif
            </div>

            

@endsection