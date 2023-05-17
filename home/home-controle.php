<?php
    include_once('../home/home-class.php');
    // session_start();
    // Buscando nome do funcionario Logado no Db (criar lógica para buscar o logado, pois nesse exemplo esta pegando apenas a primeira linha)
    // $email_funcionario = $_SESSION['email_funcionario'];
    $email_funcionario = "ju@teste.com";

    $executaHome = new executaHome();

    $executaHome->setEmailFuncionario($email_funcionario);


    
?>

