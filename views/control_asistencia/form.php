<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear registro</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo registro</h1>
        <form action="<?php echo constant('URL'); ?>control_asistencia/crear" method="POST">

        <div class="row">

<div class="col">
<div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control" name="id" id="id"required>
             <small id="idHelp" class="form-text text-muted">Diligencie id</small>
                            </div>
        <div class="form-group">
                <label for="documento_aprendiz">documento aprendiz</label>
                <select class="custom-select" id="documento_aprendiz" name="documento_aprendiz">
                <option selected value="">seleccione...</option>
               
                <?php
            include_once 'models/aprendiz.php';
            if(count($this->ddl_aprendices)>0){
                foreach ($this->ddl_aprendices as $aprendiz) {
                    $ddl_aprendiz = new aprendizDAO();
                    $ddl_aprendiz = $aprendiz;
        ?> 
         <option selected value="<?php echo $ddl_aprendiz->documento; ?>"><?php echo $ddl_aprendiz->nombres; ?></option>
         <?php
                } }
         ?>
               </select>
            </div>


            <div class="form-group">
                <label for="documento_instructor">documento instructor</label>
                <select class="custom-select" id="documento_instructor" name="documento_instructor">
                <option selected value="">seleccione...</option>
               
                <?php
            include_once 'models/instructor.php';
            if(count($this->ddl_instructores)>0){
                foreach ($this->ddl_instructores as $instructor) {
                    $ddl_instructor = new instructorDAO();
                    $ddl_instructor = $instructor;
        ?> 
         <option selected value="<?php echo $ddl_instructor->documento; ?>"><?php echo $ddl_instructor->nombres; ?></option>
         <?php
                } }
         ?>
               </select>
            </div>



            <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" class="form-control" name="fecha" id="fecha"required>
             <small id="fechaHelp" class="form-text text-muted">Diligencie fecha de inasistencia</small>
                            </div>
            <label class="form-text text-muted">Excusa</label>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="excusa1" name="excusa" class="custom-control-input">
                <label class="custom-control-label" for="excusa1">Si</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="excusa2" name="excusa" class="custom-control-input">
                <label class="custom-control-label" for="excusa2">No</label>
                </div>     
        <label class="form-text text-muted">Asistio</label>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="asistio1" name="asistio" class="custom-control-input">
                <label class="custom-control-label" for="asistio1">Si</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="asistio2" name="asistio" class="custom-control-input">
                <label class="custom-control-label" for="asistio2">No</label>
        </div>     
    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Registrar">
        
        </div>
        </form>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>

   