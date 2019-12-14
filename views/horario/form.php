<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Crear horario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Nuevo horario</h1>
        <div class="col-sm-6 offset-sm-3">
        <form action="<?php echo constant('URL'); ?>horario/create" method="POST">  <!--Parece un metdod-->
           
        
        <!-- Llamar las dopindropelist -->


            <div class="form-group">
                <label for="instructor_documento">Documento instructor</label>
                <select class="custom-select" id="instructor_documento" name="instructor_documento">
                <option selected value="">Seleccione...</option>
                <?php
            include_once 'models/instructor.php';
            if(count($this->ddl_instructors)>0);
                foreach ($this->ddl_instructors as $instructor) {
                    $ddl_instructor = new InstructorDAO();
                    $ddl_instructor = $instructor;
        ?>
        <option value="<?php echo $ddl_instructor->docinst;?>"><?php echo $ddl_instructor->docinst. "-" .$ddl_instructor->nominst;?></option>
        <?php
                    }
                    ?>
                </select>
           
            </div>

            <div class="form-group">
                <label for="ficha_nroficha">N° Ficha</label>
                <select class="custom-select" id="ficha_nroficha" name="ficha_nroficha">
                <option selected value="">Seleccione...</option>
                    <?php
                    include_once 'models/ficha.php';
                    if(count($this->ddl_fichas)>0){
                        foreach ($this->ddl_fichas as $ficha) {
                            $ddl_ficha = new FichaDAO();
                            $ddl_ficha = $ficha;
                ?>
                
                    <option value="<?php echo $ddl_ficha->nroficha; ?>"><?php echo $ddl_ficha->nroficha. "-" . $ddl_ficha->programa; ?> </option>
                        <?php } 
                        }
                        ?>
                </select>
                </div>
            </div>
         

            <div class="form-group">
                <label for="sesion_jornada">Jornada</label>
                <select class="custom-select" name="sesion_jornada" id="sesion_jornada">
                <option selected value="">Seleccione...</option>
                        <?php
                    include_once 'models/jornada.php';
                    if(count($this->ddl_jornadas)>0){
                        foreach ($this->ddl_jornadas as $jornada) {
                            $ddl_jornada = new JornadaDAO();
                            $ddl_jornada = $jornada;
                ?>
                
                    <option value="<?php echo $ddl_jornada->jornada; ?>"><?php echo $ddl_jornada->jornada; ?> </option>
                        <?php } 
                        }
                        ?>
                </select>
            </div>




            <div class="form-group">
                <label for="ambiente">Ambiente</label>
                <input type="text" class="form-control" name="ambiente" id="ambiente">
                <small id="ambienteHelp" class="form-text text-muted">Ingrese codigo del ambiente</small>
            </div>


            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio</label>
                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
            </div>

            <div class="form-group">
                <label for="fecha_fin">Fecha Final</label>
                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
            </div>

            <div class="form-check">
            <label for="dia">dia</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[0]" value="lunes" id="dia_0">
                    <label class="form-check-label" for="dia_0">Lunes</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[1]" value="martes" id="dia_1">
                    <label class="form-check-label" for="dia_1">Martes</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[2]" value="miercoles" id="dia_2">
                    <label class="form-check-label" for="dia_2">Miercoles</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[3]" value="jueves" id="dia_3">
                    <label class="form-check-label" for="dia_3">Jueves</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[4]" value="viernes" id="dia_4">
                    <label class="form-check-label" for="dia_4">Viernes</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[5]" value="sabado" id="dia_5">
                    <label class="form-check-label" for="dia_5">Sabado</label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="dia[6]" value="domingo" id="dia_6">
                    <label class="form-check-label" for="dia_6">Domingo</label>
                </div>

            </div>
                    


            <div class="form-group">
                <label for="hora_inicio">Hora de inicio</label>
                <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
            </div>

            <div class="form-group">
                <label for="hora_fin">hora Final</label>
                <input type="time" class="form-control" name="hora_fin" id="hora_fin">
            </div>



            <input type="submit" class="btn btn-primary" value="Crear horario">
        </form>
    
    </div>

    <?php require 'views/footer.php'; ?>
    
</body>
</html>