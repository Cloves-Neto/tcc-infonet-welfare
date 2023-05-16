<?php

    include_once('./class-mensagem.php'); //Envia as informações para a newClass processar as informações.

    $txtmensagem = $_POST['txtmensagem'];

    $classMsg = new Mensagem();

    $classMsg->setTxtmensagem($txtmensagem);


    /*Executar o metodo inserir*/
if(isset($_POST['salvar'])){
    if($classMsg->SalvaMensagem())
    {
        echo '
        <script> 
            alert("Inclusão executada com sucesso");
            function Redirect(){
                window.location.href="mensagem.php";
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
                window.location.href="mensagem.php";
            }
            setTimeout(Redirect(), 5000); 
        </script>
        ';
    }
}

?>

