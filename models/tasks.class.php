<?php

    include_once("../database/db.php");

    class Task extends DB{

        private $uid;
        private $title;
        private $description;

        public function __construct($uid, $title, $description)
        {
            $this->uid = $uid;
            $this->title = $title;
            $this->description = $description;
        }

        protected function getTitle(){
            return $this->title;
        }

        protected function getDescription(){
            return $this->description;
        }

        protected function getUID(){
            return $this->uid;
        }

        protected function setTitle($title){
            $this->title = $title;
        }

        protected function setDescription($description){
            $this->description = $description;
        }

        protected function setUID($uid){
            $this->uid = $uid;
        }

        //CRUD

        //Método encargado de guardar tareas en la base de datos
        protected function saveTarea(){
            
            $query = "INSERT INTO tarea(uid, title, description) VALUES(?, ?, ?)";
            $records = $this->connect()->prepare($query);
            $records->execute([$this->uid, $this->title, $this->description]);

        }

        //Metodo que realiza query a la base de datos y obtiene todas las tareas del usuario especificado por su ID y los guarda en un array
        protected static function getTareas($userID){

            $records = self::connect()->prepare('SELECT tarea.title, tarea.description FROM tarea JOIN usuario ON usuario.id=tarea.uid WHERE usuario.id=?');
            $records->execute([$userID]); 
            $results =  $records->fetchAll();
    
            $json_array = array();
    
            if(!empty($results)){
    
                foreach($results as $row){
                    $json_array[] = $row;
                }
    
            } else{
                return false;
            }
            
    
            return  $json_array;
        }


        //Método que se encarga de obtener la tarea del usuario con el ID que se envía, se obtiene como resultado una variable con sus datos
        protected static function getTarea($userID, $taskID){
            
            $query = 'SELECT tarea.title, tarea.description FROM tarea JOIN usuario ON usuario.id=tarea.uid WHERE usuario.id=? AND tarea.id=?';
            $records = self::connect()->prepare($query);
            $records->execute([$userID, $taskID]); 
            $results = $records->fetchAll();
    
            if(!empty($results)){
    
                foreach($results as $row){
                    $json = $row;
                }
                    
                return $json;

            } else{
                return false;
            }
            
        }

        //Método que actualiza la información de una tarea en la base de datos identificado por su ID
        protected static function updateTarea($indice, $title, $description){


            $query = "UPDATE tarea SET title = ?, description= ? WHERE id = ?";
            $records = self::connect()->prepare($query);
            $records->execute([$title, $description, $indice]);

        }

        //Método que elimina una tarea de la base de datos indentificado por su ID
        protected static function deleteTarea($indice){
            
            $query = "DELETE FROM tarea WHERE id=?";
            $records = self::connect()->prepare($query);
            $records->execute([$indice]);

        }
    }

?>