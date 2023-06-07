<?php
// include_once('./a/conexao.php');


class Agenda{

    






    public function dataCount(){
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

        return $validos; // para printar os dados do array em uma parte do html chama a $validos[posição do item];
    }

}




?>