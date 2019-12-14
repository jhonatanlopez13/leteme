<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Registro Instructor</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Registrar usuario</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>usuario/crear" method="POST">

            <div class="form-group">
                <label for="username"> usuario</label>
                <input type="text" class="form-control" name="username" id="username">
                <small id="usernameHelp" class="form-text text-muted">Diligencie el username</small>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <small id="emailHelp" class="form-text text-muted">Ingrese email</small>
            </div>

            <div class="form-group">
                <label for="contrasena">contraseña</label>
                <input type="text" class="form-control" name="contrasena" id="contrasena">
                <small id="contrasenaHelp" class="form-text text-muted">Ingrese contrasena</small>
    

            <input type="submit" class="btn btn-primary" value="Crear Instructor">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>