<?php
    class Aprendiz extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $aprendices = $this->view->datos['aprendices'] = $this->model->leer();
            $this->view->aprendices = $aprendices;
            $this->view->render('aprendiz/index');
        }
        function eliminar($param = null){
            $documento = $param[0];
    
            if($this->model->eliminar($documento)){
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
            $documento = $param[0];
            $aprendiz = $this->model->readById($documento);
    
            session_start();
            $_SESSION["id_veraprendiz"] = $aprendiz->documento;
    
            $this->view->aprendiz = $aprendiz;
            $this->view->render('aprendiz/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id_veraprendiz"];
            unset($_SESSION['id_veraprendiz']);
    
            if($this->model->update($_POST)){
                $aprendiz = new aprendizDAO();
                $aprendiz->documento = $id;
                $aprendiz->documento = $_POST['documento'];
                $aprendiz->nombres = $_POST['nombres'];
                $aprendiz->apellidos = $_POST['apellidos'];
                $aprendiz->email = $_POST['email'];
                $aprendiz->fecha_exp_documento = $_POST['fecha_exp_documento'];
                $aprendiz->lugar_exp_documento = $_POST['lugar_exp_documento'];
                $aprendiz->fecha_nacimiento = $_POST['fecha_nacimiento'];
                $aprendiz->lugar_nacimiento = $_POST['lugar_nacimiento'];
                $aprendiz->direccion = $_POST['direccion'];
                $aprendiz->celular = $_POST['celular'];
                $aprendiz->whatsapp = $_POST['whatsapp'];
                $aprendiz->eps = $_POST['eps'];
                $aprendiz->rh = $_POST['rh'];
                $aprendiz->acudiente = $_POST['acudiente'];
                $aprendiz->celular_acudiente = $_POST['celular_acudiente'];
                $aprendiz->tipo_documento_id = $_POST['tipo_documento_id'];
                $aprendiz->estilos_aprendizaje = $_POST['estilos_aprendizaje'];
    
                $this->view->aprendiz = $aprendiz;
                $this->view->mensaje = "aprendiz actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al aprendiz";
            }
            $aprendizs = $this->view->datos = $this->model->read();
            $this->view->aprendizs = $aprendizs;
            $this->view->render('aprendiz/index');
        }
        function crear(){
            if(isset($_POST["documento"])){
                if($this->model->Guardar($_POST)){
                    $this->view->mensaje = "aprendiz creado correctamente";
                    $aprendices = $this->view->datos['aprendices'] = $this->model->leer();
                    $this->view->aprendices = $aprendices;
                    $this->view->render('aprendiz/index');
                }else{
                  
                    $this->view->mensaje = "El aprendiz ya existe";
                 
                    $fichas = $this->view->datos['ddl_fichas'] = $this->model->CargarFichas();
                    $this->view->ddl_fichas = $fichas;

                    $tipodocs = $this->view->datos['ddl_tipodocs'] = $this->model->CargarTipodocs();
                    $this->view->ddl_tipodocs = $tipodocs;

                    $this->view->render('aprendiz/form');
                }
            }else{
             
                $fichas = $this->view->datos['ddl_fichas'] = $this->model->CargarFichas();
                $this->view->ddl_fichas = $fichas;

                $tipodocs = $this->view->datos['ddl_tipodocs'] = $this->model->CargarTipodocs();
                $this->view->ddl_tipodocs = $tipodocs;
                

                $this->view->render('aprendiz/form');
            }
        }
    }
?>