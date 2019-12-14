<?php
include_once('models/control_asistencia.php');
class control_asistenciaModel extends Model{
    function __construct(){
        parent::__construct();
    }
    
    public function CargarAprendices(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT documento, nombres, apellidos FROM aprendiz');
            include_once('models/aprendiz.php');
            while($row = $query->fetch()){
                $item = new AprendizDAO();
                $item->documento=$row['documento'];
                $item->nombres=$row['nombres'];
                $item->apellidos=$row['apellidos'];
                
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
    public function Cargarinstructores(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT documento, nombres FROM instructor');
            include_once('models/instructor.php');
            while($row = $query->fetch()){
                $item = new instructorDAO();
                $item->documento=$row['documento'];
                $item->nombres=$row['nombres'];
                
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
    public function leer(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT id, documento_aprendiz, documento_instructor, fecha, excusa, asistio FROM control_asistencia');
            
            while($row = $query->fetch()){
                $item = new control_asistenciaDAO();
                $item->id=$row['id'];
                $item->documento_aprendiz=$row['documento_aprendiz'];
                $item->documento_instructor=$row['documento_instructor'];
                $item->fecha=$row['fecha'];
                $item->excusa=$row['excusa'];
                $item->asistio=$row['asistio'];
                
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
    public function update($item){
        $query = $this->db->connect()->prepare('UPDATE control_asistencia SET documento_aprendiz = :documento_aprendiz, documento_instructor = :documento_instructor, fecha = :fecha, excusa = :excusa, asistio = :asistio WHERE id = :id');
        try{
            $query->execute([
              
                'id' => $item['id'],                
                'documento_aprendiz' => $item['documento_aprendiz'],
                                'documento_instructor' => $item['documento_instructor'],
                                'fecha' => $item['fecha'],
                                'excusa' => $item['excusa'],
                                'asistio' => $item['asistio']
                                
            ]);
            return true;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return false;
        }
    }
 
    public function readById($id){
        $item = new control_asistenciaDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM control_asistencia WHERE id = :id');

            $query->execute(['documento_aprendiz' => $id]);
            
            while($row = $query->fetch()){
                $item->id = $row['id'];
                $item->documento_aprendiz = $row['documento_aprendiz'];
                $item->documento_instructor = $row['documento_instructor'];
                $item->fecha = $row['fecha'];
                $item->excusa = $row['excusa'];
                $item->asistio = $row['asistio'];

            }
            return $item;
        }catch(PDOException $e){
            if(constant("DEBUG")){
                echo $e->getMessage();
            }
            return null;
        }
    }
    public function Guardar($datos){
        $sentenceSQL="INSERT INTO control_asistencia( id, documento_aprendiz, documento_instructor, fecha, excusa, asistio) VALUES( :id, :documento_aprendiz, :documento_instructor, :fecha, :excusa, :asistio)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                'id' => $datos['id'],
                'documento_aprendiz' => $datos['documento_aprendiz'],
                'documento_instructor' => $datos['documento_instructor'],
                'fecha' => $datos['fecha'],
                'excusa' => $datos['excusa'],
                'asistio' => $datos['asistio'],
                ]);
            return true;
        }catch(PDOException $e){
        if(constant("DEBUG")){
                echo $e->getMessage();
        }
            
            return false;
        }
    }
    public function eliminar($id){
        $query = $this->db->connect()->prepare('DELETE FROM control_asistencia WHERE id = :id');
        try{
            $query->execute([
                'id' => $id
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