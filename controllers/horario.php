<?php

    class Horario extends Controller{   //Clase Horario heredara atributos de la clase principal "controller" (de libs/controller)
        function __construct(){
            parent::__construct();
            $this->view->mensaje="";
        }


        function render(){
            $horariofichas = $this->view->datos = $this->model->mdread(); //Cargar la funcion leer del modelo (mdread) 
            $this->view->horariofichas = $horariofichas;  // envia a la vista la variable $horarioFichas y contenido 
            $this->view->render('horario/index');
        }


        function create(){  //FUNCION CREAR
            if(isset($_POST["ficha_nroficha"])){    //Verifica si el campo ficha_nroficha tiene contenido
                if($this->model->mdcreate($_POST)){ //Cargar la funcion crear del modelo (mdcreate)
                    $this->view->mensaje = "horario creado correctamente";  //Variable generadora de mensajes hacia vista
                    $horariofichas = $this->view->datos = $this->model->mdread();   //Variable horario ficha igual a datos de variable datos y igual a funcion del modelo
                    $this->view->horariofichas = $horariofichas;
                    $this->view->render('horario/index');
                }else{
                    //Sno se cumple condicion anterior, renderizar al formulario
                    $this->view->mensaje = "El horario ya existe";
                    $this->view->render('horario/form');
                } #Verificar si se puede meter dos desplegables en un solo lado

            }else{
                //Sino entonces cargar funciones que contienen las dopindownlist (listas desplegables) de model
                //OJO CON LOS PLURALES
                $fichas = $this->view->datos['ddl_fichas'] = $this->model->mdCargarfichas();  //Cargar funcion del modelo
                $this->view->ddl_fichas = $fichas;  //Algo para la vista...???
                $instructors = $this->view->datos['dll_instructors'] = $this->model->mdCargarDocumento();
                $this->view->ddl_instructors = $instructors;
                $jornadas = $this->view->datos['ddl_jornadas'] = $this->model->mdCargarjornada();
                $this->view->ddl_jornadas = $jornadas;
                $this->view->render('horario/form');    //Renderiza a formulario
            }
        }

       /* function leer($param = null){
            $docinst = $param[0];
            $instruct = $this->model->readById($docinst);   */

        //OJO, SI PRESENTA ERRORES RENOMBRAR LAS VARIABLES
        //Arreglo $param secciona en parametros los datos (x/)
        function read($param = null){   //FUNCION LEER. Parametros vacios (nulos)
            $ficha_nroficha = $param[0];  //variable $ficha_nroficha es igual al parametro cero (porque es el parametro en el arreglo que contiene el id)
            $instructor_documento = $param[1];
            $sesion_jornada = $param[2];
            $dia = $param[3];
            $hficha = $this->model->readById($ficha_nroficha,$instructor_documento,$sesion_jornada,$dia); //Declarar variable $horarioFicha que contine a funcion de modelo "Leer por id" junto con las variables (parametros)
   

            //SESSION_STAR: Se a utlilizado para que el usuario no pueda modificar el id (mayor seguridad)
            //Inicia sesion a cada llave primaria
            session_start();
            $_SESSION["ficha_nroficha"] = $hficha->ficha_nroficha;
            $_SESSION["instructor_documento"] = $hficha->instructor_documento;
            $_SESSION["sesion_jornada"] = $hficha->sesion_jornada;
            $_SESSION["dia"] = $hficha->dia;

            //Hacia la vista, con variable horarioFicha
            $this->view->hficha = $hficha;
            $this->view->render('horario/editar');    //Llama a la vista views/horario/editar.php
        }



        function edit($param = null){   //Funcion editar con parametros nulos
            session_start();    //Abre sesion
            /*
            $_POST['ficha_nroficha'] = $_SESSION["ficha_nroficha"]; //$_POST['ficha_nroficha'] es igual al contenido de la sesion de arriba
            $_POST['instructor_documento'] = $_SESSION["instructor_documento"];
            $_POST['sesion_jornada'] = $_SESSION["sesion_jornada"];
            $_POST['dia'] = $_SESSION["dia"];
            //UNSET: Para destruir sesion
            unset($_SESSION['ficha_nroficha']);
            unset($_SESSION['instructor_documento']);
            unset($_SESSION['sesion_jornada']);
            unset($_SESSION['dia']);
            //ejemplo:
            $id = $_SESSION["documento"];
            unset($_SESSION['documento']);


             if($this->model->update($_POST)){
                $instruct = new InstructorDAO();
                $instruct->docinst = $id;
                $instruct->docinst = $_POST['documento'];
                $instruct->nominst = $_POST['nombres'];
            
            */

            

            $id = $_SESSION["ficha_nroficha"]; //$_POST['ficha_nroficha'] es igual al contenido de la sesion de arriba
            $id  = $_SESSION["instructor_documento"];
            $id = $_SESSION["sesion_jornada"];
            $id = $_SESSION["dia"];
                    //UNSET: Para destruir sesion
                    unset($_SESSION['ficha_nroficha']);
                    unset($_SESSION['instructor_documento']);
                    unset($_SESSION['sesion_jornada']);
                    unset($_SESSION['dia']);


    
            if($this->model->mdupdate($_POST)){   //Cargar funcion actualizar del modelo
                $horarioficha = new HorarioDAO();
                #$horarioficha-> = $_POST[''];
                #$horarioficha->=$id;
                //OJO CON EL INJERTO $id
                $horarioficha->ficha_nroficha=$id;
                $horarioficha->instructor_documento=$id;
                $horarioficha->sesion_jornada=$id;
                $horarioficha->dia=$id;
                $horarioficha->ficha_nroficha = $_POST['ficha_nroficha'];
                $horarioficha->instructor_documento = $_POST['instructor_documento'];
                $horarioficha->sesion_jornada = $_POST['sesion_jornada'];
                $horarioficha->dia = $_POST['dia'];
                $horarioficha->hora_inicio = $_POST['hora_inicio'];
                $horarioficha->hora_fin = $_POST['hora_fin'];
                $horarioficha->ambiente = $_POST['ambiente'];
                $horarioficha->fecha_inicio = $_POST['fecha_inicio'];
                $horarioficha->fecha_fin = $_POST['fecha_fin'];

                $this->view->horarioficha = $horarioficha;
                $this->view->mensaje = "horario actualizado correctamente";
            }else{
                $this->view->mensaje = "No se pudo actualizar al horario";
            }
            
            $horariofichas = $this->view->datos = $this->model->mdread();   //Variable $horarioFichas 
            $this->view->horariofichas = $horariofichas;
            $this->view->render('horario/index');
        }
    
        function delete($param = null){     //Funcion para . Elimina los parametros (declarados anterirmente como llaves)

            $ficha_nroficha = $param[0];
            $instructor_documento = $param[1];
            $sesion_jornada = $param[2];
            $dia = $param[3];
    
            if($this->model->mdelete($ficha_nroficha, $instructor_documento, $sesion_jornada, $dia)){   //Cargar funcion eliminar del modelo mdelete. con las variables llaves
                $mensaje ="horario eliminado correctamente";
            }else{
                $mensaje = "No se pudo eliminar el horario";
            }
    
            echo $mensaje;
        }
    }
?>