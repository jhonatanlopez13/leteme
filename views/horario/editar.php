<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Editar Horario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
    <div><?php echo $this->mensaje; ?></div>
    <h1 class="center">Editar Horario</h1>
        <div class="col-sm-6 offset-sm-3">
            <form action="<?php echo constant('URL'); ?>horario/edit" method="POST">
            <div class="form-group">
                <label for="ficha_nroficha">Nro Ficha</label>
                <input type="number" class="form-control" readonly name="ficha_nroficha" id="ficha_nroficha" value="<?php echo $this->hficha->ficha_nroficha; ?>" >
            </div>

            <div class="form-group">
                <label for="instructor_documento">Documento</label>
                <input type="text" class="form-control"readonly name="instructor_documento" id="instructor_documento" value="<?php echo $this->hficha->instructor_documento; ?>">
                <small id="ambienteHelp" class="form-text text-muted">Ingresedoc</small>
            </div>


            <div class="form-group">
                <label for="sesion_jornada">Jornada</label>
                <input type="text" class="form-control" readonly name="sesion_jornada" id="sesion_jornada" value="<?php echo $this->hficha->sesion_jornada; ?>">
            </div>

            <div class="form-group">
            <label for="dia">Dia</label>
            <input type="text" class="form-control" readonly name="dia" id="dia" value="<?php echo $this->hficha->dia; ?>">
            <small id="diaHelp" class="form-text text-muted">Dias</small>
            </div>
            
            
            <div class="form-group">
                <label for="ambiente">Ambiente</label>
                <input type="text" class="form-control" name="ambiente" id="ambiente" value="<?php echo $this->hficha->ambiente; ?>" >
                <small id="ambienteHelp" class="form-text text-muted">Ingrese codigo del ambiente</small>
            </div>


            <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?php echo $this->hficha->fecha_inicio; ?>" required>
            <small id="nombresHelp" class="form-text text-muted">Ingrese la fecha de Inicio</small>
            </div>
           
            <div class="form-group">
            <label for="fecha_fin">Fecha de Finalización</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?php echo $this->hficha->fecha_fin; ?>" required>
            <small id="nombresHelp" class="form-text text-muted">Ingrese la fecha de Finalización</small>
            </div>


           <!-- <div class="form-group">
                <label for="dia">Dias de formacion</label>
                <label> <input name= "dia" type="checkbox" id="dom" value="dom">Domingo</label>
            </div>-->

            <div class="form-group">
            <label for="hora_inicio">Hora de Inicio</label>
            <input type="time" class="form-control" name="hora_inicio" id="hora_inicio"value="<?php echo $this->hficha->hora_inicio; ?>">
            <small id="nombresHelp" class="form-text text-muted">Ingrese la hora de Inicio</small>
            </div>

            <div class="form-group">
            <label for="hora_fin">Hora de Finalización</label>
            <input type="time" class="form-control" name="hora_fin" id="hora_fin" value="<?php echo $this->hficha->hora_fin; ?>" required>
            <small id="nombresHelp" class="form-text text-muted">Ingrese la hora de Finalización</small>
            </div>







                <input type="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar Horario" >
                <input type="button" class="btn btn-danger btn-sm btn-block" onClick='window.location.assign("<?php echo constant('URL'); ?>/horario")' value="Cancelar">
            </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>