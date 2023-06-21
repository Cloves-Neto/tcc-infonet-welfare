<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Registro </title>
    <link rel="stylesheet" href="./esqueci.css">
</head>
<body>

    <div class="granbox">
            <form action="./controleesqueceu.php" method="POST">
                <p>Recuperar acesso</p>

                <label for="email">
                    <input type="email" class="email_funcionario" id="email_funcionario" name="email_funcionario" placeholder="seuemail@email.com">
                    <small>Digite o email vinculado ao seu usuario</small>
                </label>
                <br>
                <input type="submit" value="enviar">
                
                <a href="http://localhost/welfare/">Já tem acesso? Acesse aqui sua conta</a>
            </form>
    </div>

<script src="../src/script.js"></script>
<script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>