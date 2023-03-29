<?php
    
    include_once("conexao.php");
    // Editar
    if(!empty($_GET['id'])){
    
        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM paciente WHERE id_paciente=$id";
        $result = $conn->query($sqlSelect);
    
        if($result->num_rows > 0)
            {
                $SqlDelete = "DELETE FROM paciente WHERE id_paciente=$id";
                $resultDelete = $conn->query($SqlDelete);

            
            }
        }
    
    header('Location: cadastro.php');