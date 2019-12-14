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
        <h1 class="center">editar tipodocumento</h1>
        <form action="<?php echo constant('URL'); ?>tipodoc/editar" method="POST">

        <div class="row">

<div class="col">
     
            <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" readonly name="id" id="id" value="<?php echo $this->tipodoc->id; ?>">
     
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $this->tipodoc->descripcion; ?>">
                <small id="descripcionHelp" class="form-text text-muted">diligencie el documento de aprendiz</small>
            </div>
          
         
            </div>
            
            <input type="submit" class="btn btn-primary" value="guardar">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>