<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Agenda</title>
    <style>
        /* Reset */
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
        a{
            text-decoration: none;
            color: white;
            font-weight: 600;
            letter-spacing: 2px;

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
        }
        section.infosite header h2{
            font-size: 3rem !important;
            font-weight: 600;
            color: cadetblue;
            letter-spacing: 1px;
            margin-bottom: 0;
        }
        section.infosite main{
            grid-area: im;
            position: relative;
            background-color: cadetblue;
            border-bottom: solid 2px cadetblue;
            overflow: hidden;
        }
        section.infosite main .select-area{
            width: 100%;
            height: 60px;
            background-color: white;
            display: flex;
            gap: 10px;
            flex-direction: row;
            justify-content: flex-end;
        }
        section.infosite main .select-area select{
            width: 200px;
            height: 40px;
            padding-left: 5px;
            color: cadetblue;
            border: solid 2px cadetblue;
            border-radius: 100px;
        }
        section.infosite main .area-agenda{
            width: 100%;
            height: 380px;
            background-color: cadetblue;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 5px;
        }
        section.infosite main .area-agenda .area-scroll{
            width: 100%;
            overflow-y: scroll;
            height: 100%;
        }

        section.infosite main .area-agenda .area-scroll .row-data{
            width: 100%;
            height: 60px !important;
            padding: 0 5px 0 10px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            border: solid 2px cadetblue;
            background-color: white;
            display: flex;
            gap: 5px;
        }
        section.infosite main .area-agenda .area-scroll .row-data span{
            width: 20%;
            height: 90%;
            display: flex;
            font-size: .8rem !important;
            font-weight: 600;
            align-items: center;
            justify-content: center;
            color: cadetblue;
            border-left: solid 1px cadetblue;
            overflow: hidden;
        }
        section.infosite main .area-agenda .area-scroll .row-data span:nth-child(1){
            justify-content: center;
            font-weight: 700;
            background-color: cadetblue;
            color: white;
            border-radius: 5px;
        }
        section.infosite main .area-agenda .area-scroll .row-data.cabecalho span{
            background-color: white;
            justify-content: center;
            border-left: solid 2px cadetblue;
            color: cadetblue;
            font-weight: 800;
            padding: 5px;
            font-size: 1rem !important;
        }
        section.infosite main .area-agenda .area-scroll .row-data.cabecalho span:nth-child(1){
            border: transparent;
            border-radius: 0;
        }

        .cancelar,
        .agendar{
            width: 60%;
            height: 70%;
            outline: none;
            color: white;
            padding: 0 2px 0 2px;
            border: solid 2px transparent;
            border-radius: 5px;
            cursor: pointer;
            transition: .2s;
        }
        .cancelar{
            background-color: red;
        }
        .cancelar:hover{
            background-color: white;
            color: red;
            border: solid 2px red;
            transition: .2s;
        }
        .agendar{
            background-color: green;
        }
        .agendar:hover{
            background-color: white;
            color: green;
            border: solid 2px green;
            transition: .2s;
        }

        .select-area button.agendar{
            display: flex; 
            justify-content: center;
            align-items: center;
            gap: 5%;
            max-width: 200px;
            font-weight: 500;
            font-size: .8rem !important;
            text-transform: uppercase;
        }
        .select-area button.agendar ion-icon{
            font-size: 1.4rem !important;
        }
        .select-area .buscar-container{
            width: 100%;
            height: 70%;
            border-radius: 10px;
            background-color: white;
            border: solid 2px cadetblue !important;
            display: flex;
            flex-direction: center;
            justify-content: center;
            padding: 2px;
        }
        .select-area .buscar-container input[type="search"]{
            width: 100%;
            border-radius: 10px;
            outline: none;
            background-color: white;
            border: none;
            padding-left: 5px;
            padding-right: 5px;

        }
        .select-area .buscar-container button{
            width: 10%;
            border: none;
            background-color: cadetblue;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;

        }
        .select-area .buscar-container button ion-icon{
            color: white;
            font-size: 1.4rem !important;
        }




    </style>
</head>
<body>
    <div class="granbox">
    <aside class="menu">
    <nav>
            <div class="user-profile">
                <a href="../img/editar_foto.php" class="user-img" aria-label="area de informaçãoes do usuario">
                    <img src="../assets/user.png" alt="imagem de usuario">
                </a>
            </div>
            <ul>
                <li>
                    <a href="../mensagem/mensagem.php">Mensagem</a>
                </li>
                <li>
                    <a href="../cadastro/cadastrarpac.php">Paciente</a>
                </li>
                
                <!-- <li>
                    <a href="../especialidade/especialidade.php">Especialidade</a>
                </li> -->
                
                <li>
                    <a href="../cargo/cargo.php">Cargo</a>
                </li>
                <li>
                    <a href="../registro/registro.html">Funcionario</a>
                </li>
                <li>
                    <a href="../agenda/agenda.php">Agenda</a>
                </li>
                <!-- <li>
                    <a href="../financeiro/financeiro.php">Financeiro</a>
                </li>
                <li>
                    <a href="../relatorio/relatorio.php">Relatório</a>
                </li> -->
                <li>
                    <a href="../index.php">
                        <ion-icon name="exit-outline" style="color: white; "></ion-icon>
                    </a>
                </li>
            </ul>
            </nav>
        </aside>
        <!-- <aside>
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
        </aside> -->
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