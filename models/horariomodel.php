<?php
include_once('models/horario.php');
class HorarioModel extends Model{
    function __construct(){
        parent::__construct();
    }

    //Funcion publica para cargarfichas
    public function mdCargarFichas(){
        $items = [];    //se deckara variable $items(articulos) como un arreglo inicialmente vacio
        try{
            $query = $this->db->connect()->query('SELECT nroficha,programa FROM ficha');    //Consulta de tabla ficha los dos campos
            include_once('models/ficha.php');   //incluir el dao fichaphp
            while($row = $query->fetch()){    //Mientras variable $row (fila) sea igual a que la variable $query (consultar) ejecute funcion "fetch"(fetch: a podido recuperar)
                $item = new FichaDAO(); //Se crea variable $item(en singular)la cual sera una sustancia de la clase fichadao(de models/ficha.php)
                $item->nroficha = $row['nroficha']; //La variable $row (lila) tendra los valores encontrados en los campos de la tabla
                $item->programa    = $row['programa'];

                   
                array_push($items, $item);  //ARRAY PUSH: Permite ingresar a un arreglo nuevos valores. Entre parentesis se especifica 1. El arreglo    2. El valor que se quiere meter
            }
            return $items;  //Finalmente la funcion retornara los articulos (items) encontrados en la consultar
        }catch(PDOException $e){    //un pedo e
           if(constant("DEBUG")){
               echo $e->getMessage();
           }
            return [];
        }
    }

    //La descripcion es similar a la funcion anterior
    //OJO. POSIBLE CAMBIO DE NOMBRE DE LOS DAO A FUTURO
    public function mdCargarDocumento(){
        $items = [];
        try{

            $query = $this->db->connect()->query('SELECT documento,nombres FROM instructor');
           
            while($row = $query->fetch()){
             include_once('models/instructor.php');
                $item = new InstructorDAO();
                $item->docinst= $row['documento'];
                $item->nominst  = $row['nombres'];
               
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           if(constant("DEBUG")){
               echo $e->getMessage();
           }
            return [];
        }
    }



    public function mdCargarJornada(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT jornada FROM jornada');
            include_once('models/jornada.php');
            while($row = $query->fetch()){
                $item = new JornadaDAO();
                $item->jornada = $row['jornada'];

                   
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           if(constant("DEBUG")){
               echo $e->getMessage();
           }
            return [];
        }
    }

    # OJO!!! SE REORGANIZO LAS FUNCONES PORQUE EL SISTEMA NO RECONOCE VARIABLE $dia EN MDCREATE...FUNCIONO!

    public function mdread(){   //funcion pubica leer. Hace consulta al DAO
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT ficha_nroficha,instructor_documento, sesion_jornada, dia, hora_inicio, hora_fin, ambiente, fecha_inicio, fecha_fin FROM horario_ficha');
            
            while($row = $query->fetch()){
                $item = new HorarioDAO();
                $item->ficha_nroficha = $row['ficha_nroficha'];
                $item->instructor_documento    = $row['instructor_documento'];
                $item->sesion_jornada    = $row['sesion_jornada'];
                $item->dia = $row['dia'];
                $item->hora_inicio    = $row['hora_inicio'];
                $item->hora_fin    = $row['hora_fin'];
                $item->ambiente    = $row['ambiente'];
                $item->fecha_inicio    = $row['fecha_inicio'];
                $item->fecha_fin    = $row['fecha_fin'];
    
                array_push($items, $item);
            }
            return $items;
        }catch(PDOException $e){
           if(constant("DEBUG")){
               echo $e->getMessage();
           }
            return [];
        }
    }



