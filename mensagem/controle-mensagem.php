<?php
    
    $mensagem = $_POST['mensagem'];
    $conn = $conn = mysqli_connect('localhost', 'root', '', 'sistema_welfare');
    $sqlSelect = "INSERT INTO `salvamsg`(`msg`) VALUES (`$mensagem`)";

    echo"
    <script>
        alert ('Mensagem inserida com sucesso!')
    </script>";

?>