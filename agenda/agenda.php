<?php
session_start(); // Inicia a sessão

include_once "../conexao.php";

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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Agenda</title>
    <link rel="stylesheet" href="./agenda.css">
</head>
<body>
    <div class="granbox">
    <!-- Menu lateral do sistema (Home adm) -->
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

    <section class="infosite">
            <header>
                <h2>Agenda</h2>
            </header>
        <main>
            <!-- Select Area - listagem de datas e Médicos -->
            <div class="select-area">
                <button class="agendar">
                    Novo agendamento
                    <ion-icon name="add-circle-outline"></ion-icon>
                </button>

                <div class="buscar-container">
                    <input type="search" placeholder="pesquise aqui...">
                    <button class="buscar">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                </div>
                <!-- Select - Medico Cadastrado no sistema -->
                <select name="medico" id="medico">
                    <option value="">Selecione o médico...</option>
                    
                    <?php
                    
                        include_once ('./controleagenda.php');
                        
                        $buscaDados = $buscaMedico;

                        echo'sem erro';

                        while($result = $buscaDados->fetch(PDO::FETCH_ASSOC)){
                            echo 
                            '<option id="select_medico" value="'.$result["id_funcionario"].'">'.    
                                $result["nome_funcionario"].
                            '</option>';
                        }
                    
                    ?>
                </select>

                <!-- Select - Data lista -->
                <select name="data" id="data">
                    <option value="">Selecione a data...</option>
                    
                    <?php
                        include_once('./controleagenda.php');

                        for($item = 0; $item<60; $item++)
                        {
                            echo'<option id="select_data">'. $dataAgenda[$item] .'</option>';
                        }
                    ?>
                </select>

            </div>
            <!-- Div - area de listagem de datas disponiveis e agendamentos marcados -->
            <div class="area-agenda">
                <div class="area-scroll">
                    <!-- Busca ibnfo dos horarios disponíveis e agendamentos marcados -->
                    
                    <div class="row-data cabecalho">
                        <span>Horario</span>
                        <span>Paciente</span>
                        <span>RMED</span>
                        <span>Especialidade</span>
                        <span>Médico</span>
                        <span>-----</span> <!-- botão chamando função para excluir agendamendo-->
                    </div>
                    <!-- row-data conteúdo gerado conforme agendamento resgistrado -->
                    <div class=row-data>
                        <span class="hora">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>001</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>

                    <div class="row-data">
                        <span value="0800/0900">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>002</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>

                    <div class="row-data">
                        <span value="0800/0900">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>002</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>

                    <div class="row-data">
                        <span value="0800/0900">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>002</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>

                    <div class="row-data">
                        <span value="0800/0900">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>002</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>

                    <div class="row-data">
                        <span value="0800/0900">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>002</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>

                    <div class="row-data">
                        <span value="0800/0900">08:00 - 09:00</span>
                        <span>Andressa Moreira</span>
                        <span>002</span>
                        <span>Oftalmolofia</span>
                        <span>Julia Vilha</span>
                        <span><button class="cancelar">Cancelar</button></span> <!-- botão chamando função para excluir agendamendo-->
                    </div>


                    
                </div>
            </div>
            
        </main>
    </section>
</div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>