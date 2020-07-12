<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Histórico</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Styles -->
        <style>
        * {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #286090;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
  color:white;
}



.header a.active {
  /* background-color: #286090; */
  color: white;
}

.header-right {
  float: right;
}


@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
  
}
            
        </style>
        <script>
  
  </script>
    </head>
    <body>
            <div class="header">
                <a  class="logo">Histórico de compras</a>
                <div class="header-right">
                    
                    <a class="active"  href="{{route('homepage')}}">Início</a>
                    <a  class="active" href="{{route('login.sair')}}">Sair</a>
                    
                </div>
            </div>
            <div style="padding-left:40px;padding-right:40px;">
            <div class="container">
                <h2></h2>
                <ul class="list-group">
                    
                    @foreach($compras as $compra)
                          <a data-toggle="collapse" style="background-color: #286090;color:white;margin-top:1%" href="#{{$compra['id']}}" class="list-group-item">
                          
                          <h4>Pedido #{{$compra['id']}} - {{$compra['dataCompra']}}</h4>
                          Total: R$ {{$compra['pagamento']['valor']}},00
                          
                          
                          </a>
                          <div class="collapse" id="{{$compra['id']}}" style="border-left:1px solid #286090;border-right:1px solid #286090;border-bottom:1px solid #286090;">
                                <div class="card card-body" style="padding:3%;">                                  
                                    <table style="width:100%">
                                      <tr>
                                        <td style="width:60%;">
                                            <h4><strong>Transportadora:</strong> {{$compra['transportadora']['nome']}}</h4>
                                            <h4><strong>Código de Rastreio:</strong> {{$compra['codRastreio']}}</h4>
                                            <h4><strong>Forma de Pagamento:</strong> {{$compra['tipoPagamento']['nome']}}</h4>
                                            <h4><strong>Endereço de Entrega:</strong> {{$compra['endereco']['descricao']}}</h4>
                                        </td>
                                        <td>
                                          <ul class="list-group">

                                              <p style="text-align:center"><strong>Lista de produtos</strong></p>
                                                    @foreach($compra['produtos'] as $produto)
                                                    <li class="list-group-item">
                                                    <h5>{{$produto['produto']['nome']}} - {{$produto['quantidade']}} {{$produto['quantidade']>1?'unidades':'unidade'}} R${{$produto['valor']}},00</h5>
                                                    </li>
                                                    @endforeach

                                          </ul>
                                          <h5><strong>Valor total dos produtos:</strong> R$ {{$compra['pagamento']['valor'] - $compra['transportadora']['valor']}},00</h5>
                                          <h5><strong>Valor do frete:</strong>  R$ {{$compra['transportadora']['valor']}},00</h5>
                                          <h3><strong>Valor Final: R$ {{$compra['pagamento']['valor']}},00</strong></h3>
                                        </td>
                                      </tr>
                                    </table>
                                  
                                </div>
                          </div>
                    @endforeach

                </ul>
            </div>
            </div>
    </body>
   
</html>
