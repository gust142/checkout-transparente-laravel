<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            
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
                    button:hover {
                        opacity: 0.8;
                    }
                    .container {
                        padding-top: 12%;  
                        padding-left: 30%;  
                        padding-right: 30%;  
                    }
                    input[type=text], input[type=password] {
                        width: 100%;
                        padding: 12px 20px;
                        margin: 8px 0;
                        display: inline-block;
                        border: 1px solid #ccc;
                        box-sizing: border-box;
                    }
                    button {
                            background-color: #286090;
                            color: white;
                            padding: 14px 20px;
                            margin: 8px 0;
                            border: none;
                            cursor: pointer;
                            width:100%;
                    }
                    
            
        </style>
    </head>
    <body>
            <div class="header">
                <a class="logo">Iniciar Sessão</a>
                
            </div>
            <form action="{{route('login.entrar')}}" method="post">
                    {{csrf_field() }}

                    <div class="container">
                        <label for="uname"><b>Email</b></label>
                        <input type="text" placeholder="Email" name="email" required>

                        <label for="psw"><b>Senha</b></label>
                        <input type="password" placeholder="Senha" name="password" required>

                        <button >Entrar</button>
                        <button type="button" class="cancelbtn">Cadastre-se</button>
                        <label>
                        <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
                        </label>
                    </div>

            </form>
        
    </body>
</html>
