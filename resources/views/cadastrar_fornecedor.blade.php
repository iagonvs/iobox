@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>
<div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cadastrar Fornecedor</h3>
                </div><!-- /.box-header -->

                <div class="col-lg-36" style="margin-left: 980px;">
                    <a href="{{route('listar_fornecedor')}}"><button type="submit" class="btn btn-info">Listar Fornecedores</button></a>
                </div>

    <form role="form"  action="{{route('cadastrar_fornecedor.store')}}" method="post">
        @csrf
        <div class="box-body">
        <div class="form-group">
                <label for="quantidade">Razão Social *</label>
                <input type="text" class="form-control" name="razao_social" placeholder="Razão Social">
        </div>
        <div class="form-group">
                <label for="quantidade">CPF ou CNPJ *</label>
                <input type="text" class="form-control" name="cpf_cnpj" placeholder="CPF ou CNPJ">
        </div>
        <div class="form-group">
                <label for="quantidade">Telefone Celular</label>
                <input type="text" class="form-control" name="telefone_celular" placeholder="Celular">
        </div>
        <div class="form-group">
                <label for="quantidade">Telefone Residencial</label>
                <input type="text" class="form-control" name="telefone_resid" placeholder="Residencial">
        </div>
        <div class="form-group">
                <label for="quantidade">Telefone Comercial</label>
                <input type="text" class="form-control" name="telefone_comercial" placeholder="Comercial">
        </div>
        <div class="form-group">
                <label for="quantidade">E-mail</label>
                <input type="text" class="form-control" name="email_fornecedor" placeholder="E-mail">
        </div>
 
        <button type="submit" class="btn btn-primary">Cadastrar Fornecedor</button>
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
