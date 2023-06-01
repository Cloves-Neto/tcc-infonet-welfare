<?php

// Formatos para trabalhar com a data:
$today = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm
$today = date("m.d.y"); // 03.10.01
$today = date('\i\t \i\s \t\h\e jS \d\a\y.'); // it is the 10th day.
$today = date("D M j G:i:s T Y"); // Sat Mar 10 17:16:18 MST 2001



// Inicio função datalist
$inicio = new DateTime(); //chama a data atual é atualizada diariamente 
$fim = new DateTime('+1 year'); // chama a data atual +1 ano de intervalo e retorna um array

$periodo = new DatePeriod($inicio, new DateInterval('P1D'), $fim);
$validos = [];
foreach($periodo as $item){

    if(substr($item->format("D"), 0, 1) != 'S'){
        $validos[] = $item->format('d/m/Y');
    }
}


echo "<pre>";
print_r($validos); // para printar os dados do array em uma parte do html chama a $validos[posição do item];



?>