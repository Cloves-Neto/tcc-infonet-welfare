<?php
require_once '../conexao.php';

$id_cargo = $_GET['id_cargo'] ?? '';

$cargo_funcionario = "";


if (!empty($id_cargo)) {
    $sqlSelect = "SELECT * FROM cargo WHERE id_cargo = :id_cargo";
    $stmt = $conexao->prepare($sqlSelect);
    $stmt->bindParam(':id_cargo', $id_cargo);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $cargo_funcionario = $user_data['cargo_funcionario'];

    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cargo_funcionario = $_POST['cargo_funcionario'] ?? '';

    $sqlUpdate = "UPDATE cargo SET cargo_funcionario = :cargo_funcionario";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bindParam(':cargo_funcionario', $cargo_funcionario);


    if ($stmt->execute()) {
        header('Location: cargo.php');
    } else {
        echo "Erro ao atualizar os dados.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welfare | Editar Cadastro</title>
</head>
<body>
    <div class="container">
        <form method="post" action="">
            <div class="row">
                <label for="nome_paciente">
                    Cargo
                    <input type="text" id="cargo_funcionario" name="cargo_funcionario" value="<?php echo $cargo_funcionario ?>">
                </label>
           
            <br><br>
            <input type="submit" id="alterar" class="alterar" name="alterar" value="Alterar">
        </form>
    </div>
</body>
</html>
