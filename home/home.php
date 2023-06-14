<?php
session_start(); // Inicia a sessão

include_once "../conexao.php";

// Verifica se o usuário está logado e recupera o nome
if (isset($_SESSION['email_funcionario'])) {
    $email_funcionario = $_SESSION['email_funcionario'];
    
    // Consulta o banco de dados para obter o nome do funcionário com base no email
    $query = "SELECT nome_funcionario FROM funcionario WHERE email_funcionario = :email";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':email', $email_funcionario);
    $stmt->execute();
    
    // Verifica se encontrou um funcionário com o email fornecido
    if ($stmt->rowCount() > 0) {
        $dados_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome_funcionario = $dados_funcionario['nome_funcionario'];
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
    <link rel="stylesheet" href="../home/homestyle/home-style.css">
    <meta charset="UTF-8">
  </head>
  <body>
    
      <!-- Container que limita o tamanho máximo do conteudo do site -->
      <div class="granbox">
      <aside class="menu">
            <nav>
            <div class="user-profile">
                <a href="../img/editar_foto.php" class="user-img" aria-label="area de informaçãoes do usuario">
                    <img src="../assets/user.png" alt="imagem de usuario">
                </a>
            </div>
            <ul>
                 <li>
                    <a href="../home/home.php">Início</a>
                </li>
                <li>
                    <a href="../home/cad/cadastrarpac.php">Paciente</a>
                </li>
                <li>
                    <a href="../agenda/agenda.php">Agenda</a>
                </li>
                <!-- <li>
                    <a href="../financeiro/financeiro.php">Financeiro</a>
                </li>
                <li>
                    <a href="../relatorio/relatorio.php">Relatório</a>
                </li> -->
                <li>
                    <a href="../index.php">
                        <ion-icon name="exit-outline" style="color: white; "></ion-icon>
                    </a>
                </li>
            </ul>
            </nav>
        </aside>
        <section class="infosite">
            <!-- Header -->
            <header class="infoheader">
                <!-- Banner de mensagens -->
                <h1 class="mensagem-usuario">Olá, seja bem-vindo <?php echo $nome_funcionario ?></h1>

                    <div class="banner">
                        <!-- Lista de mensagens -->
                        <div id="carouselExampleAutoplaying" class="carousel slide msgSlide" data-bs-ride="carousel">
                            <div class="carousel-inner msgContainer" id="msgContainer">
                                <div class="carousel-item active msgCard slidePrincipal">
                                </div>

                                <div class="carousel-item msgCard slidePrincipal">
                                </div>

                               
              </header>
              <!-- Conteudo principal da página -->
              <main>
                <!-- Lista de ramal dos funcionarios -->

              </main>
        </section>
      </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>


?>