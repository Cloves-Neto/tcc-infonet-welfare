<?php
$imgperfil = '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>'; 
$usuario = 'Andressa';
$cargo = 'Auxiliar Adm';
$data_hoje = date('d/m/Y');
?>

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

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="home-style.css">
    <meta charset="UTF-8">
  </head>
  <body>
    
    <div class="container">
      <!--Cabeçalho onde se encontra a tabela-->   
      <nav id="home-menu" class="home-menu" name="home-menu">
        <ul class="lista-menu">
          <li class="item-menu">
              <a class="link-menu" href="cadasto.php">
                  <svg class="icone-menu" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                  </svg>
                  <span class="nome-menu">
                      cadastro paciente
                  </span>
              </a>
          </li>
          <li>
              cadastro médico
          </li>
          <li>
              cadastro especialidade
          </li>
          <li>
              agenda
          </li>
          <li>
              financeiro
          </li>
          <li>
              relatório
          </li>

        </ul>
      </nav>
      <!-- Conteúdo principal -->
      <main class="principal">
        <!-- User content -->
        <header class="user-data">
            <div class="mensagem">
              <h2>Bem vindo(a) Andressa!</h2>
            </div>
            <details class="area-usuario">
              <summary>
                <p><?php echo '' .$imgperfil;?></p>
              </summary>
              <p>Nome: <?php echo '' .$usuario;?></p>
              <p>Cargo: <?php echo '' .$cargo;?></p>
              <a href="./sair.php">Sair</a>
            </details>
        </header>
        <!-- Bd - info - data -->
        <div class="info-data">
          <div class="row1">
            <section class="card usuarios"><h3>usuarios</h3></section>
            <section class="card agenda"><h3>agenda</h3></section>
          </div>
          <div class="row2">
            <section class="card consulta"><h3>consulta</h3></section>
            <section class="card exame"><h3>exame</h3></section>
            <section class="card cash"><h3>cash</h3></section>
          </div>
        </div>
      </main>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>


