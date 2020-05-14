@extends('layouts.template')

@section('content')

@can('isAdmin')

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
                           <a href="" class="ion ion-bag bg-green"> <i ></i></a>
</div>

                            <a href="listar_item" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


<div class="col-lg-3 col-xs-6">
              <div class="small-box bg-black">
                      <div class="inner">
                              <h3>
                                      {{$count_controle_impressora}}
                              </h3>
                               <p>Impressoras em REPARO</p>
                      </div>
                  <div class="icon">
                    
                         <a href="" style="margin-bottom: 15px;" class="icon ion-printer  bg-black"> <i ></i></a>
                       
            </div>
            
                          <a href="listar_controle_impressora_saida" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
              </div>
</div>
<div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                        <div class="inner">
                                <h3>
                                        {{$count_wifi}}
                                </h3>
                                 <p>Total de Onibus com WIFI</p>
                        </div>
                    <div class="icon">
                           <a href="" class="ion ion-wifi bg-green"> <i ></i></a>
</div>

                            <a href="listar_controle_wifi" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
                </div>
</div>
<div class="col-lg-3 col-xs-6">
                <div class="small-box bg-black">
                        <div class="inner">
                                <h3>
                                        {{$count_entrada}}
                                </h3>
                                 <p>Total de Entradas</p>
                        </div>
                    <div class="icon">
                           <a href="" class="ion ion-arrow-up-c bg-black"> <i ></i></a>
                         
</div>

                            <a href="listar_item_entrada" class="small-box-footer">Listar<i class="fa fa-arrow-circle-right"></i></a>
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
                    <th scope="col">Descrição Entrada</th>
                    <th scope="col">Quantidade Entrada</th>
                    <th scope="col">Localidade</th>
                    <th scope="col">Item</th>
                    <th scope="col">Usuário</th>
                  </tr>
                </thead>
                @foreach ($entrada as $listar)
                <tbody>
                  <tr>
                    <th scope="row">{{$listar->idEstoque}}</th>
                    <td>{{ date( 'd/m/Y' , strtotime($listar->data_entrada))}}</td>
                    <td>{{$listar->descricao_entrada}}</td>
                    <td>{{$listar->quantidade_entrada}}</td>
                    <td>{{$listar->localidade}}</td>
                    <td>{{$listar->descricao_item}}</td>   
                    <td>{{$listar->name}}</td>        
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
                            <th scope="col">Usuario</th>
                            
                          </tr>
                        </thead>
                        @foreach ($saida as $listar)
                        <tbody>
                          <tr>
                            <th scope="row">{{$listar->idSaida}}</th>
                            <td>{{ date( 'd/m/Y' , strtotime($listar->data_saida))}}</td>
                            <td>{{$listar->quantidade_saida}}</td>
                            <td>{{$listar->localidade}}</td>
                            <td>{{$listar->descricao_item}}</td> 
                            <td>{{$listar->name}}</td>   
                                  
                          </tr>
                        </tbody>
                        @endforeach
                    
                      
                      </table>
      
              
            </div>
          </div>
        </div>


      </div>


  
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
              <div>
                  <h3 style="color: red;">Estoque Mínimo</h3>
                  <br>
                </div>

            
              <table  class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Item</th>
                          <th scope="col">Quantidade total</th>
                          <th scope="col">Fornecedor</th>
                          <th scope="col">Localidade</th>
                         
                        </tr>
                      </thead>
                      @foreach ($estoque as $listar)
                      <tbody>
                        <tr>
                          <th scope="row">{{$listar->idItem}}</th>
                          <td>{{$listar->descricao_item}}</td>
                          <td>{{$listar->quantidade_total}}</td>
                          <td>{{$listar->razao_social}}</td>
                          <td>{{$listar->localidade}}</td>
                              
                        </tr>
                      </tbody>
                      @endforeach
                  
                    
                    </table>
    
            
          </div>
        </div>
      </div>
      
    </div>
@endcan



