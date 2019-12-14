<?php
    class Tipodoc extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $tipodocs = $this->view->datos['tipodocs'] = $this->model->leer();
            $this->view->tipodocs = $tipodocs;
            $this->view->render('tipodoc/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->eliminar($id)){
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
            $id = $param[0];
            $tipodoc = $this->model->readById($id);
    
            session_start();
            $_SESSION["id_tipodoc"] = $tipodoc->id;
    
            $this->view->tipodoc = $tipodoc;
            $this->view->render('tipodoc/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_tipodoc"];
            $_POST["id"]=$id;
            unset($_SESSION['id_tipodoc']);
            
            if($this->model->update($_POST)){
                $tipodoc = new tipodocDAO();
                $tipodoc->id = $id;
                $tipodoc->descripcion = $_POST['descripcion'];
    
    
                $this->view->tipodoc = $tipodoc;
                $this->view->mensaje = "documento actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al documento";
            }
            $tipodocs = $this->view->datos = $this->model->leer();
            $this->view->tipodocs = $tipodocs;
            $this->view->render('tipodoc/index');
        }
        function crear(){
            if(isset($_POST["id"])){
                if($this->model->Guardar($_POST)){
                    $this->view->mensaje = "tipo de documento creado correctamente";
                    $tipodocs = $this->view->datos['tipodocs'] = $this->model->leer();
                    $this->view->tipodocs = $tipodocs;
                    $this->view->render('tipodoc/index');
                }else{
                    
                    $this->view->mensaje = "El tipo de documento ya existe";
                    $this->view->render('tipodoc/form');
                }
            }else{
                $this->view->render('tipodoc/form');
            }
        }
    }
?>