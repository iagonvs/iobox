@extends('layouts.template')

@section('content')

<div class="container" style="margin-top: 55px;">

          
             
<div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                        <div class="inner">
                                <h3>
                                        {{$count}}
                                </h3>
                                 <p>Total de Itens</p>
                        </div>
                    <div class="icon">
                           <a href="cadastrar" class="ion ion-bag bg-green"> <i ></i></a>
</div>

                            <a href="listar_item" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

<div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-black">
                                <div class="inner">
                                        <h3>
                                                {{$count_fornecedor}}
                                        </h3>
                                         <p>Total de Fornecedores</p>
                                </div>
                            <div class="icon">
                                   <a href="cadastrar" class="ion ion-bag bg-black"> <i ></i></a>
        </div>
        
                                    <a href="listar_fornecedor" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
</div>
<div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                        <div class="inner">
                                <h3>
                                        {{$count_Localidade}}
                                </h3>
                                 <p>Total de Localidades</p>
                        </div>
                    <div class="icon">
                           <a href="cadastrar" class="ion ion-bag bg-green"> <i ></i></a>
</div>

                            <a href="listar_localidade" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
                </div>
</div>
<div class="col-lg-3 col-xs-6">
                <div class="small-box bg-black">
                        <div class="inner">
                                <h3>
                                        {{$count_estoque}}
                                </h3>
                                 <p>Total de Entradas</p>
                        </div>
                    <div class="icon">
                           <a href="cadastrar" class="ion ion-bag bg-black"> <i ></i></a>
</div>

                            <a href="listar_estoque" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
                </div>
</div>
<br>
<br>



      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">

              <div>
                <h3>Ultimas Entradas</h3>
                <br>
              </div>
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data Entrada</th>
                    <th scope="col">Quantidade Total</th>
                    <th scope="col">Item</th>
                  </tr>
                </thead>
                @foreach ($entrada as $listar)
                <tbody>
                  <tr>
                    <th scope="row">{{$listar->idEstoque}}</th>
                    <td>{{$listar->data_entrada}}</td>
                    <td>{{$listar->quantidade_total}}</td>
                    <td>{{$listar->descricao_item}}</td>         
                  </tr>
                </tbody>
                @endforeach
            
              
              </table>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
                <div>
                    <h3>Ultimas Saídas</h3>
                    <br>
                  </div>

              
                <table  class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data Saída</th>
                            <th scope="col">Quantidade Saída</th>
                            <th scope="col">Localidade</th>
                            <th scope="col">Descrição do Item</th>
                            
                          </tr>
                        </thead>
                        @foreach ($saida as $listar)
                        <tbody>
                          <tr>
                            <th scope="row">{{$listar->idSaida}}</th>
                            <td>{{$listar->data_saida}}</td>
                            <td>{{$listar->quantidade_saida}}</td>
                            <td>{{$listar->localidade}}</td>
                            <td>{{$listar->descricao_item}}</td>    
                                  
                          </tr>
                        </tbody>
                        @endforeach
                    
                      
                      </table>
      
              
            </div>
          </div>
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
      <br>
      <br>
      <br>

      
    


<script type="text/javascript">
 
        Redirect();
        function Redirect()
        {
                setTimeout("location.reload(true);",360000);   
        }
   
  </script>
@endsection