@can('isRegular')
<div class="container" style="margin-top: 55px;">
    
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">

              <div>
                <h3>Estoque - Agências</h3>
                <br>
              </div>
              <table  class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Fabricante</th>
                    <th scope="col">Localidade</th>
                    <th scope="col">quantidade_total</th>
                  </tr>
                </thead>
                @foreach ($estoqueagencia as $listar)
                <tbody>
                  <tr>
                    <th scope="row">{{$listar->idEstoque}}</th>
                    <td>{{$listar->descricao_item}}</td>
                    <td>{{$listar->razao_social}}</td>
                    <td>{{$listar->localidade}}</td>
                    <td>{{$listar->quantidade_total}}</td>      
                  </tr>
                </tbody>
                @endforeach
            
              
              </table>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
 
        Redirect();
        function Redirect()
        {
                setTimeout("location.reload(true);",360000);   
        }
   
  </script>
@endcan



@if(Gate::check('isAgencia'))
@section('content')

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

@section('content')
<br>
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
<br>
<div class="container" style="background-color:#3CB371;">
    <div style="text-align: center;">
        
        <br>
</div>

<div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">PESQUISA DE CAMPO:</h3>
          
        </div><!-- /.box-header -->
        <div style="padding: 10px;">
        <h4>Prezados, este formulário tem como objetivo principal obter informações relevantes referente a atual estrutura de guichê das agências. Para garantirmos melhorias, é necessário que todas as informações sejam preenchidas corretamente, assim teremos assertividade no processo.

          O Grupo Weipar agradece a sua colaboração!</h4>
        </div>
        <br>  
        <div style="text-align: center;"> 
          <img style="width: 18%;" src="/img/Logo_2_Weipar.png" alt="">
      
        </div>
        <br>
   <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 1: INFORMAÇÕES SOBRE A AGÊNCIA</h3></div>
    <form role="form" action="{{route('cadastrar_inventario.store')}}" method="post" enctype="multipart/form-data">
            <div class="box-body">
        @csrf
        <label for="quantidade">1 - ESCOLHA SUA AGENCIA *</label>
        <select name='idAgencia' class="form-control form-control-lg">
          @foreach ($agencia as $listar)
        <option value='{{$listar->idAgencia}}'>{{$listar->Nome_Agencia}}</option>
          @endforeach
              
        </select >
      <br>
      <div class="form-group col-md-12">
        <div class="form-group">
          <label>CNPJ:</label>
          <input name="CNPJ" class="form-control"  type="number" id="CNPJ" value="" >
        </div>
      </div>
        <br>
        <div class="form-group col-md-6">
        <div class="form-group">
          <label for="quantidade">2 - HORÁRIO DE FUNCIONAMENTO *</label>
          <p>Início do expediente</p>
          <input type="time" class="bfh-timepicker" name="Inicio_Exp" placeholder="">
     </div> 
    </div>

    <div class="form-group col-md-6">
      <div class="form-group">
        <label for="quantidade">-</label>
        <p>Final do expediente</p>
        <input type="time" class="bfh-timepicker" name="Fim_Exp" placeholder="">
   </div> 
  </div>

  <html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    </head>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>CEP:
        <input name="cep" class="form-control"  type="text" id="cep" name="cep" value="" size="10" maxlength="9" /></label><br />
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>RUA:
        <input name="rua" class="form-control"  type="text" id="rua" name="rua" size="60" /></label><br />
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>BAIRRO:
        <input name="bairro" class="form-control"  type="text"  id="bairro"  name="bairro" size="40" /></label><br />
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>CIDADE:
        <input name="cidade" class="form-control"  type="text" id="cidade" name="cidade" size="40" /></label><br />
      </div>
    </div>
    <div class="form-group col-md-12">
      <div class="form-group">
        <label>ESTADO:
        <input name="uf" class="form-control"  type="text" id="uf"  name="uf" size="2" /></label><br />    
      </div>
    </div>  

    </html>

  <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 2: INFORMAÇÕES SOBRE O AGENTE</h3></div>
