<?php
$usuario = 'André';

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
        flex: 1;
        display: flex;
        flex-direction: row;
        padding: 5px;
        background-color: rgb(230, 230, 230);
      }
    .sessao-esquerda, .sessao-direita{
      width: 50%;
      height: 100%;
      display: flex;
      flex-direction: column;
      background-color: rgb(230, 230, 230);
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
      </ul>
    </nav>
    <div class="container">
        <main class="sessao-esquerda">
            <div class="mensagem">Olá bem vindo<?php  echo ' '.$usuario;?>.</div>
            <div class="row">
                <div class="card list-funcionario">

                </div>
            </div>
            <div class="row">
                <div class="card">
                  <fieldset>
                    <legend></legend>
                  </fieldset>
                  <table class="table my-table">
                    <tr>
                      <th>Nome:</th>
                    </tr>
                  </table>
                </div>
                <div class="card"></div>
            </div>
        </main>
        <aside class="sessao-direita">

            <div class="user"> usuario </div>
            <div class="calendar"> calendario </div>
            <div class="din"> R$ </div>

        </aside>
    </div>

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>