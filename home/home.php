<?php
    // session_start();
    // if((!isset($_SESSION['email_funcionario']) == true) and (!isset($_SESSION['senha_funcionario']) == true))
    // {
    //     unset($_SESSION['email_funcionario']);
    //     unset($_SESSION['senha_funcionario']);
    //     header('Location: login.php');
    // }
    // $logado = $_SESSION['email_funcionario'];
?> 

<!-- HOME RECEPÇÃO -->

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="home-style.css">
    <meta charset="UTF-8">
  </head>
  <body>
    
      <!-- CXontainer que limita o tamanho máximo do conteudo do site -->
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
              texto
        </section>
      </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>