<br>
    <div class="form-group">
                <label for="quantidade">3 - DIGITE SEU NOME COMPLETO (RESPONSÁVEL) *</label>
                <input type="text" class="form-control" name="Nome_Responsavel" placeholder="">
        </div>

   
        <div class="form-group">
          <label for="quantidade">4 - NÚMERO DE TELEFONE PARA CONTATO (RESPONSÁVEL PELA AGÊNCIA)*</label>
                <input type="text" class="form-control" name="Tel_Responsavel" placeholder="">
        </div>
        <div class="form-group">
                <label for="quantidade">5 - QUANTIDADE DE AGENTES NA AGÊNCIA SELECIONADA *</label>
                <input type="number" class="form-control" name="Qtde_Agentes" placeholder="">
        </div>


        <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 3: EQUIPAMENTOS</h3></div>

          <div class="form-group">
            <label for="quantidade">6 - QUANTIDADE DE COMPUTADORES *</label>
            <input type="number" class="form-control" name="Qtde_Computadores" placeholder="">
        </div>

        <div class="form-group">
          <label for="Config_pc">CONFIGURAÇÕES DOS COMPUTADORES (OPCIONAL)</label>
          <input type="text" class="form-control" name="Config_pc" placeholder="">
      </div>

          <div class="form-group">
            <label for="quantidade">7 - QUANTIDADE DE IMPRESSORAS DE MAPAS *</label>
            <input type="number" class="form-control" name="Qtde_Mapas" placeholder="">
        </div>

        <div class="form-group">
          <label for="Modelo_Impressora">MODELO DA IMPRESSORA (OPCIONAL)</label>
          <input type="text" class="form-control" name="Modelo_Impressora" placeholder="">
      </div>

          <div class="form-group">
            <label for="quantidade">8 - QUANTIDADE DE IMPRESSORAS DE PASSAGEM *</label>
            <input type="number" class="form-control" name="Qtde_bpe" placeholder="">
        </div>

            <div class="form-group">
              <label for="quantidade">9 - QUANTIDADE DE PINPAD (MÁQUINA DE CARTÃO) *</label>
              <input type="number" class="form-control" name="Qtde_pinpad" placeholder="">
          </div>
          <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 4: INTERNET</h3></div>
          <div class="form-group">
            <label for="quantidade">10 - QUANTIDADE DE PROVEDORES DE INTERNET *</label>
            <input type="number" class="form-control" name="Qtde_internet" placeholder="">
        </div>

        <div class="form-group">
          <label for="quantidade">11 - NOME DO PROVEDOR 1: *</label>
          <input type="text" class="form-control" name="Nome_provedor1" placeholder="">
      </div>

      <div class="form-group">
        <label for="quantidade">12 - VALOR DO PROVEDOR 1: (FAVOR COLOCAR SEM PONTO E SEM VIRGULA)* </label>
        <input type="number" class="form-control" name="Valor_provedor1" placeholder="">
    </div>

          <div class="form-group">
            <label for="quantidade">13 - VELOCIDADE DA INTERNET (QUANTOS MEGAS) DO PROVEDOR: 1 </label>
            <input type="number" class="form-control" name="Velocidade_provedor1" placeholder="">
        </div>

        <div class="form-group" style="text-align: center;">
          <b><P>CASO NÃO TENHA 2 (DOIS) PROVEDORES DE INTERNET PULE NESTE MOMENTO PARA SESSÃO 5</P></b>
      </div>

        <div class="form-group">
          <label for="quantidade">14 - NOME DO PROVEDOR 2: </label>
          <input type="text" class="form-control" name="Nome_provedor2" placeholder="">
      </div>

      <div class="form-group">
        <label for="quantidade">15 - VALOR DO PROVEDOR 2: (FAVOR COLOCAR SEM PONTO E SEM VIRGULA) </label>
        <input type="number" class="form-control" name="Valor_provedor2" placeholder="">
    </div>

          <div class="form-group">
            <label for="quantidade">16 - VELOCIDADE DA INTERNET (QUANTOS MEGAS) DO PROVEDOR: 2</label>
            <input type="number" class="form-control" name="Velocidade_provedor2" placeholder="">
        </div>

        <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 5: SUGESTÕES PARA MELHORIA</h3></div>
          <div class="form-group">
            <label for="quantidade">17 - DIGITE ABAIXO AS SUGESTÕES</label>
            <textarea class="form-control"  id="story" name="sugestoes" rows="5" cols="33"></textarea>
        </div>

        <div class="form-group">
          <label for="quantidade">18 - COLOQUE EM ANEXO UMA IMAGEM COM O NOME DA SUA AGENCIA</label>
      </div>
     <b> <small>A IMAGEM DEVE POSSUIR A ESTRUTURA DE CABEAMENTO DO COMPUTADOR, IMPRESSORA, INTERNET</small></b>
      <input type="file" name="image">

 
        
 <br> 
        <div style="text-align: center;">
        <button style="text-align: center; padding-right: 18%; padding-left: 18%;" type="submit" class="btn btn-success">Enviar Formulário</button>
    </div>
  </div>
 
     
      </form>
</div>
</div>



@endsection

@endif
@endsection
