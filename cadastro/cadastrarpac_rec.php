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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Paciente</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="./cadastrarpac.css">
</head>
<body>
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
        <!-- titulo da sessao -->
        <header>
            <h2 class="titulo-pagina">cadastrar paciente</h2>
        </header>

        <!-- tabela de info -->
        <main>
            <!-- btn chama pop up -->
            <button class="popbtn" onclick="openPopup()"><ion-icon name="add-circle-outline"></ion-icon>Cadastrar paciente</button>
            <!-- Tabela de dados paciente -->
            <table>
                <tr>
                    <th>Nome Paciente</th>
                    <th>Dt Nasc</th>
                    <th>CPF Paciente</th>
                    <th>Sexo</th>
                    <th>Contato</th>
                    <th>Email</th>
                    <th>Nome Responsável</th>
                    <th>CPF Responsável</th>
                    <th>CEP</th>
                    <th>---</th>

                </tr>
                <?php
                    require "./conexao.php";

                    $query = "SELECT * FROM paciente WHERE id_paciente";
                    $result = $conexao->query($query);

                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                    if (count($rows) > 0) {
                        foreach ($rows as $row) {
                            echo "<tr>";
                                echo "<td>" . $row["nome_paciente"] . "</td>";
                                echo "<td>" . $row["dt_nascimento_paciente"] . "</td>";
                                echo "<td>" . $row["cpf_paciente"] . "</td>";
                                echo "<td>" . $row["sexo_paciente"] . "</td>";
                                echo "<td>" . $row["contato_paciente"] . "</td>";
                                echo "<td>" . $row["email_paciente"] . "</td>";
                                echo "<td>" . $row["nome_responsavel"] . "</td>";
                                echo "<td>" . $row["cpf_responsavel"] . "</td>";
                                echo "<td>" . $row["cep_paciente"] . "</td>";
                                echo "<td>
                                        <a class='abtn edita' href='editar_cadastro_rec.php?cpf_paciente=" . $row["cpf_paciente"] . "'><ion-icon name='color-wand-outline'></ion-icon></a>
                                        <a class='abtn deleta' href='delete_patient.php?cpf_paciente=" . $row["cpf_paciente"] . "'>t<ion-icon name='trash-outline'></ion-icon></a>
                                    </td>";
                            echo "</tr>";
                        }
                        
                    } else {
                        echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
                    }
                ?>
            </table>
        </main>

        <!-- pop up drop form -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">x</span>

                <h2 class="titulo-form">Formulário</h2>
                
                <form method="post" id="cad_pac" name="cad_pac">

                <div class="wrapper">
                    <h5>INFORMAÇÕES DO PACIENTE</h5>
                    
                    <label class="lbl_container" for="nome_paciente" >
                        Nome
                        <input type="text" id="nome_paciente" name="nome_paciente">
                    </label>
                    <label class="lbl_container" for="dt_nascimento_paciente">
                        Data de nascimento
                        <input type="date" id="dt_nascimento_paciente" name="dt_nascimento_paciente">
                    </label>
                    <label class="lbl_container" for="cpf_paciente">
                        CPF
                        <input type="text" id="cpf_paciente" name="cpf_paciente">
                    </label>
                    <label class="lbl_container" for="rg_paciente">
                        RG
                        <input type="text" id="rg_paciente" name="rg_paciente">
                    </label>
                    <label>
                        Sexo
                        <div>
                            <input type="radio" id="sexo_paciente" name="sexo_paciente" value="f" >Feminino
                            <input type="radio" id="sexo_paciente" name="sexo_paciente" value="m">Masculino
                            <input type="radio" id="sexo_paciente" name="sexo_paciente" value="o">Outro 
                        </div>
                        
                    </label>

                    <h5>
                        INFORMAÇÕES DO RESPONSÁVEL
                    </h5>
                    

                    
                    <label class="lbl_container" for="nome_responsavel">
                        Nome
                        <input type="text" id="nome_responsavel" name="nome_responsavel">
                    </label>
                    <label class="lbl_container" for="dt_nascimento_responsavel">
                        Data de nascimento
                        <input type="date" id="dt_nascimento_responsavel" name="dt_nascimento_responsavel">
                    </label>
                    <label class="lbl_container" for="cpf_responsavel">
                        CPF
                        <input type="text" id="cpf_responsavel" name="cpf_responsavel">
                    </label>
                    <label class="lbl_container" for="rg_responsavel">
                        RG
                        <input type="text" id="rg_responsavel" name="rg_responsavel">
                    </label>
                    <label class="lbl_container" for="">
                        Sexo <br>
                        <div>
                        <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="f">Feminino 
                        <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="m">Masculino 
                        <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="o">Outro 
                        </div>
                    </label>

                    <h5>INFORMAÇÕES PARA CONTATO</h5>
                    <label class="lbl_container" for="contato_paciente">
                        Telefone
                        <input type="text" id="contato_paciente" name="contato_paciente">
                    </label>
                    <label class="lbl_container" for="email">
                        Email
                        <input type="text" id="email" name="email">
                    </label>

                    <h5>INFORMAÇÕES DE ENDEREÇO</h5>
                    <label class="lbl_container" for="uf">
                        UF
                        <input type="text" id="uf" name="uf">
                    </label>
                    <label class="lbl_container" for="logradouro">
                        Logadouro
                        <input type="text" id="logradouro" name="logradouro">
                    </label>
                    <label class="lbl_container" for="cep_paciente">
                        CEP
                        <input type="text" id="cep_paciente" name="cep_paciente">
                    </label>
                    <label class="lbl_container" for="numero_casa_paciente">
                        N°
                        <input type="text" id="numero_casa_paciente" name="numero_casa_paciente">
                    </label>
                </div>

                <div id="resposta"></div> 

                <!-- BOTÃO CADASTRAR -->
                <div class="button wrapper" >
                    <input type="submit" id="cadastrar" name="cadastrar" value="cadastrar">
                </div>
                
                </form>
                
            </div>
        </div>
    </section>
</div>


    <script>
        function openPopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "flex";
        }

        function closePopup() {
        var popup = document.getElementById("popup");
        popup.style.display = "none";
        }

    </script>

    <script>
        $(document).ready(function() {

        $('#cad_pac').submit(function(event) {
            event.preventDefault(); // Impede o envio padrão do formulário

            var dados = new FormData(this); // Serializa os dados do formulário

            $.ajax({
                method: 'POST',
                url: 'cadastrar.php',
                data: dados,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("h2").html("Processo em andamento.");
                }
            })
            .done(function(msg) {
                $("#resposta").html(msg);
                alert("Dados cadastrados com sucesso!");
                window.location.reload();
            })
            .fail(function() {
                alert("Falha na inclusão");
            });
        });

        });
    </script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>