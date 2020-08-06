<?php

    //echo 'Informacion: ' . file_get_contents('php://input');
    header("Content-Type: application/json");
    include_once ("../controllers/userscontroller.class.php");
    
    //Recibir peticiones del usuario

    switch($_SERVER['REQUEST_METHOD']){

        case 'POST': //Guardar
            $_POST = json_decode(file_get_contents('php://input'), true);
            $usuario = new UsersController($_POST['email'], $_POST['password']);
            $usuario->guardarUsuario();
            $resultado['mensaje'] = "Guardar usuario, informacion: ". json_encode($_POST);
            echo json_encode($resultado);
        break;
        case 'GET':
            if(isset($_GET['id'])){
                UsersController::obtenerUsuario($_GET['id']);
            } else{
                UsersController::obtenerUsuarios();
            }
        break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'), true);
            $usuario = new UsersController($_PUT['email'], $_PUT['password']);
            $usuario->actualizarUsuario($_PUT['email'], $_PUT['password'], $_GET['id']);
            $resultado['mensaje'] = "Actualizar un usuario con el id: " .$_GET['id'].
                                    ", Informacion a actualizar: ".json_encode($_PUT);
            echo json_encode($resultado);
        break;
        case 'DELETE':
            UsersController::eliminarUsuario($_GET['id']);
            $resultado['mensaje'] = "Eliminar un usuario con el id: ".$_GET['id'];
            echo json_encode($resultado);
        break;
        
    }


?>
