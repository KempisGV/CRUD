# CRUD
Aplicación web con formato CRUD haciendo uso de una API implementada en POO utilizando php y el MVC

## 08/04/2020
* Se implementó método que retorna array con formato json, sin embargo, no se están guardando todas filas que debería mostrar la consulta.

## 08/04/2020 18:24
* Se corrigió el error que se encontraba en 'models/tasks.class.php', ahora el método showTasks() retorna correctamente el JSON con las tareas.

## 08/04/2020 18:39
* Se realizaron cambios en parametros de la conexión en'database/db.php' y por consecuente se eliminó el parametro PDO::FETCH_ASSOC en fetchAll() de         'models/tasks.class.php'.

## 08/04/2020 19:55
* Se editó la clase 'models/tasks.class.php', eliminando sus propiedades y modificando el método getTasks(), así mismo se agregaron los métodos getUID() y setTask().
* En la clase 'controllers/taskscontroller.class.php' se agregó el método createTask()
* Se agregó en 'index.php' un objeto de la clase TasksController para crear una nueva tarea

## 08/05/2020 21:46
* Se cambió totalmente la API, ahora trabaja con los métodos POST, GET, DELETE, PUT. Todos estos métodos pueden ser utilizados en la tabla de usuarios de la base de datos.
* Todas las respuestas de la API son en JSON.
* Futura implementación de la API para las tareas de los usuarios.
* Falta implementar namespace y composers.

## 08/05/2020 22:25
* Se modificó la el método getUsuario() de la clase Usuario en 'models/usuario.class.php'

## 08/06/2020 12:21
* Se implementaron en la API los modelos, controladores y demás archivos referentes a las tareas del Usuario. Permitiendo poder utilizar los métodos POST, GET, DELETE y PUT para cumplir su respectiva función.
* Se modificó el nombre de las clases y archivos, cambiándolos al Ingles.
* Falta implementar namespace y composers.

## 08/06/2020 16:09
* Se agregron varios headers a los archivos 'api/tasks.php' y 'api/users.php' con la finalidad de poder hacer uso de la API
* Los headers agregados fueron:
    * header('Access-Control-Allow-Origin: *');
    * header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    * header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    * header('content-type: application/json; charset=utf-8');

