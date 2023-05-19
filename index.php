

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
    <link rel="stylesheet" href="./src/style.css">
    <style>
        .doc-acompanhamento{
            background-color: white;
            width: 50px;
            height: 50px;
            border-radius: 50px;
            justify-content: center;
            align-items: center;
            padding: 12px;
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
        .doc-acompanhamento svg{
            width: 100%;
            height: 100%;
            color: #51BEAB;
        }

       
        
    </style>
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
                    <a class="login_link" href="../welfare1.1/esqueci-a-senha/esqueci.php">Esqueceu a senha?</a></small>
            </div>
            <!-- Conteúdo inferior do formulario | Submit e Registrar nova conta -->
            <div class="wrapper  submit_container">
                <!-- Botão de enviar o formulario | Submit --> 
                <input type="submit" class="login_button" value="Entrar" id="entrar" name="entrar" onclick="entrar()" disabled> <br><br>
                
                <a href="docu.doc" class="doc-acompanhamento">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="16" height="16" fill="currentColor" class="bi bi-file-earmark-code-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.646 7.646a.5.5 0 1 1 .708.708L5.707 10l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0 2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 10 8.646 8.354a.5.5 0 1 1 .708-.708z"/>
                    </svg>
                </a>
                    
            </div>

        </form>


        <!-- Seção-Direita | contém a imagem do Login -->
        <section class="wallpaper  secao-direita">
        </section>
    </main>   


<script src="./src/script.js"></script>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
$(document).ready(function() {
    $('#login').submit(function(event) {
        event.preventDefault(); // Evita o envio tradicional do formulário
        var dados = $(this).serialize();
        
        $.ajax({
            method: 'post',
            url: 'logincontrole.php',
            data: dados,
            beforeSend: function() {
                $("h2").html("Processo em andamento.");
            }
        })
        .done(function(msg) {
            $("h2").html("Retorno do login...");
            $("#resposta").html(msg);
            alert("Login válido");
        })
        .fail(function() {
            alert("Falha ao acessar, tente novamente");
        });
    });
});

</script>
</body>


</html>

