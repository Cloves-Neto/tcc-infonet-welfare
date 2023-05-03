<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email_funcionario'])) {
  // Se não estiver logado, redireciona o usuário para a página de login
  header('Location: index.php');
  exit;
}
?>

<!-- HOME RECEPÇÃO -->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="home-style.css">
    <meta charset="UTF-8">
  </head>
  <body>
    
      <!-- Container que limita o tamanho máximo do conteudo do site -->
      <div class="granbox">
        <aside class="menu">
            <nav>
              <div class="user-profile">
                  <a href="#" aria-label="area de informaçãoes do usuario">
                    <img class="img-perfil" src="../assets/user.png" alt="imagem de perfil do usuario">
                  </a>
              </div>
              <ul>
                <li>
                  <h2>Cadastro</h2>
                  <ul>
                        <!--   AREA DO ADMINISTRADOR
                    <li>
                      <a href="#">Cadastro Médico</a>
                    </li> -->
                    
                    <li>
                      <a href="#">Paciente</a>
                    </li>
                  <!--     AREA DO ADMINISTRADOR
                    <li>
                      <a href="#">Cadastro Especialidade</a>
                    </li> -->
                  </ul>
                </li>
                
                <li>
                  <h2>Dados</h2>
                  <ul>
                    <li>
                      <a href="#">Agenda</a>
                    </li>

                    <li>
                      <a href="#">Relatório</a>
                    </li>
                    
                    <li>
                      <a href="#">Financeiro</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <div class="exit">
                <a href="#">
                  <ion-icon name="exit-outline"></ion-icon>
                </a>
              </div>
            </nav>
        </aside>
        <section class="infosite">
            <!-- Header -->
              <header class="infoheader">
                <!-- Banner de mensagens -->
                    <div class="banner">
                        <!-- Lista de mensagens -->
                        <ul>
                            <li>
                                <p>Texto de exemplo mensagem</p>
                            </li>
                        </ul>
                        <!-- Ilustração -->
                        <figure class="figura">
                            <img src="" alt="imagem ilustrativa">
                            <figcaption class="none">imagem ilustrativa</figcaption>
                        </figure>
                    </div>
              </header>
              <!-- Conteudo principal da página -->
              <main>
                <!-- Lista de ramal dos funcionarios -->
                    <section class="lista"></section>
                <!-- Area dos botões informativos -->
                    <section class="btns"></section>
              </main>
        </section>
      </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>


