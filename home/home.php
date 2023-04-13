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
                <ion-icon name="person-outline"></ion-icon>
                  <span class="nome-menu none">
                      cadastro Paciente
                  </span>
              </a>
          </li>
          <li>
              <a class="link-menu" href="cadasto.php">
              <ion-icon name="pulse-outline"></ion-icon>
                  <span class="nome-menu none">
                      cadastro Médico
                  </span>
              </a>          
          </li>
          <li>
            <a class="link-menu" href="cadasto.php">
                 <ion-icon name="reader-outline"></ion-icon>
                  <span class="nome-menu none">
                      Relatório
                  </span>
              </a>
          </li>
          <li>
            <a class="link-menu" href="cadasto.php">
                 <ion-icon name="today-outline"></ion-icon>
                  <span class="nome-menu none">
                      Agenda
                  </span>
              </a>
          </li>
          <li>
            <a class="link-menu" href="cadasto.php">
                  
                  <span class="nome-menu none">
                      cadastro paciente
                  </span>
              </a>
          </li>
          <li>
            <a class="link-menu" href="cadasto.php">
                  
                  <span class="nome-menu none">
                      cadastro paciente
                  </span>
              </a>
          </li>

        </ul>
      </nav>
      <!-- Conteúdo principal -->
      <main class="principal">
        <!-- User content -->
        <header class="user-data">
            <div class="mensagem">
              <h2 id="titulo">   Bem vindo(a) Andressa!</h2>
            </div>
            <div class="area-usuario">
              <p><?php echo '' .$imgperfil;?></p>
              <span>
                <p>Nome: <?php echo '' .$usuario;?></p>
                <p>Cargo: <?php echo '' .$cargo;?></p>
                <a href="./sair.php">Sair</a>
              </span>
            </div>
        </header>
        <!-- Bd - info - data -->
        <div class="info-data">
          <div class="row1">
            <section class="card usuarios">
              <!-- titulo card -->
              <h3 class="titulo-info">usuarios</h3>
              <!-- cont-tabela -->
              <div class="info">
                <table >
                  <!-- CABEÇALHO DA TABELA -->
                  <thead>
                    <tr >   
                      <th>Hora</th>
                      <th>Paciente</th>
                      <th>Especialidade</th>
                      <th> </th>
                    </tr>
                  </thead>
                  <!-- CORPO DA TABELA ( INFORMAÇÕES DO BD)-->
                  <tbody >
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas" class=""><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </section>
            <section class="card agenda"><h3>agenda</h3></section>
          </div>
          <div class="row2">
            <section class="card consulta">
              <!-- titulo card -->
              <h3 class="titulo-info">consulta</h3>
              <!-- cont-tabela -->
              <div class="info">
                <table>
                  <!-- CABEÇALHO DA TABELA -->
                  <thead>
                    <tr>   
                      <th>Hora</th>
                      <th>Paciente</th>
                      <th>Especialidade</th>
                      <th> </th>
                    </tr>
                  </thead>
                  <!-- CORPO DA TABELA ( INFORMAÇÕES DO BD)-->
                  <tbody>
                  <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas" ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
            <section class="card exame">
              <!-- titulo card -->
              <h3 class="titulo-info">exame</h3>
              <!-- cont-tabela -->
              <div class="info">
                <table>
                  <!-- CABEÇALHO DA TABELA -->
                  <thead>
                    <tr>   
                      <th>Hora</th>
                      <th>Paciente</th>
                      <th>Especialidade</th>
                      <th> </th>
                    </tr>
                  </thead>
                  <!-- CORPO DA TABELA ( INFORMAÇÕES DO BD)-->
                  <tbody>
                  <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr><tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr><tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr><tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr><tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td>Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td >13:30</td>
                      <td >Andressa Moreira</td>
                      <td >Clinico Geral</td>
                      <td ><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td>13:30</td>
                      <td>Andressa Moreira</td>
                      <td>Clinico Geral</td>
                      <td><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td>13:30</td>
                      <td>Andressa Moreira</td>
                      <td>Clinico Geral</td>
                      <td><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td>13:30</td>
                      <td>Andressa Moreira</td>
                      <td>Clinico Geral</td>
                      <td><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td class="Bordatabelas">13:30</td>
                      <td class="Bordatabelas">Andressa Moreira</td>
                      <td class="Bordatabelas">Clinico Geral</td>
                      <td class="Bordatabelas"><button>ver+</button></td>
                    </tr>
                    <tr>
                      <td>13:30</td>
                      <td>Andressa Moreira</td>
                      <td>Clinico Geral</td>
                      <td><button>ver+</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </section>
            <section class="card cash"><h3>cash</h3></section>
          </div>
        </div>
      </main>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>


