<?php
// session_start(); // Inicia a sessão

// include_once "../conexao.php";

// // Verifica se o usuário está logado e recupera o nome
// if (isset($_SESSION['email_funcionario'])) {
//     $email_funcionario = $_SESSION['email_funcionario'];
    
//     // Consulta o banco de dados para obter o nome do funcionário com base no email
//     $query = "SELECT nome_funcionario FROM funcionario WHERE email_funcionario = :email";
//     $stmt = $conexao->prepare($query);
//     $stmt->bindValue(':email', $email_funcionario);
//     $stmt->execute();
    
//     // Verifica se encontrou um funcionário com o email fornecido
//     if ($stmt->rowCount() > 0) {
//         $dados_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
//         $nome_funcionario = $dados_funcionario['nome_funcionario'];
//     } else {
//         // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
//         header("Location: index.php");
//         exit();
//     }
// } else {
//     // Redireciona o usuário para a página de login ou trata o caso em que o usuário não está logado
//     header("Location: index.php");
//     exit();
// }

$nome_funcionario = 'jão';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Adm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./home-adm-style.css">
    
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

<!-- Div que limita o tamanho do conteúdo -->
<div class="granbox">
    <!-- Menu lateral do sistema (Home adm) -->
    <aside class="menu">
        <nav>
            <div class="user-profile">
                <a href="../img/editar_foto.php" class="user-img" aria-label="area de informaçãoes do usuario">
                    <img src="../assets/user.png" alt="imagem de usuario">
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
    
    <!-- Conteudo principal da página -->
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
                                <p>Centro de mensagens e atualizações!</p>
                            </div>

                            <div class="carousel-item msgCard slidePrincipal">
                                <p>Atualizações!</p>
                            </div>

                            <?php

                                //==============RETORNA DADOS DO BD EM ARRAY=================//  
                                    
                                        // $bd = $conexao;

                                        // $query = "SELECT * FROM `mensagem`";
                                        
                                        // $buscarmsg = $bd->prepare($query);
                                        
                                        // $buscarmsg->execute();
                                        
                                        // while($msg = $buscarmsg->fetch(PDO::FETCH_ASSOC)){
                                        // echo "
                                        // <div class='carousel-item msgCard slidePrincipal'>
                                        //         <p>" . $msg['msg'] . "</p>
                                        // </div>";
                                        // }

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
                        <!-- <img src="" alt="imagem ilustrativa"> -->
                        <!-- <figcaption class="none">imagem ilustrativa</figcaption> -->
                    </figure>
                </div>
        </header>

        <!-- Conteudo principal da página -->
        <main class="infomain">
            <!-- Lista de ramal dos funcionarios -->
            <section class="lista">
                <div class="linha header">
                    <span class="item">Usuario</span>
                    <span class="item">Nome</span>
                    <span class="item">Email</span>
                    <span class="item">Setor</span>
                    <span class="item">Ramal</span>
                </div>
                <div class='linha'>
                    <span class="item">
                        <img src='../assets/user.png' alt='imagem perfil'>
                    </span>
                    <span class="item">
                        João Lacerda
                    </span>
                    <span class="item">
                        jão@email.com
                    </span>
                    <span class="item">
                        Administração
                    </span>
                    <span class="item">
                        001
                    </span>
                </div>
                <?php

                    //==============RETORNA DADOS DO BD EM ARRAY=================//  

                    // $bd = $conexao;

                    // $query = "SELECT * FROM funcionario ORDER BY id_funcionario";
                    
                    // $buscarusuario = $bd->prepare($query);
                    // $buscarusuario->execute();

                    // while($usuario = $buscarusuario->fetch(PDO::FETCH_ASSOC)){
                    // echo "
                    //     <div class='linha'>
                    //         <aside class='perfil'>
                    //             <img src='../assets/user.png' alt='imagem perfil'>
                    //         </aside>
                    //         <section class='indice'>
                    //             <p class='nome'>".$usuario['nome_funcionario']."</p>
                    //             <small class='email'><span>email: </span>".$usuario['email_funcionario']."</small> 
                    //             <br>
                    //             <small class='ramal'><span>ramal: </span>".$usuario['id_funcionario']."</small>
                    //         </section>
                    //     </div>";
                    // }

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