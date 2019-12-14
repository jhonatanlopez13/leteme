<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Consultar Horario Ficha</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="container" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Consultar Horario Ficha</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">N° Ficha</th>
                    <th  scope="col">Documento Instructor</th>
                    <th  scope="col">Jornada</th>
                    <th  scope="col">Dias</th>
                    <th  scope="col">Hora de Inicio</th>
                    <th  scope="col">Hora Final</th>
                    <th  scope="col">Ambiente</th>
                    <th  scope="col">Fecha de Inicio</th>
                    <th  scope="col">Fecha Final</th>
                    <th  scope="col" colspan="2">Acciones</th>    
                </tr>
            </thead>

            <tbody id="tbody-dato">
            
                <?php
                    include_once 'models/horario.php';
                    if(count($this->horariofichas)>0){  //Contar $horarioFicha y si es mayor a 0 entonces
                        $i=0;   //Variable contadorra. declaracion
                        foreach ($this->horariofichas as $horarioficha) {
                            $hficha = new HorarioDAO();   //nueva instancia
                            $hficha = $horarioficha;
                        
                ?>

                    <tr id="fila-<?php echo $i; ?>">
                        <td><?php echo $hficha->ficha_nroficha; ?></td>
                        <td><?php echo $hficha->instructor_documento; ?></td>
                        <td><?php echo $hficha->sesion_jornada; ?></td>
                        <td><?php echo $hficha->dia; ?></td>
                        <td><?php echo $hficha->hora_inicio; ?></td>
                        <td><?php echo $hficha->hora_fin; ?></td>
                        <td><?php echo $hficha->ambiente; ?></td>
                        <td><?php echo $hficha->fecha_inicio; ?></td>
                        <td><?php echo $hficha->fecha_fin; ?></td>
                        
                        <td><a href="<?php echo constant('URL') . 'horario/read/' .$hficha->ficha_nroficha.'/'.$hficha->instructor_documento.'/'.$hficha->sesion_jornada.'/'.$hficha->dia; ?>">Actualizar</a></td>
                        <td><button class="bEliminarhor" data-id='<?php echo $i;?>' data-controlador="horario" data-accion="delete" data-key="<?php echo $hficha->ficha_nroficha.'/'.$hficha->instructor_documento.'/'.$hficha->sesion_jornada.'/'.$hficha->dia; ?>">Eliminar</button></td> 
                    </tr>

                <?php   
                    $i+=1;  //Aumentar en 1
                    } 
                }else{
                    ?>
                    <tr><td colspan="8" class="text-center">NO HAY HORARIOS DISPONIBLES</td></tr>
                <?php    
                }
                ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/horario/create")'>Crear horario</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/mainhor.js"></script>
</body>
</html>