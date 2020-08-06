<?php

class DB{

    private static $server = 'localhost';
    private static $username = 'root';
    private static $password = '';
    private static $database = 'php_login';

    

    /*Funcion que retorna la conexión a la base de datos*/
    protected static function connect(){
        
        try{
            $conn = new PDO("mysql:host=". self::$server . ";
                            dbname=". self::$database,
                            self::$username,
                            self::$password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;

        } catch (PDOException $e){
            die('Error en la conexión: '.$e->getMessage());
        }     
    }

}

?>
