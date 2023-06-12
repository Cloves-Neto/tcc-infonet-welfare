<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../home/homestyle/home-adm-style.css">

</head>
<body>
        <!-- Div que limita o tamanho do conteúdo -->
        <div class="granbox">
        <!-- Menu lateral do sistema (Home adm) -->
        <aside class="menu">
            <nav>

                <div class="user-profile">
                    <a href="#" class="user-img" aria-label="area de informaçãoes do usuario">
                        <img src="../assets/user.png" alt="imagem de usuario">
                    </a>
                </div>

                <ul>
                    <li>
                        <ion-icon name="person-outline"></ion-icon>
                        <a href="../cadastro/cadastrarpac.php">Paciente</a>
                    </li>

                    <li>
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <a href="../agenda/agenda.php">Agenda</a>
                    </li>

                    <li>
                        <ion-icon name="cash-outline"></ion-icon>
                        <a href="../financeiro/financeiro.php">Financeiro</a>
                    </li>

                    <li>
                        <ion-icon name="document-text-outline"></ion-icon>
                        <a href="../relatorio/relatorio.php">Relatório</a>
                    </li>
                </ul>
                
                <a class="sair" href="#">
                    <ion-icon name="exit-outline" style="color: white; "></ion-icon>
                </a>
            </nav>
        </aside>
    <div class="container">
        <header>
            <h2>Mensagem</h2>
        </header>
        <form action="salva-mensagem.php" method="POST">
            <textarea name="txtmensagem" id="txtmensagem" cols="30" rows="10" max="260" min="15" class="txtmensagem">

            </textarea>
            <br>
            <input type="submit" value="salvar" id="salvar" name="salvar">
        </form>
        
        <section class="exibe" id="exibe" name="exibe">
                
                <?php
                    require "../conexao.php";

                    $query = "SELECT * FROM mensagem ORDER BY id_msg";

                    $buscarDados = $conexao->query($query);

                    $buscarDados->execute();

                    while($usuario = $buscarDados->fetch(PDO::FETCH_ASSOC)){
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