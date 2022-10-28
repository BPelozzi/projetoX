<!DOCTYPE html>
<html lang="pt=br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">

    <!--JS & jQuery-->
    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="container">
        <div class="banner">
            <img src="img/login.png" alt="imagem-login">
            <!-- <p style="color: #fff; font-weight: 400;">
                Seja bem vindo, acesse e aproveite todo o conteúdo,
                <br>somos uma equipe de profissionais empenhados em
                <br>trazer o melhor conteúdo direcionado a você, usuário. 
            </p> -->
        </div>

        <div class="box-login">
            <h1>
                Olz!<br>
            </h1>
<form action="teste_login.php" method="POST">
            <div class="box">
                <h2>faca o seu login agora</h2>

                <input type="text" name="email" id="email" placeholder="Email">
                <input type="password" name="senha" id="senha" placeholder="Senha">
                
                <!-- <a href="password.html">
                    <p>Esqueceu a sua senha?</p>
                </a> -->

                <input type="submit" name="enviar_login" id="enviar_login">
                
                <a href="account.html">
                    <p>Criar uma conta</p>
                </a> 
</form>
            </div>
        </div>
    </div>
</body>
</html>