    //Funcion modelo eliminar con los parametros llaves a eliminar y un pedo
    public function mdelete($ficha_nroficha, $instructor_documento, $sesion_jornada, $dia){
        $query = $this->db->connect()->prepare('DELETE FROM horario_ficha WHERE ficha_nroficha = :ficha_nroficha and instructor_documento = :instructor_documento and sesion_jornada = :sesion_jornada and dia = :dia');

        try{
            $query->execute([
                'ficha_nroficha' => $ficha_nroficha,
                'instructor_documento' => $instructor_documento,
                'sesion_jornada'  => $sesion_jornada,
                'dia' => $dia      
            ]);

            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }


    //Funcion para leer por id
    public function readById($ficha_nroficha,$instructor_documento,$sesion_jornada,$dia){ //Declarada funcion para leer por id, con 
        $item = new HorarioDAO();
        try{
           // OJO NO,BRE    PREVIA VERIFICACION
            $query = $this->db->connect()->prepare('SELECT * FROM horario_ficha WHERE ficha_nroficha = :ficha_nroficha and instructor_documento=:instructor_documento and sesion_jornada=:sesion_jornada and dia=:dia');

            //ejecutar un mapeo donde cada variable $llave prim sera igual al valor del campo de la bd 
            $query->execute([
                'ficha_nroficha' => $ficha_nroficha,
                'instructor_documento' => $instructor_documento,
                'sesion_jornada' => $sesion_jornada,
                'dia' => $dia
            ]);
            
            while($row = $query->fetch()){
                $item = new HorarioDAO();   //Inspeccionar si esto sobra
                $item->ficha_nroficha = $row['ficha_nroficha']; //Cda fila tiene asignado valor de la tabla
                $item->instructor_documento    = $row['instructor_documento'];
                $item->sesion_jornada    = $row['sesion_jornada'];
                $item->dia    = $row['dia'];
                $item->hora_inicio    = $row['hora_inicio'];
                $item->hora_fin    = $row['hora_fin'];
                $item->ambiente    = $row['ambiente'];
                $item->fecha_inicio    = $row['fecha_inicio'];
                $item->fecha_fin    = $row['fecha_fin'];
            }

            return $item;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return null;
        }
    }

    public function mdcreate($datos){
        #$misdias="";
        $misdias[]=null; //ensayo sugewremcia. $misdias es un array vacio
        foreach($datos["dia"] as $dia){ //Foreach para recorrer arreglo $datos
            $sentenceSQL="INSERT INTO horario_ficha( ficha_nroficha, instructor_documento, sesion_jornada, dia, hora_inicio, hora_fin, ambiente, fecha_inicio, fecha_fin) VALUES( :ficha_nroficha, :instructor_documento, :sesion_jornada, :dia, :hora_inicio, :hora_fin, :ambiente, :fecha_inicio, :fecha_fin)";
            $connexionDB=$this->db->connect();
            $query = $connexionDB->prepare($sentenceSQL);
            //al arreglo $datos se le indexa valores de la bd
            try{
                $query->execute([
                                'ficha_nroficha' => $datos['ficha_nroficha'],
                                'instructor_documento' => $datos['instructor_documento'],
                                'sesion_jornada' => $datos['sesion_jornada'],
                                'dia' => $dia,   //inspeccione si este rtrim funciona..
                                'hora_inicio' => $datos['hora_inicio'],
                                'hora_fin' => $datos['hora_fin'],
                                'ambiente' => $datos['ambiente'],
                                'fecha_inicio' => $datos['fecha_inicio'],
                                'fecha_fin' => $datos['fecha_fin']
                ]);

                $misdias[]=true;
            }catch(PDOException $e){
                if(constant("DEBUG")){
                        echo $e->getMessage();
                }

                $misdias[]=false;
            }
        }

        foreach($misdias as $d){
            if(!$d){    //operador logico negacion. True si $d no es true
                return true; 
            }
        }
        
        return false;     
    }
//revisar indientacion
   

    public function mdupdate($item){    //Funcion modelo actualizar. lleva una variable $idem (articulo)
        $query = $this->db->connect()->prepare('UPDATE horario_ficha SET hora_inicio = :hora_inicio, hora_fin = :hora_fin, ambiente = :ambiente, fecha_inicio = :fecha_inicio, fecha_fin = :fecha_fin WHERE ficha_nroficha = :ficha_nroficha and instructor_documento = :instructor_documento and sesion_jornada = :sesion_jornada and dia = :dia');
        try{
            $query->execute([
                'ficha_nroficha' => $item['ficha_nroficha'],
                'instructor_documento' => $item['instructor_documento'],
                'sesion_jornada' => $item['sesion_jornada'],
                'dia' => $item['dia'],
                'hora_inicio' => $item['hora_inicio'],
                #'' => $item[''],
                'hora_fin' => $item['hora_fin'],
                'ambiente' => $item['ambiente'],
                'fecha_inicio' => $item['fecha_inicio'],
                'fecha_fin' => $item['fecha_fin'],
            ]);

            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }    
}

?>