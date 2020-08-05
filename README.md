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
