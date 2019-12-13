<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>crear aprendizaje</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Registro de Resultado de Aprendizaje</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>resultadoapre/crear" method="POST">
            <!-- <div class="form-group">
                <label for="nroprograma">Nro Programa</label>
                <input type="text" class="form-control" name="nroprograma" id="nroprograma">
                <small id="nroprogramaHelp" class="form-text text-muted">Ingrese el número del programa</small>
            </div> -->

           <!-- <div class="form-group">
                <label for="id">Id</label>
                <input type="numb" class="form-control" name="id" id="id">
            </div>-->

            <div class="form-group">
                <label for="instructor_documento">Documento Instructor</label>
                <input type="text" class="form-control" name="instructor_documento" id="instructor_documento" >
       
            </div>

            <div class="form-group">
                <label for="nombre">Descripción Resultado</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
          </div>
           
        	<div class="form-group">
            <label for="horas_directas">Horas Resultado</label>
            <input type="number" class="form-control" name="horas_directas" id="horas_directas">
            </div>
            
            <input type="submit" class="btn btn-primary btn-sm btn-block" value="guardar" >
            <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/registroapre/index")' value="Cancelar">

        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>