<?php





if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']) ){
    // Acessa
    include_once('conexaoDb.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE email = '$usuario' and senha = '$senha'";

    $resultado = $conexao->query($sql);


    if(mysqli_num_rows($resultado) < 1){
        // print_r('Não existe');
        // echo 'Usuario ou senha errado';
        header('Location: index.html');
    }
    else{
        // print_r('Existe');
        header('Location: home.html');
    }

}   
else{
    // Não acessa
    header('Location: index.html');
}



?>