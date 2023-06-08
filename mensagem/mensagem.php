<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM | MENSAGEM</title>
    <style>
        html, body{
            width: 100vw;
            height: 100vh;
            background-color: aliceblue;
            overflow: hidden;
        }
        .container{
            width: 100%;
            max-width: 1440px;
            height: 100%;
            display: flex;
            margin: auto;
        }
        form{
            width: 50%;
            height: 100%;
            display: inline-block;
            background-color: green;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="salva-mensagem.php" method="POST">
            <textarea name="txtmensagem" id="txtmensagem" cols="30" rows="10" max="260" min="15" class="txtmensagem">

            </textarea>
            <br>
            <input type="submit" value="salvar" id="salvar" name="salvar">
        </form>
        
        <section class="exibe" id="exibe" name="exibe">
                
                <?php

                    include_once('../conexao.php');
                
                    $bd = new ConexaoBd();
                    $pdo = $bd->getconexao();
                    $query = "SELECT * FROM salvamsg ORDER BY id_msg";
                    
                    $buscarusuario = $pdo->prepare($query);
                    $buscarusuario->execute();

                    while($usuario = $buscarusuario->fetch(PDO::FETCH_ASSOC)){
                    echo '
                    <div class="linha-exibe">
                        <p class="dados-exibe">'.
                            $usuario["msg"]
                        .'</p>
                        <a href="./exclui-mensagem.php?id='.$usuario["id_msg"].'" id="apagar" name="apagar" class="apagar">EXCLUIR</a>
                    </div>
                    <br>
                    ';
                    }
                ?>
            
        </section>
        
    </div>
</body>
</html>