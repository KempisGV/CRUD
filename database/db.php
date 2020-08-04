<?php

class Db{

    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'php_login';

    

    /*Funcion que retorna la conexión a la base de datos*/
    protected function connect(){
        
        try{
            $conn = new PDO("mysql:host=$this->server;
                            dbname=$this->database",
                            $this->username,
                            $this->password);
            return $conn;
        } catch (PDOException $e){
            die('Error en la conexión: '.$e->getMessage());
        }     
    }

}

?>