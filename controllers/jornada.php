<?php
    class Jornada extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $jornadas = $this->view->datos = $this->model->read();
        $this->view->jornadas = $jornadas;
            $this->view->render('jornada/index');
        }
        function crear(){
            if(isset($_POST["jornada"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "Jornada creada correctamente";
                    $jornadas = $this->view->datos = $this->model->read();
                    $this->view->jornadas = $jornadas;
                    $this->view->render('jornada/index');
                }else{
                    
                    $this->view->mensaje = "La Jornada ya existe";
                    $this->view->render('jornada/nuevo');
                }
            }else{
                $this->view->render('jornada/nuevo');
            }
        }
        function leer($param = null){
            $jornada = $param[0];
            $jornada = $this->model->readById($jornada);
    
            session_start();
            $_SESSION["jornada"] = $jornada->jornada;
    
            $this->view->jornada = $jornada;
            $this->view->render('jornada/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["jornada"];
            unset($_SESSION['jornada']);
    
            if($this->model->update($_POST)){
                $jornada = new JornadaDAO();
                $jornada->jornada = $id;
                $jornada->jornada = $_POST['jornada'];
                $jornada->horas_directas = $_POST['horas_directas'];
                $jornada->horas_autonomas = $_POST['horas_autonomas'];
    
    
                $this->view->jornada = $jornada;
                $this->view->mensaje = "Jornada actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar el Jornada";
            }
            $jornadas = $this->view->datos = $this->model->read();
            $this->view->jornadas = $jornadas;
            $this->view->render('jornada/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="Jornada eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar la Jornada";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>