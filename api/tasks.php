<?php

    //echo 'Informacion: ' . file_get_contents('php://input');
    header("Content-Type: application/json");
    include_once ("../controllers/taskscontroller.class.php");
    
    //Recibir peticiones del usuario

    switch($_SERVER['REQUEST_METHOD']){

        case 'POST': //Guardar
            $_POST = json_decode(file_get_contents('php://input'), true);
            $usuario = new TasksController($_POST['uid'], $_POST['title'], $_POST['description']);
            $usuario->guardarTarea();
            $resultado['mensaje'] = "Guardar tarea, informacion: ". json_encode($_POST);
            echo json_encode($resultado);
        break;
        case 'GET':
            if(isset($_GET['id']) && isset($_GET['uid'])){
                TasksController::obtenerTarea($_GET['id'], $_GET['uid']);
            } elseif(isset($_GET['id'])){
                TasksController::obtenerTareas($_GET['id']);
            }
        break;
        case 'PUT':
            $_PUT = json_decode(file_get_contents('php://input'), true);
            TasksController::actualizarTarea($_GET['id'], $_PUT['title'], $_PUT['description']);
            $resultado['mensaje'] = "Actualizar una tarea con el id: " .$_GET['id'].
                                    ", Informacion a actualizar: ".json_encode($_PUT);
            echo json_encode($resultado);
        break;
        case 'DELETE':
            TasksController::eliminarTarea($_GET['id']);
            $resultado['mensaje'] = "Eliminar una tarea con el id: ".$_GET['id'];
            echo json_encode($resultado);
        break;
        
    }


?>