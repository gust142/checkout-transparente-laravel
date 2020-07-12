<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Carrinho</title>

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
                color: black;
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
                .btn-circle {
                    width: 30px;
                    height: 30px;
                    text-align: center;
                    padding: 6px 0;
                    font-size: 12px;
                    line-height: 1.428571429;
                    border-radius: 15px;
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

    </head>
    <body>
            <div class="header">
                <a  class="logo">Carrinho</a>
                <div class="header-right">
                    </a>
                    <a class="active"  href="{{route('homepage')}}">Continuar comprando</a>
                    <a class="active"  href="{{route('login.sair')}}">Sair</a>
                    
                </div>
            </div>
            @if(Session::has('carrinho'))
            <div class="container">
                <h2></h2>
                <ul class="list-group">
                    
                    @foreach($produtos as $produto)
                          
                          <li class="list-group-item">
                          <h4 style="position:absolute; right:3%">Quantidade: {{$produto['qtd']}} {{$produto['qtd']>1?'unidades':'unidade'}}</h4>
                          <h4>{{$produto['item']['nome']}}</h4> 
                            <table style="width:100%;">
                                <tr>
                                <td style="width:65%;"> <h4 style="">R$ {{$produto['valor']}},00</h4></td>
                                    <td style="width:4%;">
                                        <a  class="btn btn-circle btn-success" href="{{route('carrinho.add',$produto['item']['id'])}}" > 
                                            <i class="glyphicon glyphicon-plus"></i>
                                        </a>
                                    </td>
                                    <td style="width:3%;">
                                        <h4 style="">{{$produto['qtd']}}<h4>
                                    </td>
                                    <td style="width:10%;">
                                        <a  style="background-color: #286090; color:white" class="btn btn-circle" href="{{route('carrinho.remove',$produto['item']['id'])}}" > 
                                            <i class="glyphicon glyphicon-minus"></i>
                                        </a>
                                    </td>
                                    <td style="width:5%;">
                                        <a  class="btn btn-danger " href="{{route('carrinho.removeItem',$produto['item']['id'])}}" > 
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                          </li>

                    @endforeach
                    <li class="list-group-item">
                        <h2>Total: R${{$valorTotal}},00</h2>
                    </li>
                </ul>
            </div>
            <div>
            
            <div class="container">
                <h2></h2>
                <ul class="list-group">
                          <li class="list-group-item">
                          
                          <a  class="btn btn-success btn-lg btn-block" href="{{route('checkout')}}" > 
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                Checkout
                          </a>
                         
                          </li>
                </ul>
            </div>
            </div>
            @else
            <div class="container">
                <h2></h2>
                <ul class="list-group">
                          <li class="list-group-item">
                          
                          <h2>Não há itens no carrinho</h2>
                         
                          </li>
                </ul>
            </div>
            @endif
            
    </body>

</html>
