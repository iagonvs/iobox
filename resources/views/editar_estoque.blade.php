@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Estoque</h3>
        </div><!-- /.box-header -->
<form role="form" action="{{route('cadastrar_estoque.update', $editar->idEstoque)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

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
                    <br>
                    <button type="submit" class="btn btn-primary">Atualizar</button>

                   <a href="{{route('listar_estoque')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
                </div>
                
              </div>
              </form>
            </div>
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