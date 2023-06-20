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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="./cadastrarpac.css">
    <style>
        /* Reset */
        html, body, div, span, applet, object, iframe,
        h1, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, 
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, 
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, hgroup, 
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
            font-family: Arial, Helvetica, sans-serif;
        }
        *,
        *::after,
        *::before{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        /* HTML5 display-role reset for older browsers */
        article, aside, details, figcaption, figure, 
        footer, header, hgroup, menu, nav, section {
            display: block;
        }
        body {
            line-height: 1;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        ol, ul {
            list-style: none;
        }
        blockquote, q {
            quotes: none;
        }
        blockquote:before, 
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
        }


        /* Formatação da Home */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 1rem;
            font-family: Arial, Helvetica, sans-serif;
        }
        a {
            text-decoration: none;
            color: white;
            font-weight: 600;
            letter-spacing: 2px;
        }
        /* Organização do container */
        .granbox {
            margin: auto;
            padding: 15px;
            width: 100%;
            max-width: 1440px;
        }
        /* Organização container */
        .granbox{
            margin: auto;
            padding: 15px;
        
            width: 100%;
            max-width: 1440px;
            height: 100vh;
        
            display: grid;
            grid-template-areas: 'm i';
            grid-template-columns: 200px calc(100% - 200px);
            grid-template-rows: 100%;
            gap: 10px;
        
        }
        /* Organização aside - menu */
        aside.menu{
            grid-area: m;
            background-color: rgb(81, 189, 138);
            position: relative;
            padding: 10px;
            border-radius: 10px;
        
        }
        aside.menu .user-profile{
            width: 120px;
            height: 120px;
            margin-bottom: 10px;
        }
        
        aside.menu .user-profile a{
            display: block;
            padding: 5px;
            border-radius: 10pc;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;   
        }
        aside.menu .user-profile a img{
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
        aside.menu nav{
            display: flex;
            flex-direction: column;
            padding: 15px;
            gap: 5px;
            justify-content: space-between;
            align-items: center;
        }
        aside.menu nav ul{ 
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            gap: 30px;
        }

        /* Organização da section infosite - conteudo principal */
        section.infosite{
            grid-area: i;    
            padding: 15px;
            display: grid;
            gap: 5px;
            grid-template-areas: 
            'ih'
            'im';
            grid-template-rows: 20% 80%;
            grid-template-columns: 100%;
        }   
        section.infosite header{
            grid-area: ih;
            background-color: aqua;
        }
        section.infosite main{
            grid-area: im;
            background-color: cadetblue;
            padding: 10px;
        }
        section.infosite main .cadastrar-area{
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            height: 60px;
            margin: 10px 0 20px 0;
        }

    </style>
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
                    <a href="../home/home.php">Início</a>
                </li>

                <li>
                    <ion-icon name="person-add-outline"></ion-icon>
                    <a href="../cadastro/cadastrarpac.php">Paciente</a>
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

    <div class="info">
        <!-- titulo da sessao -->
        <h2 style="text-align: center;">cadastrar paciente</h2>
        <!-- tabela de info -->
        <table>
            <tr>
                <th>Nome do Paciente</th>
                <th>Data de Nascimento</th>
                <th>CPF Paciente</th>
                <th>Sexo</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Nome Responsável</th>
                <th>Data de Nascimento</th>
                <th>RG Responsável</th>
                <th>CEP</th>

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
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["nome_responsavel"] . "</td>";
                        echo "<td>" . $row["dt_nascimento_responsavel"] . "</td>";
                        echo "<td>" . $row["cpf_responsavel"] . "</td>";
                        echo "<td>" . $row["cep_paciente"] . "</td>";
                        
                                                // Edit button
                        echo "<td><a href='editar_cadastro.php?cpf_paciente=" . $row["cpf_paciente"] . "'>Editar</a></td>";
                    
                        // Delete button
                        echo "<td><a href='delete_patient.php?cpf_paciente=" . $row["cpf_paciente"] . "'>Excluir</a></td>";
                    
                      

                        echo "</tr>";
                    }
                    
                } else {
                    echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
                }
            ?>
        </table>
        <br><br>
        <!-- btn chama pop up -->
        <button onclick="openPopup()">Cadastrar paciente</button>
        <!-- pop up drop form -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">x</span>

                <h2 class="titulo-form">Formulário</h2>
                
                <form method="post" action="" id="cad_pac" name="cad_pac">

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

                    <h5>INFORMAÇÕES DO RESPONSÁVEL</h5>
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
    </div>
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
                $("h2").html("Retorno da Inclusão...");
                $("#resposta").html(msg);
                alert("Dados cadastrados com sucesso!");
            })
            .fail(function() {
                alert("Falha na inclusão");
            });
        });

        });
    </script>
</body>
</html>