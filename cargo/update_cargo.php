<?php
require "../conexao.php";

if (isset($_POST["update"])) {
    $id_cargo = $_POST["id"];
    $cargo_funcionario = $_POST["cargo"];

    $query = "UPDATE cargo SET cargo_funcionario = :cargo_funcionario WHERE id_cargo = :id_cargo";
    $statement = $conexao->prepare($query);
    $statement->bindValue(":cargo_funcionario", $cargo_funcionario);
    $statement->bindValue(":id_cargo", $id_cargo);
    $result = $statement->execute();

    if ($result) {
        header('Location: cargo.php');
    } else {
        echo "Failed to update cargo.";
    }
} else {
    echo "Invalid request.";
}
?>
