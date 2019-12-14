<?php
include_once('models/tipodoc.php');
class TipodocModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function leer(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT id, descripcion FROM tipo_documento');
            
            while($row = $query->fetch()){
                $item = new TipodocDAO();
                $item->id=$row['id'];
                $item->descripcion=$row['descripcion'];
                
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
        $query = $this->db->connect()->prepare('UPDATE tipo_documento SET descripcion = :descripcion WHERE id = :id');
        try{
            $query->execute([
              
                                'id' => $item['id'],
                                'descripcion' => $item['descripcion']
                                
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
        $item = new tipodocDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM tipo_documento WHERE id = :id');

            $query->execute(['id' => $id]);
            
            while($row = $query->fetch()){
                $item->id = $row['id'];
                $item->descripcion = $row['descripcion'];

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
      
        $sentenceSQL="INSERT INTO tipo_documento( id, descripcion) VALUES( :id, :descripcion)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                'id' => $datos['id'],
                'descripcion' => $datos['descripcion'],
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
        $query = $this->db->connect()->prepare('DELETE FROM tipo_documento WHERE id = :id');
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