<?php
// include_once('./a/conexao.php');


class Agenda{

// Busca médico

    public function(){
        
    }


// Data 
    public function dataCount(){
        // Inicio função datalist
        $inicio = new DateTime(); //chama a data atual é atualizada diariamente 
        $fim = new DateTime('+60 days'); // chama a data atual +1 ano de intervalo e retorna um array

        $periodo = new DatePeriod($inicio, new DateInterval('P1D'), $fim);
        $data = [];
        foreach($periodo as $item){
            $data[] = $item->format('d/m/Y');
        }
        return $data; 
    }






    // =======================================================

    public function SalvaMensagem(){
        
        $bd = new ConexaoBd();
        $conn = $bd->getconexao();
        $msg = $this->Mensagem;
        $query = "INSERT INTO salvamsg (msg) VALUES (?)";
        
        $stm = $conn->prepare($query);
        $stm->bindValue(1,$msg);

        $stm->execute();
        return $stm->rowCount();
    }

    public function ExcluiMensagem(){
        $bd = new ConexaoBd();
        $conn = $bd->getconexao();
        $msg = $this->Id;
        $query = "DELETE FROM salvamsg WHERE id_msg=?";
        
        $stm = $conn->prepare($query);
        $stm->bindValue(1,$msg);

        $stm->execute();
        return $stm->rowCount();        
    }

}




?>