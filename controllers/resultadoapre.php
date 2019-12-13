<?php
    class Resultadoapre extends Controller{
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }

        function render(){
            $resultadoapres = $this->view->datos = $this->model->read();
        $this->view->resultadoapres = $resultadoapres;
            $this->view->render('resultadoapre/index');
        }

       /* function verResultadoapre($param = null){
            $idResultadoapre = $param[0];
            $resultadoapre = $this->model->readById($id);
    
            session_start();
            $_SESSION["id"] = $resualtadoapre->id;
    
            $this->view->resultadoapre = $resultadoapre;
            $this->view->render('resultadoapre/nuevo');
        }
        */

        function crear(){
            if(isset($_POST["instructor_documento"])){
                if($this->model->create($_POST)){
                    $this->view->mensaje = "resultado de aprendizaje  creado correctamente";
                    $resultadoapres = $this->view->datos = $this->model->read();
                    $this->view->resultadoapres = $resultadoapres;
                    $this->view->render('resultadoapre/index');
                }else{
                    
                    $this->view->mensaje = "El resultado de aprendizaje ya existe";
                    $this->view->render('resultadoapre/nuevo');
                }
            }else{
                $this->view->render('resultadoapre/nuevo');
            }
        }
        function leer($param = null){
            $id = $param[0];
            $resultadoapre = $this->model->readById($id);
    
            session_start();
            $_SESSION["id"] = $resultadoapre->id;
    
            $this->view->resultadoapre = $resultadoapre;
            $this->view->render('resultadoapre/editar');
        }
        function editar($param = null){
            session_start();
            $id = $_SESSION["id"];
            unset($_SESSION['id']);
    
            if($this->model->update($_POST)){
                $resultadoapre = new ResultadoapreDAO();
                $this->view->resultadoapre = $resultadoapre;
                $this->view->mensaje = "resultado de aprendizaje actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar el resultado de aprendizaje";
            }
            $resultadoapres = $this->view->datos = $this->model->read();
            $this->view->resultadoapres = $resultadoapres;
            $this->view->render('resultadoapre/index');
        }
        function eliminar($param = null){
            $id = $param[0];
    
            if($this->model->delete($id)){
                $mensaje ="resultado eliminado correctamente";
                //$this->view->mensaje = "Alumno eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el resultado";
                //$this->view->mensaje = "No se pudo eliminar al alumno";
            }
    
            //$this->render();
    
            echo $mensaje;
        }
    }
?>