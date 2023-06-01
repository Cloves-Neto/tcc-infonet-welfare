<?php

    $host = 'localhost';
    $dbname = 'sistema_welfare';
    $username = 'root';
    $password = '';

    try {
        // Criação da conexão
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Definição de atributos da conexão
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");
        
        // Aqui você pode realizar operações no banco de dados

    } catch (PDOException $erro) {
        echo "Erro na conexão: " . $erro->getMessage();
    }
?>
        