<?php
    class usuario extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $usuarios = $this->view->datos['usuarios'] = $this->model->leer();
            $this->view->usuarios = $usuarios;
            $this->view->render('usuario/index');
        }
        function eliminar($param = null){
            $username = $param[0];
    
            if($this->model->eliminar($username)){
                $mensaje ="aprendiz eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el aprendiz";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        } 
        function leer($param = null){
            $username = $param[0];
            $usuario = $this->model->readById($username);
    
            session_start();
            $_SESSION["id_verusuario"] = $usuario->username;
    
            $this->view->usuario = $usuario;
            $this->view->render('usuario/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verusuario"];
            unset($_SESSION['id_verusuario']);
    
            if($this->model->update($_POST)){
                $usuario = new usuarioDAO();
                $usuario->username = $id;
                $usuario->username = $_POST['username'];
                $usuario->email = $_POST['email'];
                $usuario->contrasena = $_POST['contrasena'];

                $this->view->usuario = $usuario;
                $this->view->mensaje = "usuario actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al usuario";
            }
            $usuarios = $this->view->datos = $this->model->leer();
            $this->view->usuarios = $usuarios;
            $this->view->render('usuario/index');
        }
        function crear(){
            if(isset($_POST["username"])){
                if($this->model->Guardar($_POST)){
                    $this->view->mensaje = "usuario creado correctamente";
                    $usuarios = $this->view->datos['usuarios'] = $this->model->leer();
                    $this->view->usuarios = $usuarios;
                    $this->view->render('usuario/index');
                }else{
                    
                    $this->view->mensaje = "El usuario ya existe";
                    $this->view->render('usuario/form');
                }
            }else{
                $this->view->render('usuario/form');
            }
        }
    }
?>