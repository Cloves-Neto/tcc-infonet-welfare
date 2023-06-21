<?php
    include '../conexao.php';

    $especialidade = $_GET['especialidade'];

    $query = "SELECT nome_medico, crm 
            FROM medico
            WHERE especialidade=:especialidade
            ORDER BY nome_medico ASC";

            $result = $conexao->prepare($query);

            $data = ['especialidade' => $especialidade];
            
            $result->execute($data);

            $registro = $result->fetchAll(PDO::FETCH_ASSOC);

            foreach($registro as $option) {
                echo '<option value="'.$option['crm'].'">'.$option['nome_medico'].'</option>';
            }

?>