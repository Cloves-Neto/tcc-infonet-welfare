<?php

$token = $_GET['token'];
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir senha</title>
    <style>
        @import url(../var.css);
        @import url(../reset.css);
        
        body{
            width: 100vw;
            height: 100vh;
            background-color: var(--corPrincipal);
        }
        .granbox{
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        h1{
            display: inline-block;
            width: 450px;
            text-align: start;
            color:  white;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 15px;
        }
        .redefine_form{
            width: 450px;
            height: 600px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            padding: 15px;
            gap: 10px;
        }
        .redefine_form label{
            width: 90%;
            display: flex;;
            flex-direction: column;
            margin-bottom: 60px;
            height: 20px;
            color: var(--corPrincipal);
            font-size: 1.2rem;
            font-weight: 600;
            position: relative;
            gap: 10px;

        }
        .redefine_form label:nth-child(1){
            margin-top: 20px;
        }
        .redefine_form label input{
            width: 100%;
            height: 30px;
            border: none;
            text-align: start;
            padding: 10px;
            color: var(--corPrincipal);
            font-size: 1.2rem;
            border-bottom: solid 2px var(--corPrincipal);
            outline: none;
        }
        .redefine_form input[type="submit"]{
            width: 230px;
            height: 60px;
            background-color: rgb(201, 201, 201);
            color: grey;
            font-size: 1.2rem;
            letter-spacing: 2px;
            text-align: center;
            text-transform: uppercase;
            border: none;
            outline: none;
            border-radius: 100px;
            margin-top: 25px;
            transition: .1s ease-in-out background;
        }
        .redefine_form input[type="submit"]:hover{
            background-color: var(--corSecundaria);
            color: white;
            transition: .1s ease-in-out background;
        }

    </style>
</head>
<body>
    <div class="granbox">
            <h1>Redefinir senha</h1>
            <form class="redefine_form" action="./redefinirsenha.php">
                <label for="token_recieve">
                    Código de redefinição:
                    <input type="text" class="token_recieve" name="token_recieve" id="token_recieve" value="<?php echo $token; ?>">
                </label>

                <label for="token_recieve">
                    Identificação funcionario
                    <input type="text" class="id_funcionario" name="id_funcionario" id="id_funcionario" value="<?php echo $id; ?>">
                </label>

                <label for="token_recieve">
                    Digite a nova senha:
                    <input type="text" class="nova_senha" name="nova_senha" id="nova_senha">
                </label>

                <label for="token_recieve">
                    Confirme a nova senha:
                    <input type="text" class="cnova_senha" name="cnova_senha" id="cnova_senha">
                </label>

                <input type="submit">
            </form>
    </div>
</body>

</html>