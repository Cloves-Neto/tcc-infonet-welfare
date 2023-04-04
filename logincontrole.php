<?php

    session_start();

    if(isset($_POST['submit']) && !empty($_POST['email_funcionario']) && !empty($_POST['senha_funcionario']))
    {
        include_once ("../welfare1.1/conexao.php");

        $email_funcionario = $_POST['email_funcionario'];
        $senha_funcionario = $_POST['senha_funcionario'];

        $sql = "SELECT id_funcionario, nome_funcionario, email_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario' AND senha_funcionario = '$senha_funcionario'";
        $resultado = $conn->query($sql);
        
        if(mysqli_num_rows($resultado) < 1)
        {
            unset($_SESSION['email_funcionario']);
            unset($_SESSION['senha_funcionario']);
            header('Location: index.php');
        }
        else
        {
            $_SESSION['email_funcionario'] = $email_funcionario;
            $_SESSION['senha_funcionario'] = $senha_funcionario;
            header('Location: welfare1.1/paginas/home/home.php');
        }
    }
    else
    {
        header('Location: home.php');
    }