<?php
    include_once '../models/tasks.class.php';

    class TasksController extends Task{

        //Método que hace uso del método heredado saveUsuario() para guardar la información en la base de datos
        public function guardarTarea(){
            $this->saveTarea();
        }

        //Método que obtiene un array con todos los usuarios del método heredado getUsuarios(), al cual se le hace echo y se lo transforma a formato JSON
        public static function obtenerTareas($userID){

            $json = self::getTareas($userID);
            echo json_encode($json);
        }

        //Método que obtiene un array con el usuario al que corresponde el ID del método heredado getUsuario(), al cual se le hace echo y se lo transforma a formato JSON
        public static function obtenerTarea($userID, $taskID){

            $json = self::getTarea($userID, $taskID);
            echo json_encode($json);

        }

        //Método que hace uso del método heredado updateUsuario() para actualizar la información de un usuario en la base de datos
        public static function actualizarTarea($indice, $title, $description){

            self::updateTarea($indice, $title, $description);

        }

        //Método que hace uso del método heredado deleteUsuario() para eliminar el usuario al que le corresponda el ID
        public static function eliminarTarea($indice){

            self::deleteTarea($indice);

        }

    }

?>