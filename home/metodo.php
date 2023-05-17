<?php
include_once('../a/conexao.php');

$metodo = $_POST['metodo'];


switch($metodo){

    case 'Listar_msg':

        $bd = new ConexaoBd();
        $pdo = $bd->getconexao(); 

        $query = "SELECT * FROM salvamsg"; //query para ser executada no bd (substitui o valor do email teste pelo $SESSION['email_funcionario'])

        $buscamsg = $pdo->prepare($query); // prepara a query criada para ser executada

        $buscamsg->execute(); // executa a query preparada diretamente com o metodo de conexao da class

        $msg_data = $buscamsg->fetch(PDO::FETCH_ASSOC); // retorna os dados em array pela funcão 'fetch-ASSOC'  

        while($msg_data){
            echo'
            <div class="carousel-item msgCard">
                <p>'.$msg_data['msg'].'</p>
            </div>';
        }

    break;
}


?>