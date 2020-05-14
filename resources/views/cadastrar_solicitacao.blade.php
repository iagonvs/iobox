@extends('layouts.template')

@section('content')
<div class="container">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Cadastrar Solicitação</h3>
        </div><!-- /.box-header -->

    <form role="form" action="{{route('cadastrar_solicitacao.store')}}" method="post">
            <div class="box-body">
        @csrf
        <div class="form-group">
                <label for="descricao_solicitacao">Descrição da solicitação</label>
                <textarea style="width:70%;height:200px;" class="form-control" id="descricao_solicitacao" name="descricao_solicitacao" ></textarea>
        </div>
        <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" name="quantidade_solicitacao" placeholder="Quantidade">
        </div>

        <label for="quantidade">Localidade</label>
        <select name='idLocalidade' class="form-control form-control-lg">
                
                @foreach ($localidade as $listar)
              <option value='{{$listar->idLocalidade}}'>{{$listar->localidade}}</option>
              @endforeach
        </select >

        <label for="quantidade">Status</label>
        <select name='idSolicitacaoStatus' class="form-control form-control-lg">
            @can('isAdmin')         
                @foreach ($status as $listar)
              <option value='{{$listar->idSolicitacaoStatus}}'>{{$listar->solicitacao_status}}</option>
              @endforeach
            @endcan
            @can('isRegular') 
            @foreach ($status as $listar)
            <option value='{{$listar->idSolicitacaoStatus = 2}}'>{{$listar->idSolicitacaoStatus}}</option>
            @endforeach
            @endcan
        </select >
        
      
        
        <br>
 
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
      </form>
</div>
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
