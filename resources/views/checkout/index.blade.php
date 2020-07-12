<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Checkout</title>

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
            border-bottom:1px solid white;
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
            input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            label {
            margin-bottom: 10px;
            display: block;
            }




            .header a.active {
            /* background-color: #286090; */
            color: white;
            }

            .header-right {
            float: right;
            }
            .left{
                background-color:#F2F2F2;
                width:70%;
                position:absolute;
                left:0%;
                padding:2%;
                height:calc(30vw + 30vh);
            }
            .right{
                width:30%;
                position:absolute;
                background-color:#286090;
                right:0%;
                height:calc(30vw + 30vh);
            }
            
            
            
        </style>
        <script>
            
        </script>
    </head>
    <body>
            @if (Session::has('carrinho'))
                <div class="header">
                        <a  class="logo">Checkout</a>
                        <div class="header-right">
                            <a class="active" href="{{route('homepage')}}">
                            Voltar às compras 
                            </a>
                            
                            <a  class="active" href="{{route('login.sair')}}">Sair</a>
                            
                        </div>
                </div>
                <div>
                    
                        <form action="{{route('finalizar')}}" method="post">
                        {{csrf_field() }}
                            <div class="left">
                                <div class="col-50">
                                    <h3></h3>
                                    <label for="fname"><i class="fa fa-user"></i>Endereço</label>
                                    <input type="text" id="fname" name="endereco" required placeholder="Endereço">
                                    
                                </div>
                                <div class="col-50">
                                    <h3></h3>
                                    <label for="fname"><i class="fa fa-user"></i>Selecione a Forma de Pagamento</label>
                                    <select name="pagamentoId" class="form-control">
                                        
                                        @foreach($pagamento as $pag)
                                        <option value="{{$pag->id}}">{{$pag->nome}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="col-50">
                                    <h3></h3>
                                    <label for="fname"><i class="fa fa-user"></i>Selecione a Transportadora</label>
                                    <select name="transportadoraId" class="form-control" >
                                        @foreach($transportadoras as $t)
                                            <option value="{{$t->id}}">{{$t->nome}} Valor do frete: R$ {{$t->valor}},00</option>
                                        @endforeach
                                    </select>
                                    
                                </div>

                                <label>
                               
                                </label>
                                
                                <button type="submit" class="btn btn-success btn-lg btn-block">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                    Finalizar Compra
                                </button>
                            </div>
                            <div class="right">
                                    <div>
                                            <h2 style="text-align:center;color:white">Carrinho</h2>
                                            <ul style="padding:2%">
                                                
                                                
                                                @foreach($produtos as $produto)
                                                        <li class="list-group-item">{{$produto['item']['nome']}}  - R${{$produto['valor']}},00 
                                                            <h5 style="position:absolute; right:6%; top:4%">{{$produto['qtd']}} {{$produto['qtd']>1?'unidades':'unidade'}}</h5>
                                                        </li>
                                                @endforeach
                                            </ul>
                                            <div>
                                            <h2 style="color:white;padding:2%;border-top:1px solid white">Total: R${{$valorTotal}},00</h2>
                                            </div>
                                    </div>
                            </div> 
                        </form>
                    
                    


                <div>
                
            @else
                
            @endif

            
    </body>

</html>
