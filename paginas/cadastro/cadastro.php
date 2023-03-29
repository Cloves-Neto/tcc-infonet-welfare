<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *, *::after, *::before{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }
        .menu-fix{
            width: 60px;
            height: 100vh;
            background-color: black;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 15;
        }
        .container{
            margin: 0 0 0 70px;
            width: 90%;
            height: 100vh;
            position: relative;
        }
        .popup{
            display: none;
            position: absolute;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            height: 600px;
            padding: 15px;
            top: 30px;
            left: 25%;
            border-radius: 10px;
            z-index: 10;
            background-color: rgb(69, 240, 203);
        }

        .view-popup{
            display: block;
        }

        .view-popup ~ footer{
            width: 100vw;
            height: 100vh;
            position: absolute;
            z-index: 5;
            background-color: rgba(0, 0, 0, 0.101);
            backdrop-filter: blur(2px);
            top: 0;
            left: -20px;
        }
        .view-popup ~ footer input{
            display: none;
        }
        .dados-paciente{
            display: flex;
            justify-content: space-between;
        }
        .dado1{
            display: flex;
            flex-direction: column;
        }
        .dado1{
            width: 50%;
            display: flex;
            flex-direction: column;
        }
        .dado2{
            width: 50%;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <!-- Menu dá página -->
    <nav class="menu-fix">
        <ul>
            <li>
                <a href="#"></a>
            </li>
        </ul>
    </nav>
    <!-- conteudo proncipal da página -->
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cpf</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Dt Nacimento</th>
              </tr>
            </thead>
            <tbody>
                <?php
                include_once ('conexao.php');
                $sql = "SELECT * FROM paciente ORDER BY id_paciente";
                $result = $conn->query($sql);
                    while($user_data = mysqli_fetch_assoc($result))
                    {
                        echo"<tr>
                                <td scope='row'>"
                                    .$user_data['id_paciente'].
                                "</td>
                                <td scope='row'>"
                                    .$user_data['nome_paciente'].
                                "</td>
                                <td scope='row'>"
                                    .$user_data['cpf_paciente'].
                                "</td>
                                <td scope='row'>"
                                    .$user_data['email'].
                                "</td>
                                <td scope='row'>"
                                    .$user_data['contato_paciente'].
                                    "</td>
                                <td scope='row'>"
                                    .$user_data['dt_nascimento_paciente'].
                                "</td>
                                <td>
                                    <a href='editar_cadastro.php?id=$user_data[id_paciente]' class='btn-sm' name='editar' id='editar'><img src='../node_modules/bootstrap-icons/icons/pencil-fill.svg' alt='editar-icone'></a>
                                    <a href='editar_cadastro.php?id=$user_data[id_paciente]' class='btn-sm' name='excluir' id='excluir'><img src='../node_modules/bootstrap-icons/icons/trash-fill.svg' alt='ecluir-icone'></a>
                                    <a href='editar_cadastro.php?id=$user_data[id_paciente]' class='btn-sm' name='visualizar' id='visualizar'><img src='../node_modules/bootstrap-icons/icons/eye-fill.svg' alt='visualizar-icone'></a>
                                </td>
                            </tr>";
                    }
                ?>
            </tbody>
          </table>
        <br>
        <!-- Após a função estiver "ok" - o cadastro pode ser exibido como um footer fixo e apenas a tabela -"consulta de dados" com scroll 
            ou exibir o cadastro como pop up executado por um botão de função Js -->
        <!-- Aqui é a div do formulario de cadastro -->
        
        <div id="popup" class="popup cadastro" >
            <fieldset>
                <legend>Cadastro de Paciente    </legend>
                <form  method="post">
                    <div class="row">
                        <label for="">
                            Nome
                            <input type="text" id="nome" name="nome">
                        </label>
                        <label for="">
                            Cpf
                            <input type="text" id="nome" name="nome">
                        </label>
                        <label for="">
                            Dt Nascimento
                            <input type="text" id="nome" name="nome">
                        </label>
                    </div>
                
                    <div class="row">
                        <label for="">
                            Email
                            <input type="text" id="nome" name="nome">
                        </label>
                        <label for="">
                            Telefone
                            <input type="text" id="nome" name="nome">
                        </label>
                        <label for="">
                            Cep
                            <input type="text" id="nome" name="nome">
                        </label>
                    </div>
                
                    <div class="row">
                        <label for="">
                            UF
                            <input type="text" id="nome" name="nome">
                        </label>
                        <label for="">
                            Nº
                            <input type="text" id="nome" name="nome">
                        </label>
                        <label for="">
                            Logradouro
                            <input type="text" id="nome" name="nome">
                        </label>
                    </div>
                    <input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar">
                </form>
            </fieldset>
        </div>
        <footer>
            <input type="button" value="cadastrar" onclick="cadastrar()">
        </footer>
    </div>



<script>
    function cadastrar(){
        const popup = document.getElementById('popup');

        popup.classList.add('view-popup');
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html> 

<!-- Execução das funções-->

<?php

include_once('conexao.php'); 

// Cadastro
if(isset($_POST['cadastrar'])){
    echo"<script>
        alert('Cadastrado com sucesso!')
    </script>";
}



?>
