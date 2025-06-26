<?php

/*
* Classe do banco de dados
*/

Class Database
{
    public static $con;

    public function __construct()
    {
        try{

            $string = DB_TYPE . ":host=". DB_HOST .";dbname=".DB_NAME;
            self::$con = new PDO($string,DB_USER,DB_PASS);

        }catch (PDOException $e){

            die($e->getMessage());
        }
    }   

    public static function getInstance()
    {
        if(self::$con){

            return self::$con;
        }

         return $instance = new self();
    }

    /*
    * Metodo leitura do banco de dados
    */

    public function read($query, $data = array())
    {
        //preparando a consulta query
        $stm = self::$con->prepare($query);
        // execute a query
        $result = $stm->execute($data);
        //se executar
        if($result){
            //busca os dados na tabela
            $data = $stm->fetchAll(PDO::FETCH_OBJ);
            //valide os dados da matriz
            if(is_array($data))
            {
                 //retorna os dados se estiver bem
                 return $data;
            }
        }
                 //não retorna dados senão estiver
                 return false;
    }

    /*
    * Metodo escrita do banco de dados
    */
    public function write($query, $data = array())
    {
        //preparando a consulta query
        $stm = self::$con->prepare($query);
        // execute a query
        $result = $stm->execute($data);
        //se executar
        if($result){
                 //os dados estão bem
                 return true;
            }
                 //não retorna dados senão estiver
                 return false;
    }
}


