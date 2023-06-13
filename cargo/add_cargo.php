<?php
require "../conexao.php";

if (isset($_POST["add"])) {
    $cargo_funcionario = $_POST["cargo_funcionario"];

    // Verifica se o campo do cargo foi preenchido
    if (!empty($cargo_funcionario)) {
        // Insere o novo cargo no banco de dados
        $query = "INSERT INTO cargo (cargo_funcionario) VALUES (:cargo_funcionario)";
        $statement = $conexao->prepare($query);
        $statement->bindValue(":cargo_funcionario", $cargo_funcionario);
        $result = $statement->execute();

        if ($result) {
            header('Location: cargo.php');
        } else {
            echo "Falha ao adicionar o cargo.";
        }
    } else {
        echo "Por favor, preencha o campo do cargo.";
    }
} else {
    echo "Requisição inválida.";
}
?>
