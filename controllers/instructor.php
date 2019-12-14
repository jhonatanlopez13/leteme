<?php
    class Instructor extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $instructs = $this->view->datos = $this->model->read();
            $this->view->instructs = $instructs;
            $this->view->render('instructor/index');
        }
        function crear(){
            if(isset($_POST["documento"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Instructor creado correctamente";
                    $instructs = $this->view->datos = $this->model->read();
                    $this->view->instructs = $instructs;
                    $this->view->render('instructor/index');
                }else{
                    
                    $this->view->mensaje = "El Instructor ya existe";
                    $this->view->render('instructor/nuevo');
                }
            }else{
                $this->view->render('instructor/nuevo');
            }
        }

        function leer($param = null){
            $docinst = $param[0];
            $instruct = $this->model->readById($docinst);
    
            session_start();
            $_SESSION["documento"] = $instruct->docinst;
    
            $this->view->instruct = $instruct;
            $this->view->render('instructor/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["documento"];
            unset($_SESSION['documento']);
    
            if($this->model->update($_POST)){
                $instruct = new InstructorDAO();
                $instruct->docinst = $id;
                $instruct->docinst = $_POST['documento'];
                $instruct->nominst = $_POST['nombres'];
                $instruct->apeinst = $_POST['apellidos'];
                $instruct->emainst = $_POST['email'];
                $instruct->celinst = $_POST['celular'];
                $instruct->whatinst = $_POST['whatsapp'];
    
    
                $this->view->instruct = $instruct;
                $this->view->mensaje = "Instructor actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar el Instructor";
            }
            $instructs = $this->view->datos = $this->model->read();
            $this->view->instructs = $instructs;
            $this->view->render('instructor/index');
        }
        function eliminar($param = null){
            $documento = $param[0];
    
            if($this->model->delete($documento)){
                $mensaje ="Instructor eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el Instructor";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }




    }
?>