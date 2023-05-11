
<!-- session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email_funcionario'])) {
  // Se não estiver logado, redireciona o usuário para a página de login
  header('Location: index.php');
  exit;
} -->

<?php

    // Buscando nome do funcionario Logado no Db (criar lógica para buscar o logado, pois nesse exemplo esta pegando apenas a primeira linha)
    $conn = mysqli_connect('localhost', 'root', '', 'sistema_welfare');
    $sqlSelect = "SELECT * FROM funcionario";
    $result = $conn->query($sqlSelect);
    $user_data = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="home-adm-style.css">


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
                    <a href="../mensagem/mensagem.php">Mensagem</a>
                </li>
                <li>
                    <a href="../cadastro/cadastro.php">Paciente</a>
                </li>
                
                <li>
                    <a href="../especialidade/especialidade.php">Especialidade</a>
                </li>
                
                <li>
                    <a href="../cargo/cargo.php">Cargo</a>
                </li>
                <li>
                    <a href="../registro/registro.html">Funcionario</a>
                </li>
                <li>
                    <a href="../agenda/agenda.php">Agenda</a>
                </li>
                <li>
                    <a href="../financeiro/financeiro.php">Financeiro</a>
                </li>
                <li>
                    <a href="../relatorio/relatorio.php">Relatório</a>
                </li>
              </ul>
            </nav>
        </aside>
        <!-- Conteudo principal da página -->
        <section class="infosite">
            <!-- Header -->
              <header class="infoheader">
                <!-- Banner de mensagens -->
                    <h1 class="mensagem-usuario">Olá, seja bem-vindo <span id="nomeUsuario"><?php echo $user_data['nome_funcionario'];?></span></h1>
                       
                    <div class="banner">
                        <!-- Lista de mensagens -->
                        <div id="carouselExampleSlidesOnly" class="carousel slide msgSlide" data-bs-ride="carousel">
                            <div class="carousel-inner msgContainer">
                              <div class="carousel-item active msgCard">
                                <p >Texto 1</p>
                              </div>
                              <div class="carousel-item msgCard">
                                <p >Texto 2</p>
                              </div>
                              <div class="carousel-item msgCard">
                                <p>Texto 3</p>
                              </div>
                            </div>
                            <!-- Indicador de slide -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                              </div>
                        </div>
                        <!-- Ilustração -->
                        <figure class="figura">
                            <img src="" alt="imagem ilustrativa">
                            <figcaption class="none">imagem ilustrativa</figcaption>
                        </figure>
                    </div>
              </header>
            <!-- Conteudo principal da página -->
              <main class="infomain">
                <!-- Lista de ramal dos funcionarios -->
                    <section class="lista">
                        <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'sistema_welfare');
                            $sqlSelect = "SELECT * FROM funcionario";
                            $result = $conn->query($sqlSelect);
                            $user_data = mysqli_fetch_assoc($result);
                            while($user_data = mysqli_fetch_assoc($result))
                            {
                                echo "
                                    <div class='linha'>
                                    <aside class='perfil'>
                                        <img src='../assets/user.png' alt='imagem perfil'>
                                    </aside>
                                    <section class='indice'>
                                        <p class='nome'>".$user_data['nome_funcionario']."</p>
                                        <small class='email'><span>email: </span>".$user_data['email_funcionario']."</small> 
                                        <br>
                                        <small class='ramal'><span>ramal: </span>".$user_data['id_funcionario']."</small>
                                    </section>
                                </div>";
                            }
                        ?>
                        <div class="linha">
                            <aside class="perfil">
                                <img src="../assets/user.png" alt="imagem perfil">
                            </aside>
                            <section class="indice">
                                <p class="nome">André Fonseca</p>
                                <small class="email"><span>email: </span> andre.f@email.com</small> 
                                <br>
                                <small class="ramal"><span>ramal: </span> 1023</small>
                            </section>
                        </div>
                    </section>
                <!-- Area dos botões informativos -->
                    <section class="btns">
                        <div class="card">user <br><span>15</span></div>
                        <div class="card">vendas <br><span>20</span></div>
                        <div class="card">total <br><span>R$ 13,283</span></div>
                    </section>
              </main>
        </section>
      </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>