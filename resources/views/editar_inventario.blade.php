@extends('layouts.template')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title">Visualizar Inventário Cadastrado da {{$editar->Nome_Agencia}}</h3>
        </div><!-- /.box-header -->
<form role="form" action="{{route('cadastrar_inventario.edit', $editar->idInventario_Agencia)}}" method="post">
            <div class="box-body">
                @csrf
                @method('PUT')
        <label for="quantidade">ESCOLHA SUA AGENCIA *</label>
        <select name='idAgencia' class="form-control form-control-lg">
        <option value='{{$editar->idAgencia}}'>{{$editar->Nome_Agencia}}</option> 
        </select >
        <br>
        <div class="form-group col-md-12">
          <div class="form-group">
            <label>CNPJ:</label>
            <input name="CNPJ" class="form-control"  type="number" id="CNPJ" value="{{$editar->CNPJ}}" min="1" max="14">
          </div>
        </div>
          <br>
        
        <div class="form-group col-md-6">
        <div class="form-group">
          <label for="quantidade">HORÁRIO DE FUNCIONAMENTO *</label>
          <p>Início do expediente</p>
          <input type="text" class="form-control" name="Inicio_Exp" placeholder="" value="{{$editar->Inicio_Exp}}">
     </div> 
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label for="quantidade">-</label>
        <p>Final do expediente</p>
        <input type="text" class="form-control" name="Fim_Exp" placeholder="" value="{{$editar->Fim_Exp}}">
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
        <input name="cep" class="form-control"  type="text" id="cep"  value="{{$editar->cep}}" size="10" maxlength="9" /></label><br />
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>RUA:
        <input name="rua" class="form-control"  type="text" id="rua"  size="60" value="{{$editar->rua}}"/></label><br />
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>BAIRRO:
        <input name="bairro" class="form-control"  type="text"  id="bairro"  size="40" value="{{$editar->bairro}}"/></label><br />
      </div>
    </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <label>CIDADE:
        <input name="cidade" class="form-control"  type="text" id="cidade"  size="40" value="{{$editar->cidade}}"/></label><br />
      </div>
    </div>
    <div class="form-group col-md-12">
      <div class="form-group">
        <label>ESTADO:
        <input name="uf" class="form-control"  type="text" id="uf"  size="2" value="{{$editar->uf}}"/></label><br />    
      </div>
    </div>  

    </html>

  <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 2: INFORMAÇÕES SOBRE O AGENTE</h3></div>

    <div class="form-group">
                <label for="quantidade">DIGITE SEU NOME COMPLETO (RESPONSÁVEL) *</label>
                <input type="text" class="form-control" name="Nome_Responsavel" placeholder="" value="{{$editar->Nome_Responsavel}}">
        </div>

   
        <div class="form-group">
          <label for="quantidade">NÚMERO DE TELEFONE PARA CONTATO *</label>
                <input type="text" class="form-control" name="Tel_Responsavel" placeholder="" value="{{$editar->Tel_Responsavel}}">
        </div>
        <div class="form-group">
                <label for="quantidade">QUANTIDADE DE AGENTES *</label>
                <input type="number" class="form-control" name="Qtde_Agentes" placeholder="" value="{{$editar->Qtde_Agentes}}">
        </div>


        <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 3: EQUIPAMENTOS</h3></div>

          <div class="form-group">
            <label for="quantidade">QUANTIDADE DE COMPUTADORES *</label>
            <input type="number" class="form-control" name="Qtde_Computadores" placeholder="" value="{{$editar->Qtde_Computadores}}">
        </div>

        <div class="form-group">
          <label for="Config_pc">CONFIGIRAÇÕES DOS COMPUTADORES (OPCIONAL)</label>
          <input type="text" class="form-control" name="Config_pc" placeholder="" value="{{$editar->Config_pc}}">
      </div>

          <div class="form-group">
            <label for="quantidade">QUANTIDADE DE IMPRESSORAS DE MAPAS *</label>
            <input type="number" class="form-control" name="Qtde_Mapas" placeholder="" value="{{$editar->Qtde_Mapas}}">
        </div>

        <div class="form-group">
          <label for="Modelo_Impressora">MODELO DA IMPRESSORA (OPCIONAL)</label>
          <input type="text" class="form-control" name="Modelo_Impressora" placeholder="" value="{{$editar->Modelo_Impressora}}">
      </div>

          <div class="form-group">
            <label for="quantidade">QUANTIDADE DE IMPRESSORAS DE PASSAGEM *</label>
            <input type="number" class="form-control" name="Qtde_bpe" placeholder="" value="{{$editar->Qtde_bpe}}">
        </div>

            <div class="form-group">
              <label for="quantidade">QUANTIDADE DE PINPAD (MÁQUINA DE CARTÃO) *</label>
              <input type="number" class="form-control" name="Qtde_pinpad" placeholder="" value="{{$editar->Qtde_pinpad}}">
          </div>
          <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 4: INTERNET</h3></div>
          <div class="form-group">
            <label for="quantidade">QUANTIDADE DE PROVEDORES DE INTERNT *</label>
            <input type="number" class="form-control" name="Qtde_internet" placeholder="" value="{{$editar->Qtde_internet}}">
        </div>

        <div class="form-group">
          <label for="quantidade">NOME DO PROVEDOR 1: *</label>
          <input type="text" class="form-control" name="Nome_provedor1" placeholder="" value="{{$editar->Nome_provedor1}}">
      </div>

      <div class="form-group">
        <label for="quantidade">VALOR DO PROVEDOR 1: *</label>
        <input type="text" class="form-control" name="Valor_provedor1" placeholder="" value="{{$editar->Valor_provedor1}}">
    </div>

          <div class="form-group">
            <label for="quantidade">VELOCIDADE DA INTERNET (QUANTOS MEGAS) DO PROVEDOR: 1 *</label>
            <input type="number" class="form-control" name="Velocidade_provedor1" placeholder="" value="{{$editar->Velocidade_provedor1}}">
        </div>

        
        <div class="form-group">
          <label for="quantidade">NOME DO PROVEDOR 2: </label>
          <input type="text" class="form-control" name="Nome_provedor2" placeholder="" value="{{$editar->Nome_provedor2}}">
      </div>

      <div class="form-group">
        <label for="quantidade">VALOR DO PROVEDOR 2: </label>
        <input type="text" class="form-control" name="Valor_provedor2" placeholder="" value="{{$editar->Valor_provedor2}}">
    </div>

          <div class="form-group">
            <label for="quantidade">VELOCIDADE DA INTERNET (QUANTOS MEGAS) DO PROVEDOR: 2</label>
            <input type="number" class="form-control" name="Velocidade_provedor2" placeholder="" value="{{$editar->Velocidade_provedor2}}">
        </div>

        <div style="text-align: center;"> <h3 style="color:brown">SESSÃO 5: SUGESTÕES PARA MELHORIA</h3></div>
          <div class="form-group">
            <label for="quantidade">DIGITE ABAIXO AS SUGESTÕES</label>
            <textarea class="form-control"  id="story" name="sugestoes" rows="5" cols="33" >{{$editar->sugestoes}}</textarea>
        </div>

    

 
        
 <br> 
        <div style="text-align: center;">
        <button style="text-align: center; padding-right: 18%; padding-left: 18%;" type="submit" class="btn btn-primary">Enviar Formulário</button>
    </div>
  </div>
      </form>
            </div>
            </div>
@endsection