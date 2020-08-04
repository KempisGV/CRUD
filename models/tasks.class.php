<?php

include './database/db.php';

class Tasks extends Db{
    
    private $records;
    private $results;
    private $json_array = array();
    /*Función que retorna JSON con las tareas del usuario */
    protected function getTasks(){


        if (!empty($_POST['email']) && !empty($_POST['password'])){
            /*$this->records = $this->connect()->prepare('SELECT id, email, password FROM usuario WHERE email=:email');*/
            $this->records = $this->connect()->prepare('SELECT tarea.title, tarea.description FROM tarea JOIN usuario ON usuario.id=tarea.uid WHERE usuario.email=:email');
            $this->records->bindParam(':email', $_POST['email']);
            $this->records->execute(); 
            $this->results = $this->records->fetchAll();

            /*Si $results no está vacío se crea un array con formato json con los valores que guarda $temp*/
            if(!empty($this->results)){
                
                foreach($this->results as $row){
                    $this->json_array[] = $row;
                }

            } else{
                return false;
            }
        }

        return  $this->json_array;
    }

}

?>
