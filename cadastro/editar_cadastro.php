<?php
require_once '../conexao.php';

$cpf_paciente = $_GET['cpf_paciente'] ?? '';

$nome_paciente = "";
$email = "";
$contato_paciente = "";
$dt_nascimento_paciente = "";

if (!empty($cpf_paciente)) {
    $sqlSelect = "SELECT * FROM paciente WHERE cpf_paciente = :cpf_paciente";
    $stmt = $conexao->prepare($sqlSelect);
    $stmt->bindParam(':cpf_paciente', $cpf_paciente);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome_paciente = $user_data['nome_paciente'];
        $email = $user_data['email'];
        $contato_paciente = $user_data['contato_paciente'];
        $dt_nascimento_paciente = $user_data['dt_nascimento_paciente'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_paciente = $_POST['nome_paciente'] ?? '';
    $email = $_POST['email'] ?? '';
    $contato_paciente = $_POST['contato_paciente'] ?? '';
    $dt_nascimento_paciente = $_POST['dt_nascimento_paciente'] ?? '';

    $sqlUpdate = "UPDATE paciente SET nome_paciente = :nome_paciente, email = :email, contato_paciente = :contato_paciente, dt_nascimento_paciente = :dt_nascimento_paciente WHERE cpf_paciente = :cpf_paciente";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bindParam(':nome_paciente', $nome_paciente);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contato_paciente', $contato_paciente);
    $stmt->bindParam(':dt_nascimento_paciente', $dt_nascimento_paciente);
    $stmt->bindParam(':cpf_paciente', $cpf_paciente);

    if ($stmt->execute()) {
        header('Location: cadastrarpac_rec.php');
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
                    Nome
                    <input type="text" id="nome_paciente" name="nome_paciente" value="<?php echo $nome_paciente ?>">
                </label>
                <label for="cpf_paciente">
                    CPF
                    <input type="text" id="cpf_paciente" name="cpf_paciente" value="<?php echo $cpf_paciente ?>" readonly>
                </label>
                <label for="dt_nascimento_paciente">
                    Data de Nascimento
                    <input type="date" id="dt_nascimento_paciente" name="dt_nascimento_paciente" value="<?php echo $dt_nascimento_paciente ?>">
                </label>
            </div>
           
            <div class="row">
                <label for="email">
                    Email
                    <input type="email" id="email" name="email" value="<?php echo $email ?>">
                </label>
                <label for="contato_paciente">
                    Contato
                    <input type="text" id="contato_paciente" name="contato_paciente" value="<?php echo $contato_paciente ?>">
                </label>
            </div>
           
            <br><br>
            <input type="submit" id="alterar" class="alterar" name="alterar" value="Alterar">
        </form>
    </div>
</body>
</html>
