<?php
    class control_asistencia extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

     
        function render(){
            $control_asistencias = $this->view->datos['control_asistencias'] = $this->model->leer();
            $this->view->control_asistencias = $control_asistencias;
            $this->view->render('control_asistencia/index');
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
            $control_asistencia = $this->model->readById($id);
    
            session_start();
            $_SESSION["id_vercontrol_asistencia"] = $control_asistencia->id;
    
            $this->view->control_asistencia = $control_asistencia;
            $this->view->render('control_asistencia/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_vercontrol_asistencia"];
            unset($_SESSION['id_vercontrol_asistencia']);
    
            if($this->model->update($_POST)){
                $control_asistencia = new control_asistenciaDAO();
                $control_asistencia->documento_aprendiz = $id;
                $control_asistencia->documento_aprendiz = $_POST['documento_aprendiz'];
                $control_asistencia->instructor_documento = $_POST['instructor_documento'];
                $control_asistencia->fecha = $_POST['fecha'];
                $control_asistencia->excusa = $_POST['excusa'];
                $control_asistencia->asistio = $_POST['asistio'];
                
                $this->view->control_asistencia = $control_asistencia;
                $this->view->mensaje = "control_asistencia actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al control_asistencia";
            }
            $control_asistencias = $this->view->datos = $this->model->leer();
            $this->view->control_asistencias = $control_asistencias;
            $this->view->render('control_asistencia/index');
        }
        function crear(){
            if(isset($_POST["id"])){
                if($this->model->Guardar($_POST)){
                    $this->view->mensaje = "control_asistencia creado correctamente";
                    $control_asistencias = $this->view->datos['control_asistencias'] = $this->model->leer();
                    $this->view->control_asistencias = $control_asistencias;
                    $this->view->render('control_asistencia/index');
                }else{
                    
                    $this->view->mensaje = "El aprendiz ya existe";
                    
                    $aprendices = $this->view->datos['ddl_aprendices'] = $this->model->CargarAprendices();
                    $this->view->ddl_aprendices = $aprendices;

                    $instructores = $this->view->datos['ddl_instructores'] = $this->model->Cargarinstructores();
                    $this->view->ddl_instructores = $instructores;

                    $this->view->render('control_asistencia/form');
                }
            }else{

                $aprendices = $this->view->datos['ddl_aprendices'] = $this->model->CargarAprendices();
                $this->view->ddl_aprendices = $aprendices;

                $instructores = $this->view->datos['ddl_instructores'] = $this->model->Cargarinstructores();
                $this->view->ddl_instructores = $instructores;
                
                $this->view->render('control_asistencia/form');
            }
        }
    }
?>