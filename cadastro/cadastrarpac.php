
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="cadastrarpac.css">
        <style>
            
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed, 
        figure, figcaption, footer, header, hgroup, 
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
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 1rem !important;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Popup */
            .popup {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            }

            .popup-content {
            background-color: #fff;
            width: 300px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            }

            .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            }

            .close:hover {
            color: black;
            }


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
            background-color: cadetblue;
            position: relative;
            padding: 10px;
            border-radius: 10px;
        
        }

        aside.menu .user-profile{
            width: 100px;
            height: 100px;
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
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        aside.menu nav{
            width: 100%;
            height: 100%;
            display: flex;
            padding: 15px;
            flex-direction: column;
            gap: 5px;
            justify-content: space-between;
            align-items: center;
        }
        aside.menu nav ul{ 
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            height: 100%;
            width: 100%;
            gap: 20px;
        }
        aside.menu nav ul li{
            width: 100%;
            height: 30px;
            padding-left: 5px;
            gap: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
        } 
        aside.menu nav ul li ion-icon{
            font-size: 1.4rem !important; 
            color: white;
            cursor: pointer;
        }
        aside.menu nav ul li:hover{
            background-color: white;
            border-radius: 5px;
            transition: .2s;
        }

        aside.menu nav ul li:hover a,
        aside.menu nav ul li:hover ion-icon{
            color: cadetblue;
        }
        aside.menu nav a.sair{
            width: 50px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            background-color: white;
        }
        aside.menu nav a.sair ion-icon{
            color: cadetblue !important;
            font-size: 1.6rem !important;
            padding-left: 5px;
        }
            

    </style>
</head>

<body>
<div class="granbox">
    <aside class="menu">
            <nav>

                <div class="user-profile">
                    <a href="#" class="user-img" aria-label="area de informaçãoes do usuario">
                        <img src="../assets/user.png" alt="imagem de usuario">
                    </a>
                </div>

                <ul>
                    <li>
                        <ion-icon name="person-outline"></ion-icon>
                        <a href="../cadastro/cadastrarpac.php">Paciente</a>
                    </li>

                    <li>
                        <ion-icon name="calendar-number-outline"></ion-icon>
                        <a href="../agenda/agenda.php">Agenda</a>
                    </li>

                    <li>
                        <ion-icon name="cash-outline"></ion-icon>
                        <a href="../financeiro/financeiro.php">Financeiro</a>
                    </li>

                    <li>
                        <ion-icon name="document-text-outline"></ion-icon>
                        <a href="../relatorio/relatorio.php">Relatório</a>
                    </li>
                </ul>
                
                <a class="sair" href="#">
                    <ion-icon name="exit-outline" style="color: white; "></ion-icon>
                </a>
            </nav>
        </aside>

        <section class="infosite">

            <header>
                <h2>Pacientes</h2>
            </header>

            <main>
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
                                echo "<td><a href='delete_patient.php?id=" . $row["cpf_paciente"] . "'>Excluir</a></td>";
                            
                                echo "</tr>";
                            }
                            
                        } else {
                            echo "<tr><td colspan='2'>Nenhum resultado encontrado.</td></tr>";
                        }
                    ?>
                </table>
            <br><br>
                    <button onclick="openPopup()">Cadastrar paciente</button>

                    <div id="popup" class="popup">
                        <div class="popup-content">
                            <span class="close" onclick="closePopup()">&times;</span>
                            <h2>Formulário</h2>
                            <form method="post" action="" id="cad_pac" name="cad_pac">
                                <div>
                                <h5>INFORMAÇÕES DO PACIENTE</h5>
                                    <label for="">
                                        Nome
                                        <input type="text" id="nome_paciente" name="nome_paciente">
                                    </label><br>
                                    <label for="">
                                        Data de nascimento
                                        <input type="date" id="dt_nascimento_paciente" name="dt_nascimento_paciente">
                                    </label><br>
                                    <label for="">
                                        CPF
                                        <input type="text" id="cpf_paciente" name="cpf_paciente">
                                    </label><br>
                                    <label for="">
                                        RG
                                        <input type="text" id="rg_paciente" name="rg_paciente">
                                    </label><br>
                                    <label for="">
                                        Sexo <br>
                                        <input type="radio" id="sexo_paciente" name="sexo_paciente" value="f" >Feminino <br>
                                        <input type="radio" id="sexo_paciente" name="sexo_paciente" value="m">Masculino <br>
                                        <input type="radio" id="sexo_paciente" name="sexo_paciente" value="o">Outro <br>
                                    </label><br>

                                    <h5>INFORMAÇÕES DO RESPONSÁVEL</h5>
                                    <label for="">
                                        Nome
                                        <input type="text" id="nome_responsavel" name="nome_responsavel">
                                    </label><br>
                                    <label for="">
                                        Data de nascimento
                                        <input type="date" id="dt_nascimento_responsavel" name="dt_nascimento_responsavel">
                                    </label><br>
                                    <label for="">
                                        CPF
                                        <input type="text" id="cpf_responsavel" name="cpf_responsavel">
                                    </label><br>
                                    <label for="">
                                        RG
                                        <input type="text" id="rg_responsavel" name="rg_responsavel">
                                    </label><br>
                                    <label for="">
                                        Sexo <br>
                                        <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="f">Feminino <br>
                                        <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="m">Masculino <br>
                                        <input type="radio" id="sexo_responsavel" name="sexo_responsavel" value="o">Outro <br>
                                    </label><br>

                                    <h5>INFORMAÇÕES PARA CONTATO</h5>
                                    <label for="">
                                        Telefone
                                        <input type="text" id="contato_paciente" name="contato_paciente">
                                    </label><br>
                                    <label for="">
                                        Email
                                        <input type="text" id="email" name="email">
                                    </label><br><br>

                                    <h5>INFORMAÇÕES DE ENDEREÇO</h5>
                                    <label for="">
                                        UF
                                        <input type="text" id="uf" name="uf">
                                    </label><br>
                                    <label for="">
                                        Logadouro
                                        <input type="text" id="logradouro" name="logradouro">
                                    </label><br>
                                    <label for="">
                                        CEP
                                        <input type="text" id="cep_paciente" name="cep_paciente">
                                    </label><br>
                                    <label for="">
                                        N°
                                        <input type="text" id="numero_casa_paciente" name="numero_casa_paciente">
                                    </label>
                    </div>

                    <div id="resposta"></div> 
                    
                    <!-- BOTÃO CADASTRAR -->
                    <input type="submit" id="cadastrar" name="cadastrar" value="cadastrar">
                    <input type="button" value="Fechar" id="fecha">
                </form>
            </main>
        </section>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>






        </div>
        </div>

        <script>
            function openPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
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