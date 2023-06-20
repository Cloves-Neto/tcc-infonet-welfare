<?php
session_start(); // Inicia a sessão

include_once "../conexao.php";

// Função de logout
function logout() {
    // Limpa todas as variáveis de sessão
    $_SESSION = array();

    // Destroi a sessão
    session_destroy();

    // Redireciona o usuário para a página de login
    header("Location: ");
    exit();
}

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
        // Realiza o logout se o funcionário não for encontrado
        logout();
    }
} else {
    // Realiza o logout se o usuário não estiver logado
    logout();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="../home/home-adm-style.css"><meta charset="UTF-8">
  </head>
  <body>
    
      <!-- Container que limita o tamanho máximo do conteudo do site -->
      <div class="granbox">
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
                    <a href="../home/home.php">Início</a>
                </li>
                <li>
                    <a href="../cadastro/cadastrarpac_rec.php">Paciente</a>
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
                   <a href="logout.php">
                       <ion-icon name="exit-outline" style="color: white;"></ion-icon>
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


