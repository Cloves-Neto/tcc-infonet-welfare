<?php
require "../conexao.php";

if (isset($_POST["add"])) {
    $tipo_especialidade = $_POST["tipo_especialidade"];

    // Verifica se o campo do cargo foi preenchido
    if (!empty($tipo_especialidade)) {
        // Insere o novo cargo no banco de dados
        $query = "INSERT INTO especialidade (tipo_especialidade) VALUES (:tipo_especialidade)";
        $statement = $conexao->prepare($query);
        $statement->bindValue(":tipo_especialidade", $tipo_especialidade);
        $result = $statement->execute();

        if ($result) {
            header('Location: especialidade.php');
        } else {
            echo "Falha ao adicionar o especialidade.";
        }
    } else {
        echo "Por favor, preencha o campo do especialidade.";
    }
} else {
    echo "Requisição inválida.";
}
?>
