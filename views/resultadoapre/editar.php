<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar Programa</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        
        <h1 class="center"><?php echo strtoupper($this->resultadoapre->id); ?></h1>
        <div><?php echo $this->mensaje; ?></div>
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo constant('URL'); ?>resultadoapre/editar/" method="POST">

            <div class="form-group">
                <label for="id"> id</label>
                <input style="background: #dddddd; font-size:16px;" type="text" class="form-control" value="<?php echo $this->resultadoapre->id; ?>" name="id" id="id" readonly>
            </div>

            <div class="form-group">
                <label for="instructor_documento">Documento Instructor</label>
                <input type="text" class="form-control" name="instructor_documento" id="instructor_documento" value="<?php echo $this->resultadoapre->instructor_documento; ?>" >
       
            </div>

            <div class="form-group">
                <label for="nombre">Descripción Resultado</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $this->resultadoapre->nombre; ?>">
          </div>
           
        	<div class="form-group">
            <label for="horas_directas">Horas Resultado</label>
            <input type="number" class="form-control" name="horas_directas" id="horas_directas" value="<?php echo $this->resultadoapre->horas_directas; ?>">
            </div>

                <input type="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar aprendizaje" >
                <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/resultadoapre")' value="Cancelar">
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>