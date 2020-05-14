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
        <h3>Wifi - Bus</h3>
        <h5>Retirado pelo BOX IO</h5>
        <br>
      </div>

  
    <table  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Numero do Onibus</th>
                <th scope="col">Tipo do Onibus</th>
                <th scope="col">Empresa</th>
                <th scope="col">Linha</th>
                <th scope="col">Roteador</th>           
              </tr>
            </thead>
            @foreach ($controle as $listar)
            <tbody>
              <tr>
                <th scope="row">{{$listar->idWifi_Onibus}}</th>
                <td>{{$listar->Numero_Onibus}}</td>
                <td>{{$listar->Tipo_Bus}}</td>
                <td>{{$listar->Empresa}}</td>
                <td>{{$listar->Linha}} / {{$listar->Chip}}</td> 
                <td>{{$listar->SSID_Roteador}}</td>   
                      
              </tr>
            </tbody>
            @endforeach
        
          
          </table>
</body>
</html>