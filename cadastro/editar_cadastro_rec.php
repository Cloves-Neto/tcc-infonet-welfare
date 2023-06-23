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
        $email = $user_data['email_paciente'];
        $contato_paciente = $user_data['contato_paciente'];
        $dt_nascimento_paciente = $user_data['dt_nascimento_paciente'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_paciente = $_POST['nome_paciente'] ?? '';
    $email = $_POST['email_paciente'] ?? '';
    $contato_paciente = $_POST['contato_paciente'] ?? '';
    $dt_nascimento_paciente = $_POST['dt_nascimento_paciente'] ?? '';

    $sqlUpdate = "UPDATE paciente SET nome_paciente = :nome_paciente, email_paciente = :email, contato_paciente = :contato_paciente, dt_nascimento_paciente = :dt_nascimento_paciente WHERE cpf_paciente = :cpf_paciente";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bindParam(':nome_paciente', $nome_paciente);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contato_paciente', $contato_paciente);
    $stmt->bindParam(':dt_nascimento_paciente', $dt_nascimento_paciente);
    $stmt->bindParam(':cpf_paciente', $cpf_paciente);

    if ($stmt->execute()) {
        echo"<script>
            alert('Alteração bem sucedida!');
            setTimeout(() => {
                window.location.href = 'http://localhost/welfare/cadastro/cadastrarpac_rec.php';
            }, 1000);
        </script>";
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
    <style>
        @import url('../var.css');
        body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: aliceblue;
        }
        .granbox{
            width: 100%;
            max-width: 1440px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .granbox form{
            width: 500px;
            height: 650px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            gap: 20px;
            padding: 15px;
            border: solid 2px var(--corPrincipal);
        }
        .granbox form .row{
            width: 100%;
            gap: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .granbox form .row label{
            display: flex;
            flex-direction: column;
            width: 60%;
            height: 40px;
            font-size: 1.2rem;
            gap: 10px;
            color: var(--corSuporte);
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .granbox form .row label input{
            border: none;
            border-bottom: solid 2px var(--corPrincipal);
            width: 100%;
            height: 30px;
            padding: 5px;
            outline: none;
            color: var(--corPrincipal);
        }
        input[type="submit"]{
            width: 200px;
            height: 60px;
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 30px;
            border-radius: 10px;
            letter-spacing: 2px;
            background-color: white;
            border: solid 2px orangered;
            color: orangered;
            transition: .2s ease-in-out;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background-color: orangered;
            color: white;
            transition: .2s ease-in-out;
        }
        input[type="date"]{
            padding: 10px !important;
        }
    </style>
</head>
<body>
    <div class="granbox">
        <form method="post">
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

                <label for="email_paciente">
                    Email
                    <input type="email" id="email_paciente" name="email_paciente" value="<?php echo $email ?>">
                </label>
                <label for="contato_paciente">
                    Contato
                    <input type="text" id="contato_paciente" name="contato_paciente" value="<?php echo $contato_paciente ?>">
                </label>
            </div>
            
            <input type="submit" id="alterar" class="alterar" name="alterar" value="Alterar">
        </form>
    </div>
</body>
</html>
