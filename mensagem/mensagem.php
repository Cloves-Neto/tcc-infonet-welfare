<?php
session_start(); // Inicia a sessão

include_once "../conexao.php";

// Verifica se o usuário está logado e recupera o nome
if (isset($_SESSION['email_funcionario'])) {
    $email_funcionario = $_SESSION['email_funcionario'];

    // Consulta o banco de dados para obter o nome e a foto do funcionário com base no email
    $query = "SELECT nome_funcionario, foto_funcionario FROM funcionario WHERE email_funcionario = :email";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $email_funcionario);
    $stmt->execute();

    // Verifica se encontrou um funcionário com o email fornecido
    if ($stmt->rowCount() > 0) {
        $dados_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome_funcionario = $dados_funcionario['nome_funcionario'];
        $foto_funcionario = $dados_funcionario['foto_funcionario'];
    } else {
        // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
        header("Location: index.php");
        exit();
    }
} else {
    // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./mensagem.css">

</head>
<body>
        <!-- Div que limita o tamanho do conteúdo -->
    <div class="granbox">
        <!-- Menu lateral do sistema (Home adm) -->
        <aside class="menu">
            <nav>
            <div class="user-profile">
                <a href="../img/editar_foto.php" class="user-img" aria-label="área de informações do usuário">
                <?php if (!empty($foto_funcionario)) : ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($foto_funcionario); ?>" alt="Foto do funcionário">
                <?php endif; ?>
                </a>
            </div>


                <ul>
                    <li>
                        <ion-icon name="home-outline"></ion-icon>
                        <a href="../home/home-adm.php">Início</a>
                    </li>
                    <li>
                        <ion-icon name="megaphone-outline"></ion-icon>
                        <a href="../mensagem/mensagem.php">Mensagem</a>
                    </li>
                    <li>
                        <ion-icon name="person-add-outline"></ion-icon>
                        <a href="../cadastro/cadastrarpac.php">Paciente</a>
                    </li>
                    
                    <li>
                        <ion-icon name="pulse-outline"></ion-icon>
                        <a href="../especialidade/especialidade.php">Especialidade</a>
                    </li>
                    
                    <li>
                        <ion-icon name="alert-circle-outline"></ion-icon>
                        <a href="../cargo/cargo.php">Cargo</a>
                    </li>
                    <li>
                        <ion-icon name="duplicate-outline"></ion-icon>
                        <a href="../registro/registro.html">Funcionario</a>
                    </li>
                    <li>
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <a href="../agenda/agenda.php">Agenda</a>
                    </li>
                    <li>
                        <ion-icon name="bar-chart-outline"></ion-icon>
                        <a href="../financeiro/financeiro.php">Financeiro</a>
                    </li>
                    <li>
                        <ion-icon name="reader-outline"></ion-icon>
                        <a href="../relatorio/relatorio.php">Relatório</a>
                    </li>
                </ul>

                <a class="sair" href="../index.php">
                    <ion-icon name="exit-outline"></ion-icon>
                </a>
            </nav>
        </aside>
        <section class="infosite">
            <header>
                <h2 class="titulo-pagina">Mensagem</h2>
            </header>
            <main>
                <form action="salva-mensagem.php" method="POST">
                    <p>Digite aqui a mensagem <br> para aparecer no display</p>
                    <textarea style="resize: none" name="txtmensagem" id="txtmensagem" cols="60" rows="10" max="260" min="15" class="txtmensagem">

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
            </main>
        </section>    
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>