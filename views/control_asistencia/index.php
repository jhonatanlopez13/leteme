<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>registro de asistencia</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de asistencias</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                
                <th  scope="col">id </th>
                    <th  scope="col">documento aprendiz </th>
                    <th  scope="col">documento del instructor</th>
                    <th  scope="col">fecha</th>
                    <th  scope="col">excusa</th>
                    <th  scope="col">asistio</th>
                 <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/control_asistencia.php';
            if(count($this->control_asistencias)>0){
                foreach ($this->control_asistencias as $control_asistencia) {
                    $coas = new control_asistenciaDAO();
                    $coas = $control_asistencia;
        ?>
                    <tr id="fila-<?php echo $coas->id; ?>">
                        <td><?php echo $coas->id; ?></td>
                        <td><?php echo $coas->documento_aprendiz; ?></td>
                        <td><?php echo $coas->documento_instructor; ?></td>
                        <td><?php echo $coas->fecha; ?>
                        <td><?php echo $coas->excusa; ?>
                        <td><?php echo $coas->asistio; ?>
                        
                        <td><a href="<?php echo constant('URL') . 'control_asistencia/leer/' . $coas->id; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="control_asistencia" data-accion="eliminar" data-id="<?php echo $coas->id; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="9" class="text-center">NO HAY aprendices DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/control_asistencia/crear")'>Crear registro</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>