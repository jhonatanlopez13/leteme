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
        <h1 class="center">Nuevo aprendiz</h1>
        <form action="<?php echo constant('URL'); ?>aprendiz/editar" method="POST">

        <div class="row">

<div class="col">
            <div class="form-group">
                <label for="tipo_documento">tipo documento</label>
                <select class="custom-select" id="tipo_documento" name="documento" id="documento" value="<?php echo $this->aprendiz->documento; ?>">
                <option selected value="">seleccione...</option>
                <option value="CC">Cedula de Ciudadania</option>
                <option value="CE">Cedula de extranjeria</option>
                <option value="TI">Tarjeta de indetidad</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_exp_documento">fecha de expedicion del documento</label>
                <input type="date" class="form-control" name="fecha_exp_documento" id="fecha_exp_documento" value="<?php echo $this->aprendiz->fecha_exp_documento; ?>">
                <small id="fecha_exp_documentoHelp" class="form-text text-muted">diligencie el documento de aprendiz</small>
            </div>
            <div class="form-group">
                <label for="lugar_exp_documento">lugar de expedicion del documento</label>
                <input type="text" class="form-control" name="lugar_exp_documento" id="lugar_exp_documento" value="<?php echo $this->aprendiz->lugar_exp_documento; ?>">
                <small id="lugar_exp_documentoHelp" class="form-text text-muted">diligencie el documento de aprendiz</small>
            </div>
            <div class="form-group">
                <label for="documento">documento</label>
                <input type="text" class="form-control" name="documento" id="documento" value="<?php echo $this->aprendiz->documento; ?>">
                <small id="documentoHelp" class="form-text text-muted">diligencie el documento del aprendiz</small>
            </div>
            <div class="form-group">
                <label for="nombres">nombres</label>
                <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $this->aprendiz->nombres; ?>">
                <small id="nombresHelp" class="form-text text-muted">diligencie los nombres de aprendiz</small>
            </div>
            <div class="form-group">
                <label for="apellidos">apellidos</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $this->aprendiz->apellidos; ?>">
                <small id="apellidosHelp" class="form-text text-muted">diligencie los apllidos del aprendiz</small>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $this->aprendiz->email; ?>">
                <small id="emailHelp" class="form-text text-muted">diligencie el email del aprendiz</small>
            </div>
            <div class="form-group">
                <label for="celular">celular</label>
                <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $this->aprendiz->celular; ?>">
                <small id="celularHelp" class="form-text text-muted">diligencie el celular del aprendiz</small>
            </div>
            <label class="form-text text-muted">whatsapp</label>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="whatsapp1" name="whatsapp" class="custom-control-input" value="<?php echo $this->aprendiz->whatsapp; ?>">
                <label class="custom-control-label" for="whatsapp1">si</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="whatsapp2" name="whatsapp" class="custom-control-input" value="<?php echo $this->aprendiz->whatsapp; ?>">
                <label class="custom-control-label" for="whatsapp2">no</label>
            </div>

            <div class="form-group">
                <label for="direccion">direccion</label>
                <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $this->aprendiz->direccion; ?>">
                <small id="direccionHelp" class="form-text text-muted">diligencie los direccion del aprendiz</small>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">fecha_nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $this->aprendiz->fecha_nacimiento; ?>">
                <small id="fecha_nacimientoHelp" class="form-text text-muted">diligencie los fecha_nacimiento del aprendiz</small>
            </div>
            <div class="form-group">
                <label for="lugar_nacimiento">lugar_nacimiento</label>
                <input type="text" class="form-control" name="lugar_nacimiento" id="lugar_nacimiento" value="<?php echo $this->aprendiz->lugar_nacimiento; ?>">
                <small id="lugar_nacimientoHelp" class="form-text text-muted">diligencie los lugar_nacimiento del aprendiz</small>
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="ficha_nroficha">ficha</label>
                <select class="custom-select" id="ficha_nroficha" name="ficha_nroficha">
                <option selected value="">seleccione...</option>
               
                <?php
            include_once 'models/ficha.php';
            if(count($this->ddl_fichas)>0){
                foreach ($this->ddl_fichas as $ficha) {
                    $ddl_ficha = new FichaDAO();
                    $ddl_ficha = $ficha;
        ?> 
         <option selected value="<?php echo $ddl_ficha->nroficha; ?>"><?php echo $ddl_ficha->nroficha; ?></option>
         <?php
                } }
         ?>
               </select>
            </div>

            <div class="form-group">
                <label for="acudiente">nombres del acudiente</label>
                <input type="text" class="form-control" name="acudiente" id="acudiente" value="<?php echo $this->aprendiz->acudiente; ?>">
                <small id="acudienteHelp" class="form-text text-muted">diligencie el acudiente</small>
            </div>
            <div class="form-group">
                <label for="celular_acudiente">celular_acudiente</label>
                <input type="text" class="form-control" name="celular_acudiente" id="celular_acudiente" value="<?php echo $this->aprendiz->celular_acudiente; ?>">
                <small id="celular_acudienteHelp" class="form-text text-muted">diligencie el celular_acudiente de aprendiz</small>
            </div>
            <label class="form-text text-muted">estlos de aprendizaje</label>
            <div class="form-check">
                <input type="checkbox" id="estilos_0" name="estilos[0]" class="custom-control-input">
                <label class="custom-control-label" for="estilos_0">acomodador</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="estilos_1" name="estilos[1]" class="custom-control-input">
                <label class="custom-control-label" for="estilos_1">convergente</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="estilos_2" name="estilos[2]" class="custom-control-input">
                <label class="custom-control-label" for="estilos_2">asimilador</label>
            </div>
            <div class="form-check">
                <input type="checkbox" id="estilos_3" name="estilos[3]" class="custom-control-input">
                <label class="custom-control-label" for="estilos_3">divergente</label>
            </div>
            <div class="form-group">
                <label for="eps">eps</label>
                <input type="text" class="form-control" name="eps" id="eps" value="<?php echo $this->aprendiz->eps; ?>">
                <small id="epsHelp" class="form-text text-muted">diligencie el eps del aprendiz</small>
            </div>

            <div class="form-group">
                <label for="rh">rh </label>
                <select class="custom-select" id="rh" name="rh">
                <option selected value="">seleccione...</option>
                <option value="A+">A+</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                </select>
            </div>
         
            </div>
            
            

            <input type="submit" class="btn btn-primary" value="Crear aprendiz">
        </form>
        </div>
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>