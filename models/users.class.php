<?php

include './database/db.php';

class Users extends Db{
    
    /*Función que retorna $_POST */
    protected function getUser(){


        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $records = $this->connect()->prepare('SELECT id, email, password FROM usuario WHERE email=:email');
            $records->bindParam(':email', $_POST['email']);
            $records->execute(); 
            $results = $records->fetch(PDO::FETCH_ASSOC);
            if(!empty($results) && password_verify($_POST['password'], $results['password'])){
                $_SESSION['user_id'] = $results['id'];
                header('Location: /php-login');
            } else{
                return false;
            }
        }

        return $_POST;
    }

}

?>