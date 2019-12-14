<?php
include_once('models/usuario.php');
class usuarioModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function leer(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT username, email, contrasena FROM usuario');
            
            while($row = $query->fetch()){
                $item = new usuarioDAO();
                $item->username=$row['username'];
                $item->email=$row['email'];
                $item->contrasena=$row['contrasena'];
                
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
        $query = $this->db->connect()->prepare('UPDATE usuario SET email = :email, contrasena = :contrasena WHERE username = :username');
        try{
            $query->execute([
              
                                'username' => $item['username'],
                                'email' => $item['email'],
                                'contrasena' => $item['contrasena']
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
        $item = new usuarioDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM usuario WHERE username = :username');

            $query->execute(['username' => $id]);
            
            while($row = $query->fetch()){
                $item->username = $row['username'];
                $item->email = $row['email'];
                $item->contrasena = $row['contrasena'];

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
   
        $sentenceSQL="INSERT INTO usuario( username, email, contrasena) VALUES( :username, :email, :contrasena)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                'username' => $datos['username'],
                'email' => $datos['email'],
                'contrasena' => $datos['contrasena'],
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
        $query = $this->db->connect()->prepare('DELETE FROM usuario WHERE username = :identificador');
        try{
            $query->execute([
                'identificador' => $id
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