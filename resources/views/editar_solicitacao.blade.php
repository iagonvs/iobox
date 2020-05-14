@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Atualizar Solicitação</h3>
        </div><!-- /.box-header -->
<form role="form" action="{{route('cadastrar_solicitacao.update', $comprar->idSolicitacaoCompra)}}" method="post">
        @csrf
        @method('PUT')
        <div class="box-body">

        <div class="form-group">
                <label for="descricao_solicitacao">Descrição da solicitação</label>
        <input type="text" style="width:70%;height:200px;" class="form-control" id="descricao_solicitacao" name="descricao_solicitacao" value="{{$comprar->descricao_solicitacao}}" >
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" name="quantidade_solicitacao" placeholder="Quantidade" value="{{$comprar->quantidade_solicitacao}}">
        </div>

        <label for="quantidade">Localidade</label>
        <select name='idLocalidade' class="form-control form-control-lg">
            <option value='{{$comprar->idLocalidade}}'>{{$comprar->localidade}}</option>
                @foreach ($localidade as $listar)
              <option value='{{$listar->idLocalidade}}'>{{$listar->localidade}}</option>
              @endforeach
        </select >

        <label for="quantidade">Status</label>
        <select name='idSolicitacaoStatus' class="form-control form-control-lg">
           <option value='{{$comprar->idSolicitacaoStatus}}'>{{$comprar->solicitacao_status}}</option>
                @foreach ($status as $listar)
              <option value='{{$listar->idSolicitacaoStatus}}'>{{$listar->solicitacao_status}}</option>
              @endforeach
        </select >
        <br>

                    <button type="submit" class="btn btn-primary">Atualizar</button>

                   <a href="{{route('listar_solicitacao')}}"><button type="button" class="btn btn-info">Voltar</button></a> 
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

            
<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

    bkLib.onDomLoaded(function() {
         new nicEditor().panelInstance('descricao_solicitacao');
    }); // convert text area with id area1 to rich text editor.

    bkLib.onDomLoaded(function() {
         new nicEditor({fullPanel : true}).panelInstance('descricao_solicitacao');
    }); // convert text area with id area2 to rich text editor with full panel.


</script>

            

@endsection