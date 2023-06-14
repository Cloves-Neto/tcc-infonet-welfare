<?php
require "../conexao.php";

if (isset($_POST["update"])) {
    $id_especialidade = $_POST["id"];
    $tipo_especialidade = $_POST["especialidade"];

    $query = "UPDATE especialidade SET tipo_especialidade = :tipo_especialidade WHERE id_especialidade = :id_especialidade";
    $statement = $conexao->prepare($query);
    $statement->bindValue(":tipo_especialidade", $tipo_especialidade);
    $statement->bindValue(":id_especialidade", $id_especialidade);
    $result = $statement->execute();

    if ($result) {
        header('Location: especialidade.php');
    } else {
        echo "Failed to update cargo.";
    }
} else {
    echo "Invalid request.";
}
?>
