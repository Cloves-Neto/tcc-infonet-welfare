<?php

include_once 'modalRegistro.php';

$nome_funcionario=filter_input(INPUT_GET,'nome_funcionario');
$email_funcionario=filter_input(INPUT_GET,'email_funcionario');
$cpf_funcionario=filter_input(INPUT_GET,'cpf_funcionario');
$cargo_funcionario=filter_input(INPUT_GET,'cargo_funcionario');
$senha_funcionario=filter_input(INPUT_GET,'senha_funcionario');

$Prod = new Prod();
//instanciando as classes e puxando os valor dentro do arquivo pegando a informação da variavel e jogando dentro do objeto Aluno
$Prod->setcodprod($codprod);
$Prod->setdescr($descr);
$Prod->setvenc($venc);
$Prod->setvalor($valor);

//metodo de inserção
if(isset($_GET["inserir"]))
{
    if($Prod->inserir())//executando o metodo inserir
    {
        echo 'Inclusao executado com sucesso';
    }
    else
    {
        echo 'Erro na inclusao, refazer a operação';
    }
}
?>