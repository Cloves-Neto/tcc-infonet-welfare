<?php
    include_once('../home/home-controle.php'); 



?>
<!-- session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email_funcionario'])) {
// Se não estiver logado, redireciona o usuário para a página de login
header('Location: index.php');
exit;
} -->

<!-- $_SESSION['email_funcionario'] -->



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./homestyle/home-adm-style.css">


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
                    <h1 class="mensagem-usuario">Olá, seja bem-vindo <span id="nomeUsuario" name="nomeUsuario"><?php  echo $executaHome->buscaNome();?></span></h1>
                    
                    <div class="banner">
                        <!-- Lista de mensagens -->
                        <div id="carouselExampleAutoplaying" class="carousel slide msgSlide" data-bs-ride="carousel">
                            <div class="carousel-inner msgContainer" id="msgContainer">
                                <div class="carousel-item active msgCard slidePrincipal">
                                    <p>Centro de mensagens e atualizações!</p>
                                </div>

                                <div class="carousel-item msgCard slidePrincipal">
                                    <p>Atualizações!</p>
                                </div>

                                <?php

                                    //==============RETORNA DADOS DO BD EM ARRAY=================//  

                                            include_once('../a/conexao.php');
                                        
                                            $bd = new ConexaoBd();
                                            $pdo = $bd->getconexao();
                                            $query = "SELECT * FROM salvamsg";
                                            
                                            $buscarmsg = $pdo->prepare($query);
                                            
                                            $buscarmsg->execute();
                                            
                                            while($msg = $buscarmsg->fetch(PDO::FETCH_ASSOC)){
                                            echo "
                                            <div class='carousel-item msgCard slidePrincipal'>
                                                    <p>".$msg['msg']."</p>
                                            </div>";
                                            }

                                    ?>

                                
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div> 

                        <!-- Ilustração -->
                        <figure class="figura">
                            <img src="" alt="imagem ilustrativa">
                            <figcaption class="none">imagem ilustrativa</figcaption>
                        </figure>
                    </div>
            </header>
            <?php
            
            //     echo'TESTE';
            // exit;
    
                // include_once('../a/conexao.php');
                
                // $bd = new ConexaoBd();
                // $pdo = $bd->getconexao();
                // $query = "SELECT * FROM salvamsg";

                
                
                // $buscarmsg = $pdo->prepare($query);

                // $buscarmsg->execute();

                // while($msg = $buscarmsg->fetch(PDO::FETCH_ASSOC)){
                //     echo $msg['msg'];
                // }
                
            
            ?>
            <!-- Conteudo principal da página -->
            <main class="infomain">
                <!-- Lista de ramal dos funcionarios -->
                    <section class="lista">
                        <?php
                        




                           //==============RETORNA DADOS DO BD EM ARRAY=================//  

                            include_once('../a/conexao.php');
                    
                            $bd = new ConexaoBd();
                            $pdo = $bd->getconexao();
                            $query = "SELECT * FROM funcionario ORDER BY id_funcionario";
                            
                            $buscarusuario = $pdo->prepare($query);
                            $buscarusuario->execute();

                            while($usuario = $buscarusuario->fetch(PDO::FETCH_ASSOC)){
                            echo "
                                <div class='linha'>
                                    <aside class='perfil'>
                                        <img src='../assets/user.png' alt='imagem perfil'>
                                    </aside>
                                    <section class='indice'>
                                        <p class='nome'>".$usuario['nome_funcionario']."</p>
                                        <small class='email'><span>email: </span>".$usuario['email_funcionario']."</small> 
                                        <br>
                                        <small class='ramal'><span>ramal: </span>".$usuario['id_funcionario']."</small>
                                    </section>
                                </div>";
                            }

                        ?>

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
<!-- <script>
    $(document).ready(function() {

        $.ajax({
            url: "http://localhost/github-repo/welfare1.1/home/metodo.php",
            method: "post",
            data: "metodo=Listar_msg",
            beforeSend:function(){

            },
            success: function(data){
                $('#msgContainer').html(data);
            }
        });

    
    });
</script> -->
</body>
</html>