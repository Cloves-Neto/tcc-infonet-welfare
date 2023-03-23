<?php


class conexao
{
    private static $instancia;

    public static function getconexao()
    {
        //a exclamação funciona como uma negação
        //Self é a estrutura da classe
        //dbname = database nome
        if(!isset(self::$instancia))
        {
            self::$instancia = new PDO('mysql:host=localhost;dbname=sistema_welfare;charset=utf8', 'root', '');
             //=PDO=Classe que faz conexão com o banco de dados
            return self::$instancia;
        }
        else
        {
            return self::$instancia;
        }
    }
}

?>