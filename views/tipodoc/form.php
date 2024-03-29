<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear aprendiz</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo tipodocumento</h1>
        <form action="<?php echo constant('URL'); ?>tipodoc/crear" method="POST">

        <div class="row">

<div class="col">
     
            <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" name="id" id="id" required>
                <small id="idHelp" class="form-text text-muted">diligencie el documento de aprendiz</small>
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" required>
                <small id="descripcionHelp" class="form-text text-muted">diligencie el documento de aprendiz</small>
            </div>
          
         
            </div>
            
            

            <input type="submit" class="btn btn-primary" value="Crear tipo de documento">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>