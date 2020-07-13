<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Página Inicial</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
            @if(Session::get('codRastreio'))
                <div class="alert alert-success" style="margin-bottom:0px;padding:5px" role="alert">
                    
                     
                    <table style="width:100%">
                      <tr>
                        <td>
                            <strong>Sua compra foi efetuada com sucesso! Obrigado pela preferência!</strong>
                        </td>
                        <td>
                          <strong>Pedido:</strong> #{{Session::get('compra')}} <br>
                          <strong>Código de Rastreio:</strong> {{Session::get('codRastreio')}}
                        </td>
                        <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </td>
                      </tr>
                    </table>
                </div>
            @endif
            <div class="header">
                <a  class="logo">Bem-Vindo, {{Auth::user()->name}}</a>
                <div class="header-right">
                    <a class="active" href="{{route('carrinho')}}">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    <span class="badge" style="color:white;background-color:#F44336">{{Session::has('carrinho')?Session::get('carrinho')->quantidadeTotal:''}}</span>
                    </a>
                    <a class="active"  href="{{route('historico')}}">Histórico de Compras</a>
                    <a  class="active" href="{{route('login.sair')}}">Sair</a>
                    
                </div>
            </div>

            <div style="padding-left:40px;padding-right:40px;">
            <div class="container">
                <h2>Lista de Produtos</h2>
                <ul class="list-group">
                    
                    @foreach($lista as $produto)
                          <li class="list-group-item">
                          <article class="card card-product-list">
                                        <div class="card-body">
                                        <div class="row">
                                          <aside class="col-sm-2">
                                            <a  class="img-wrap"><img src="https://via.placeholder.com/180x180"></a>
                                          </aside> <!-- col.// -->
                                          <article class="col-sm-8">
                                              <h4  class="title mt-2 h4">{{$produto->nome}}</4>
                                              <div class="rating-wrap mb-3">
                                                
                                                <small class="label-rating text-muted">132 visualizações</small>
                                                <small class="label-rating text-success">
                                                  <i class="fa fa-clipboard-check"></i>  </small>
                                              </div> <!-- rating-wrap.// -->
                                              <p>Descrição do produto Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sed metus ac tortor convallis interdum eget eget turpis. Nam ac malesuada justo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc pharetra aliquam nisi, et lobortis sapien porta at. Ut quis ornare erat. Pellentesque placerat augue ac cursus maximus. Maecenas ullamcorper dui sit amet urna maximus dictum. Aliquam in arcu vitae orci laoreet semper. In ut dui a nibh tempor euismod.</p>

                                          </article> <!-- col.// -->
                                          <aside class="col-sm-2">
                                              <div class="price-wrap mt-2">
                                                <span class="price h4"> R$ {{$produto->valor}},00 </span>
                                                
                                              </div> <!-- info-price-detail // -->

                                              
                                              <br>
                                              <p>
                                                <a href="{{route('produtos.add',['id' =>$produto->id])}}" class="btn btn-primary">Adicionar ao carrinho</a>
                                                
                                              </p>
                                              
                                          </aside> <!-- col.// -->
                                        </div> <!-- row.// -->
                                        </div> <!-- card-body .// -->
                                    </article>
                          
                          </li>

                    @endforeach

                </ul>
            </div>
            </div>
            @include('sweet::alert')
    </body>
    @push('scripts')
<script>
  
</script>
@endpush
</html>
