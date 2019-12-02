@extends('layouts.template')

@section('content')
<div class="container">
<form action="{{route('cadastrar_fornecedor.update', $editar->idFornecedor)}}" method="post">
        @csrf
        @method('PUT')
        <div style="text-align: center;">
                <h2>Atualizar Fornecedor</h2>
                <br>
        </div>
                <div class="form-group">
                  <label for="item">Razão Social</label>
                  <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{$editar->razao_social}}"  >
                </div>
                <div class="form-group">
                        <label for="item">CPF ou CNPJ</label>
                        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$editar->cpf_cnpj}}"  >
                      </div>
                      <div class="form-group">
                            <label for="item">Telefone Celular</label>
                            <input type="text" class="form-control" id="telefone_celular" name="telefone_celular" value="{{$editar->telefone_celular}}"  >
                          </div>
                          <div class="form-group">
                                <label for="item">Telefone Residencial</label>
                                <input type="text" class="form-control" id="telefone_resid" name="telefone_resid" value="{{$editar->telefone_resid}}"  >
                              </div>
                              <div class="form-group">
                                    <label for="item">Telefone Comercial</label>
                                    <input type="text" class="form-control" id="telefone_comercial" name="telefone_comercial" value="{{$editar->telefone_comercial}}"  >
                                  </div>
                                  <div class="form-group">
                                        <label for="item">E-mail</label>
                                        <input type="text" class="form-control" id="email_fornecedor" name="email_fornecedor" value="{{$editar->email_fornecedor}}" >
                                      </div>
        
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
              </form>
            </div>
@endsection