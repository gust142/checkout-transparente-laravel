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

                .header a:hover {
                    background-color: #ddd;
                    color: black;
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
                <a href="#default" class="logo">Carrinho</a>
                <div class="header-right">
                    </a>
                    <a class="active"  href="{{route('produtos')}}">Inicio</a>
                    <a class="active"  href="#home">Sair</a>
                    
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
                          R$ {{$produto['valor']}},00
                         
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
                          
                          <button type="button" class="btn btn-success btn-lg btn-block" > 
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                Checkout
                          </button>
                         
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
