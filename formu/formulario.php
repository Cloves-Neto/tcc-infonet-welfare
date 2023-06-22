<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare </title>
    <link rel="stylesheet" href="./formulario.css">
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
            font-size: 1rem;
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
                    <a href="../home/home-adm.php">Início</a>
                </li>
                <li>
                    <a href="../mensagem/mensagem.php">Mensagem</a>
                </li>
                <li>
                    <a href="../cadastro/cadastrarpac.php">Paciente</a>
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
</head>
<body>
    <form>
        
            <nav>
                <!-- titulo da sessao -->
            <div class="h2">
                <h2  style="text-align: center;">Fale com a gente</h2>
            </div>  
                  <!-- info da pagina -->
                 <ul>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </nav>

            <section>
                <div class="container">

                        <label class="Nome" for="">Nome</label><br>
                        <input type="text" id="Nome" name="Nome" class="Nome" maxlength="40">

                        <label  class="Data" for="">Data</label><br>
                        <input type="Date" id="Data" name="Data" class="Data">  

                        <label class="Assunto" for="">Assunto</label><br>
                        <input type="text" id="Assunto" name="Assunto" class="Assunto" maxlength="85" >

                        <label  class="Texto" for="">Texto</label><br>
                        <textarea id="Texto" name="Texto" class="my-textarea" maxlength="756"></textarea>
                    
                    <!-- botão enviar  -->
                    <div class="button">
                        <input type="submit" value="enviar">
                    </div>
                
                </div>

            </section>

          

    </form>
    
<script></script>
</body>
</html>