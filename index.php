<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./paginas/src/style.css">
</head>
<body>
    <main class="container">
        <!-- Seção-Esquerda | contém o formulário de Login-->
        <form class="login secao-esquerda" id="login" name="login" method="post" action="logincontrole.php" autocomplete="on">
            <!-- Conteúdo superior do formulario | dados da Sessão -->
            <div class="wrapper  interativo-container">
                <!-- Container-Título -->
                <div class="container_titulo">
                    <h1 class="login_titulo">Login</h1>
                </div>
                <!-- Container-Usuario -->
                <label class="container_usuario  login_label" for="email">
                    <span>Email</span>
                    <input class="input " type="text" name="email_funcionario" id="email_funcionario">
                </label>
                <!-- Container-Senha -->
                <label class="container_senha  login_label" for="senha">
                    <span>Senha</span>
                    <input class="input " type="password" name="senha_funcionario" id="senha_funcionario">
                </label>
                <small><div onclick="lembrar()" class="lembrar">Lembrar acesso<div class="btn-rounded" id="btn-rounded"></div></div>
                    <a class="login_link" href="./paginas/esqueci-a-senha/esqueci.html">Esqueceu a senha?</a></small>
            </div>
            <!-- Conteúdo inferior do formulario | Submit e Registrar nova conta -->
            <div class="wrapper  submit_container">
                <!-- Botão de enviar o formulario | Submit --> 
                <input type="submit" class="login_button" value="Entrar" disabled> <br><br>
                
                <button><a href="../welfare1.1/paginas/Doc.html">DOCUMENTO</a></button>
                    
                <!-- Link para registrar nova conta | Página de registro -->
                <a href="./paginas/registro/registro.html" class="login_link">Ainda não tem acesso? <span>Registre-se</span></a> 
            </div>
        </form>
        <!-- Seção-Direita | contém a imagem do Login -->
        <section class="wallpaper  secao-direita">
        </section>
    </main>   


<script src="./paginas/src/script.js"></script>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

