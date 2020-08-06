<?php
    include_once '../models/users.class.php';

    class UsersController extends User{

        //Método que hace uso del método heredado saveUsuario() para guardar la información en la base de datos
        public function guardarUsuario(){
            $this->saveUsuario();
        }

        //Método que obtiene un array con todos los usuarios del método heredado getUsuarios(), al cual se le hace echo y se lo transforma a formato JSON
        public static function obtenerUsuarios(){

            $json = self::getUsuarios();
            echo json_encode($json);
        }

        //Método que obtiene un array con el usuario al que corresponde el ID del método heredado getUsuario(), al cual se le hace echo y se lo transforma a formato JSON
        public static function obtenerUsuario($indice){

            $json = self::getUsuario($indice);
            echo json_encode($json);

        }

        //Método que hace uso del método heredado updateUsuario() para actualizar la información de un usuario en la base de datos
        public function actualizarUsuario($email, $password, $indice){

            $this->updateUsuario($email, $password, $indice);

        }

        //Método que hace uso del método heredado deleteUsuario() para eliminar el usuario al que le corresponda el ID
        public static function eliminarUsuario($indice){

            self::deleteUsuario($indice);

        }

    }

?>
