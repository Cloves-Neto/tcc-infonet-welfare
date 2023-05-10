<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM | MENSAGEM</title>
</head>
<body>
    <div class="container">
        <form action="controle-mensagem.php" method="GET">
                <textarea id="mensagem" name="mensagem" rows="5" cols="30" placeholder="digite aqui a mensagem que deseja exibir!"></textarea> 
            <br>
            <button>Salvar</button>
        </form>
        <br>
        <br>
        <br>
        <div class="lista-de-mensagem">
            
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'sistema_welfare');
                $sqlSelect = "SELECT * FROM salvamsg";
                $result = $conn->query($sqlSelect);
                $lista_msg = mysqli_fetch_assoc($result);

                while($lista_msg = mysqli_fetch_assoc($result))
                {
                    echo "<div class='msg-contain'><p>".$lista_msg['msg']."</p>
                    <button onclick='excluir()'>Excluir</button></div>";
                        
                }
            ?>
                
        </div>
    </div>
</body>
</html>