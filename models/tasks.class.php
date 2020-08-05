<?php

include './database/db.php';

class Tasks extends Db{
    
    /*Función que retorna JSON con las tareas del usuario */
    protected function getTasks(){

        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $records = $this->connect()->prepare('SELECT tarea.title, tarea.description FROM tarea JOIN usuario ON usuario.id=tarea.uid WHERE usuario.email=:email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute(); 
            $results =  $records->fetchAll();

            $json_array = array();

            /*Si $results no está vacío se crea un array con formato json con los valores que guarda $temp*/
            if(!empty($results)){

                foreach($results as $row){
                    $json_array[] = $row;
                }

            } else{
                return false;
            }
        }

        return  $json_array;
    }

    protected function getUID(){

        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $query = 'SELECT id FROM usuario WHERE email=:email';
            $records = $this->connect()->prepare($query);
            $records->bindParam(':email', $_POST['email']);
            $records->execute(); 
            $results = $records->fetchAll();

        } else{
            return false;
        }

        return  $results[0]['id'];

    }

    /*Función que hace INSERT de nueva tarea*/
    protected function setTask($uid, $title, $description){

        $query = "INSERT INTO tarea(uid, title, description) VALUES(?, ?, ?)";
        $records = $this->connect()->prepare($query);
        $records->execute([$uid, $title, $description]);

    }

}
?>
