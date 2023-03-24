<?php

$login = $_GET["usuario"];
$senha = $_GET["senha"];


//simula retorno do bd
$LoginBD = '4002';
$SenhaBD = '8922';


if($login == $LoginBD && $senha == $SenhaBD){
   $retorno =  1;
}
else{
    $retorno = 0;   
}
echo $retorno;
?>