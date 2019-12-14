<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>aprendiz</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de documentos</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                
                    <th  scope="col">id </th>
                    <th  scope="col">descripcion</th>
                 <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/tipodoc.php';
            if(count($this->tipodocs)>0){
                foreach ($this->tipodocs as $tipodoc) {
                    $tp = new TipodocDAO();
                    $tp = $tipodoc;
        ?>
                    <tr id="fila-<?php echo $tp->id; ?>">
                        <td><?php echo $tp->id; ?></td>
                        <td><?php echo $tp->descripcion; ?></td>
                        <td><a href="<?php echo constant('URL') . 'tipodoc/leer/' . $tp->id; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="tipodoc" data-accion="eliminar" data-id="<?php echo $tp->id; ?>">Eliminar</button></td> 
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
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/tipodoc/crear")'>Crear aprendiz</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>