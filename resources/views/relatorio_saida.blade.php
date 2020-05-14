<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorio</title>
</head>
<body>
    </table>
</div>
</div>
</div>

<div class="col-sm-6">
<div class="card">
<div class="card-body">
    <div>
        <h3>Ultimas Saídas</h3>
        <h5>Retirado pelo BOX IO</h5>
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
                <th scope="col">Descrição da Saída</th>
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
                <td>{{$listar->descricao_saida}}</td> 
                <td>{{$listar->name}}</td>   
                      
              </tr>
            </tbody>
            @endforeach
        
          
          </table>
</body>
</html>