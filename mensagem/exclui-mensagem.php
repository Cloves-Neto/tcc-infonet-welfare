<?php

include_once('./class-mensagem.php'); //Envia as informações para a newClass processar as informações.

$idmensagem = $_GET['id'];

$classMsg = new Mensagem();

$classMsg->setIdmensagem($idmensagem);


if(!empty($idmensagem))
{

    if($classMsg->ExcluiMensagem())
    {
        echo '
        <script> 
            alert("Exclusão executada com sucesso");
            function Redirect(){
                window.location.href="./mensagem.php";
            }
            setTimeout(Redirect(), 5000); 
        </script>
        ';
    }

    else
    {
        echo '
        <script> 
            alert("Erro de operção, tente novamente!");
            function Redirect(){
                window.location.href="./mensagem.php";
            }
            setTimeout(Redirect(), 5000); 
        </script>
        ';
    }
    
}



?>