<?php
include_once('conexao.php');
// Editar
if(!empty($_GET['id'])){

    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM paciente WHERE id_paciente=$id";
    $result = $conn->query($sqlSelect);

    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome_paciente'];
            $email = $user_data['email'];
            $cpf = $user_data['cpf_paciente'];
            $dtnas = $user_data['dt_nascimento_paciente'];
            $tel = $user_data['contato_paciente'];
            $cep = $user_data['cep_paciente'];
        
        }
        print_r($nome);
    }else{
        header('location: cadastro.php');
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

        <form  method="post">
           <div class="row">
                <label for="">
                    Nome
                    <input type="text" id="nome" name="nome" value="<?php echo $nome?>">
                </label>
                <label for="">
                    Cpf
                    <input type="number" id="cpf" name="cpf" value="<?php echo $cpf?>">
                    <!-- <small>Digite o cpf sem ponto e sem traço</small> -->
                </label>
                <label for="">
                    Dt Nascimento
                    <input type="date" id="dtnas" name="dtnas" value="<?php echo $dtnas?>">
                </label>
           </div>
           
           <div class="row">
                <label for="">
                    Email
                    <input type="email" id="email" name="email" value="<?php echo $email?>">
                </label>
                <label for="">
                    Telefone
                    <input type="tel" id="tel" name="tel" value="<?php echo $email?>">
                </label>
                <label for="">
                    Cep
                    <input type="number" id="cep" name="cep" value="<?php echo $cep?>">
                </label>
           </div>
           
           <br><br>
           <input type="submit" id="alterar" class="alterar" name="alterar" value="alterar" >
        </form>

    </div>
</body>
</html>


<!-- FUNÇÃO DE ALTERAR DADAOS  -->

