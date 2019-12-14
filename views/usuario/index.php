<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>usuario</title>
</head>
<body>

    <?php require 'views/header.php'; ?>

    <div id="main" class="container">
        <div><?php echo $this->mensaje; ?></div>
        <h1 class="center">Listado de usuarios</h1>

        <table id="tabla" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                
                    <th  scope="col">usuario </th>
                    <th  scope="col">email</th>
                    <th  scope="col">contrasena</th>
                 <th  scope="col" colspan="2">Acciones</th>
                    
                </tr>
            </thead>

            <tbody id="tbody-data">
            
        <?php
            include_once 'models/usuario.php';
            if(count($this->usuarios)>0){
                foreach ($this->usuarios as $usuario) {
                    $usu = new usuarioDAO();
                    $usu = $usuario;
        ?>
                    <tr id="fila-<?php echo $usu->username; ?>">
                        <td><?php echo $usu->username; ?></td>
                        <td><?php echo $usu->email; ?>
                        <td><?php echo $usu->contrasena; ?>
                        
                        <td><a href="<?php echo constant('URL') . 'usuario/leer/' . $usu->username; ?>">Actualizar</a></td>
                        <td><button class="bEliminar" data-controlador="usuario" data-accion="eliminar" data-id="<?php echo $usu->username; ?>">Eliminar</button></td> 
                    </tr>
        <?php   
                } 
            }else{
        ?>
            <tr><td colspan="9" class="text-center">NO HAY usuarios DISPONIBLES</td></tr>
        <?php    
            }   
        ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" onClick='window.location.assign("<?php echo constant('URL'); ?>/usuario/crear")'>Crear usuario</button>
    </div>

    <?php require 'views/footer.php'; ?>
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>
</body>
</html>