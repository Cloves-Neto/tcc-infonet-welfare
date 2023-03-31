<?php
    include_once ("../welfare1.1/conexao.php");

    if(isset($_POST[enviar]))
    {

        $email_funcionario = $msqli->escape_string($_POST['email_funcionario']);

        if(!filter_var($email_funcionario, FILTER_VALIDATE_EMAIL))
        {
            $erro[] = "E-mail inválido";
            
        }

        $sql_code = "SELECT senha_funcionario FROM funcionario WHERE email_funcionario = '$email_funcionario'";
        $sql_query = $mysqli->query($sql_code) or die ($msqli->error);
        $dado = $sql_query->$fetch_assoc();
        $valid = $sql_query->numrows;

        if($total == 0)
            $erro[] = "O Email informado não existe";

        if(count($erro) == 0 && $valid > 0)
        {
            $novasenha = subtr(md5(time()), 0, 6);
            $nscriptografada = md5(md5($novasenha));

            if(mail($email_funcionario, "Sua nova senha" , "Sua nova senha: ". $novasenha))
            {
                $sql_code = "UPDATE "
            }
        };
    };
?>

