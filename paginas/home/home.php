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
    session_start();
    if((!isset($_SESSION['email_funcionario']) == true) and (!isset($_SESSION['senha_funcionario']) == true))
    {
        unset($_SESSION['email_funcionario']);
        unset($_SESSION['senha_funcionario']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email_funcionario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="home-style.css">
    <meta charset="UTF-8">
    <style>
      *{
        list-style: none;
      }
    </style>
  </head>
  <body>
    
    <div class="container">
    <!--Cabeçalho onde se encontra a tabela-->   
      <nav id="home-menu" class="home-menu" name="home-menu">
      <ul>
        <li>
            <a href="../cadastro/cadastro.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
              </svg>
            </a>
        </li>
        <li>
          
        </li>
        <li>
        </li>
      </ul>
      </nav>
      <main>
    <!-- User content -->
        <header>
            <div>

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
      </main>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>

