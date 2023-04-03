<?php
$usuario = 'André';
$data_hoje = date('d/m/Y');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" href="home-style.css">
    <meta charset="UTF-8">
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      body {
        width: 100vw;
        height: 100vh;
        overflow: hidden;
          margin: 0;
          position: relative;
          font-family: Arial, sans-serif;
          display: flex;
          flex-direction: row;
        }
      .home-menu{
        width: 60px;
        height: 100vh;
        background-color: rgb(46, 94, 78);
      }
      .container{
        width: 100%;
        height: 100%;
        flex: 1;
        display: flex;
        flex-direction: row;
        padding: 5px;
        background-color: rgb(230, 230, 230);
      }
      .sessao{
        width: 100%;
        height: 100%;
        padding: 5px 20px 5px 5px;
        display: flex;
        flex-direction: column;
        background-color: rgb(230, 230, 230);
      }
      .conntent.info-dia{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
      }
      .content.user{
        width: 100%;
        height: 60px;
        background-color: blue;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 5px;
      }
      .card{
        width: 50%;
      }
    </style>
  </head>
  <body>
    <!--Cabeçalho onde se encontra a tabela-->
    <nav id="home-menu" class="home-menu" name="home-menu">
      <ul>
        <li>
            <a href="../cadastro/cadastro.php"><img style="width:50px; height: 50px; margin: 50px 0 0 10px;" src="../node_modules/bootstrap-icons/icons/person-add.svg" alt="add-icone"></a>
        </li>
        <br><br>
        <li>
        <a href="/logout.php">sair</a>
        </li>
      </ul>
    </nav>
    <div class="container">
        <main class="sessao">
            <header class="content user">
                <div class="mensagem">Olá bem vindo<?php  echo ' '.$usuario;?>.</div>
                <nav>
                    usuario
                </nav>
            </header>
            <div class="content">
                <div class="card list-funcionario">
                    <div class="info">
                        <span class="img-container">img</span>
                        <div class="info-user">
                          <p><b>Nome:</b> Marcos</p>
                          <p><b>Cargo:</b> Aux.Administrativo</p>
                          <p><b>Email:</b> andré@welfare.com.br</p>
                          <p><b>Ramal:</b> 3003-0223</p>
                        </div>
                    </div>
                </div>
                <div class="card agenda"></div>
            </div>
            <div class="content info-dia">
                <div class="card consulta">
                  <fieldset>
                    <table>
                          <caption>consultas <?php echo ' '.$data_hoje;?></caption>
                          <thead>
                              <tr>
                                <th>Horario</th>
                                <th>Nome Paciente</th>
                                <th>Contato</th>
                                <th>Nome Médico</th>
                                <th>Especialidade</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="row">
                                <td>11:00</td>
                                <td>Maria de Lourdes</td>
                                <td>(11) 95562-4312</td>
                                <td>Edson Katsui</td>
                                <td>Ortopedia</td>
                              </tr>
                              <tr class="row">
                                <td>12:30</td>
                                <td>Marlon Koggima</td>
                                <td>(11) 94189-2527</td>
                                <td>Rubens Osvaldo</td>
                                <td>Clinico Geral</td>
                              </tr>
                              <tr class="row">
                                <td>12:50</td>
                                <td>Juan Marques</td>
                                <td>(11) 92598-4652</td>
                                <td>Edson Katsui</td>
                                <td>Ortopedia</td>
                              </tr>
                          </tbody>
                    </table>
                  </fieldset>
                </div>
                <div class="card exames">
                    <fieldset>
                    <table>
                          <caption>Exame <?php echo ' '.$data_hoje;?></caption>
                          <thead>
                              <tr>
                                <th>Horario</th>
                                <th>Nome Paciente</th>
                                <th>Contato</th>
                                <th>Solicitante</th>
                                <th>Tipo Exame</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="row">
                                <td>11:00</td>
                                <td>Maria de Lourdes</td>
                                <td>(11) 95562-4312</td>
                                <td>Edson Katsui</td>
                                <td>Raio-X Inferior</td>
                              </tr>
                              <tr class="row">
                                <td>12:30</td>
                                <td>Marlon Koggima</td>
                                <td>(11) 94189-2527</td>
                                <td>Rubens Osvaldo</td>
                                <td>Exame de Sangue (1)</td>
                              </tr>
                              <tr class="row">
                                <td>12:50</td>
                                <td>Juan Marques</td>
                                <td>(11) 92598-4652</td>
                                <td>Edson Katsui</td>
                                <td>Ressonâcia Magnética</td>
                              </tr>
                          </tbody>
                    </table>
                  </fieldset>
                </div>
            </div>
        </main>

    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>

