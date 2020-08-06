<?php

    include_once("../database/db.php");

    class User extends DB{

        private $email;
        private $password;

        public function __construct($email, $password)
        {
            $this->email = $email;
            $this->password = $password;
        }

        protected function getEmail(){
            return $this->email;
        }

        protected function getPassword(){
            return $this->password;
        }

        protected function setEmail($email){
            $this->email = $email;
        }

        protected function setPassword($password){
            $this->password = $password;
        }

        //CRUD

        //Método encargado de guardar usuarios en la base de datos
        protected function saveUsuario(){

            $query = "INSERT INTO usuario(email, password) VALUES(?, ?)";
            $records = self::connect()->prepare($query);
            $records->execute([$this->email, $this->password]);

            /*IGNORAR ESTO
            $contenidoArchivo = file_get_contents("../data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo, true);
            $usuarios[] = array(
                "email"=>$this->email,
                "password"=>$this->password
            );
            $archivo = fopen("../data/usuarios.json", "w");
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);
            */
        }

        //Metodo que realiza query a la base de datos y obtiene todos los usuarios y los guarda en un array
        protected static function getUsuarios(){

            $records = self::connect()->prepare('SELECT * FROM usuario');
            $records->execute(); 
            $results =  $records->fetchAll();
    
            $json_array = array();
    
            if(!empty($results)){
    
                foreach($results as $row){
                    $json_array[] = $row;
                }
                    
                return $json_array;

            } else{
                return false;
            }
            
            //IGNORAR ESTO
            //$contenidoArchivo = file_get_contents("../data/usuarios.json");
            //echo $contenidoArchivo;
        }

        //Método que se encarga de obtener el usuario con el ID que se envía, se obtiene como resultado un array con sus datos
        protected static function getUsuario($indice){
            
            $records = self::connect()->prepare('SELECT * FROM usuario WHERE id=?');
            $records->execute([$indice]); 
            $results =  $records->fetchAll();
    
            if(!empty($results)){
    
                foreach($results as $row){
                    $json = $row;
                }
                    
                return $json;

            } else{
                return false;
            }
            
            
            //IGNORAR ESTO
            /*$contenidoArchivo = file_get_contents("../data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo, true);
            echo json_encode($usuarios[$indice]);*/
        }

        //Método que actualiza la información de un usuario en la base de datos identificado por su ID
        protected function updateUsuario($email, $password, $indice){


            $query = "UPDATE usuario SET email = ?, password= ? WHERE id = ?";
            $records = $this->connect()->prepare($query);
            $records->execute([$email, $password, $indice]);

            
            /*//IGNORAR ESTO
            $contenidoArchivo = file_get_contents("../data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo, true);
            //$usuario = ($usuarios[$indice]);
            $usuario = array(
                "email"=>$this->email,
                "password"=>$this->password
            );
            $usuarios[$indice] = $usuario;
            $archivo = fopen("../data/usuarios.json" , "w");
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);*/
        }

        //Método que elimina un usuario de la base de datos indentificado por su ID
        protected static function deleteUsuario($indice){
            
            $query = "DELETE FROM usuario WHERE id=?";
            $records = self::connect()->prepare($query);
            $records->execute([$indice]);

            //IGNORAR ESTO
            /*$contenidoArchivo = file_get_contents("../data/usuarios.json");
            $usuarios = json_decode($contenidoArchivo, true);
            array_splice($usuarios, $indice, 1);

            $archivo = fopen("../data/usuarios.json" , "w");
            fwrite($archivo, json_encode($usuarios));
            fclose($archivo);*/
        }

    }
?>
