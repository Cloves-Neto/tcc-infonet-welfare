<?php

include_once('./registro/conexao.php');

$senha_funcionario = password_hash($_POST['senha_funcionario'], PASSWORD_DEFAULT);

$sql = "SELECT id_funcionario, nome_funcionario, email_funcionario, senha_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario'";
$resultado = $conn->query($sql);
if(mysqli_num_rows($resultado) > 0)
{
    $linha = mysqli_fetch_assoc($resultado);
    if(password_verify($_POST['senha_funcionario'], $linha['senha_funcionario'])) {
        
        header("./home/home.php");
    } else {
        header("./index.php");
    }

} else {
    header("./index.php");
}

?>