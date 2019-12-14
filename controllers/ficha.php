<?php
    class Ficha extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $fichas = $this->view->datos = $this->model->read();
        $this->view->fichas = $fichas;
            $this->view->render('ficha/index');
        }
        function crear(){
            if(isset($_POST["programa"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Programa creado correctamente";
                    $fichas = $this->view->datos = $this->model->read();
                    $this->view->fichas = $fichas;
                    $this->view->render('ficha/index');
                }else{
                    
                    $this->view->mensaje = "El programa ya existe 1";
                    $this->view->render('ficha/nuevo');
                }
            }else{
                $this->view->render('ficha/nuevo');
            }
        }
        function leer($param = null){
            $nroficha = $param[0];
            $programa = $this->model->readById($nroficha);
    
            session_start();
            $_SESSION["id_verPrograma"] = $programa->nroficha;
    
            $this->view->ficha = $ficha;
            $this->view->render('ficha/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_verPrograma"];
            unset($_SESSION['id_verPrograma']);
    
            if($this->model->update($_POST)){
                $ficha = new FichaDAO();
                $ficha->nroficha = $id;
                $ficha->nroficha = $_POST['nroficha'];
                $ficha->programa = $_POST['programa'];
                $ficha->fecha_ingreso = $_POST['fecha_ingreso'];
                $ficha->fecha_fin_lectiva = $_POST['fecha_fin_lectiva'];
                $ficha->fecha_fin_practica = $_POST['fecha_fin_lectiva'];
    
    
                $this->view->ficha = $ficha;
                $this->view->mensaje = "Programa actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al programa";
            }
            $programas = $this->view->datos = $this->model->read();
            $this->view->programas = $programas;
            $this->view->render('ficha/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Programa eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el programa";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>