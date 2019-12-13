<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>resultado de registro de aprendizaje</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        

        
    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">resultado de aprendizaje</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th  scope="col">id</th>
                    <th  scope="col">Numero de documento</th>
                    <th  scope="col">nombre</th>
                    <th  scope="col">horas directas</th>
                    <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-dato">
            
        <?php
            include_once 'models/resultadoapre.php';
            if(count($this->resultadoapres)>0){
                foreach ($this->resultadoapres as $row) {
                    $resultadoapre = new resultadoapreDAO();
                    $resultadoapre = $row;
        ?>
                    <tr id="fila-<?php echo $resultadoapre->id; ?>">
                        <td><?php echo $resultadoapre->id; ?></td>
                        <td><?php echo $resultadoapre->instructor_documento; ?></td>
                        <td><?php echo $resultadoapre->nombre; ?></td>
                        <td><?php echo $resultadoapre->horas_directas ; ?>
                        <td><a href="<?php echo constant('URL') . 'resultadoapre/leer/' . $resultadoapre->id; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="resultadoapre" data-accion="eliminar" data-id="<?php echo $resultadoapre->id; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="6" class="text-center">NO HAY resultado de aprendizaje DISPONIBLES</td></tr>
        <?php    
            }
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/resultadoapre/crear")'>Crear registro</button>
    </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>