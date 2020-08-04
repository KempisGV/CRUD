<?php
    include 'views/tasksview.class.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form class="container"  method="post">
        <div class="form-group">
            <label for="correo_login">Correo electrónico</label>
            <input type="email" name="email"class="form-control" id="correo_login" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password_login">Contraseña</label>
            <input type="password" name="password"class="form-control" id="password_login">
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </form>

    <?php
        $prueba = new TasksView();
        $prueba->showTasks();
    ?>


</body>
</html>