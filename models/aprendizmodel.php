<?php
include_once('models/aprendiz.php');
class AprendizModel extends Model{
    function __construct(){
        parent::__construct();
    }

    public function CargarFichas(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT nroficha, programa FROM ficha');
            include_once('models/ficha.php');
            while($row = $query->fetch()){
                $item = new FichaDAO();
                $item->nroficha=$row['nroficha'];
                $item->programa=$row['programa'];
                
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
    public function CargarTipodocs(){
        $items = [];
        try{
            $query = $this->db->connect()->query('SELECT id FROM tipo_documento');
            include_once('models/tipodoc.php');
            while($row = $query->fetch()){
                $item = new tipodocDAO();
                $item->id=$row['id'];
                
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
            $query = $this->db->connect()->query('SELECT documento, nombres, apellidos, email, fecha_exp_documento, lugar_exp_documento, fecha_nacimiento, lugar_nacimiento, direccion, celular, whatsapp, eps, rh, acudiente, celular_acudiente, tipo_documento_id, estilos_aprendizaje, ficha_nroficha, total_fallas FROM aprendiz');
            
            while($row = $query->fetch()){
                $item = new AprendizDAO();
                $item->documento=$row['documento'];
                $item->nombres=$row['nombres'];
                $item->apellidos=$row['apellidos'];
                $item->email=$row['email'];
                $item->fecha_exp_documento=$row['fecha_exp_documento'];
                $item->lugar_exp_documento=$row['lugar_exp_documento'];
                $item->fecha_nacimiento=$row['fecha_nacimiento'];
                $item->lugar_nacimiento=$row['lugar_nacimiento'];
                $item->direccion=$row['direccion'];
                $item->celular=$row['celular'];
                $item->whatsapp=$row['whatsapp'];
                $item->eps=$row['eps'];
                $item->rh=$row['rh'];
                $item->acudiente=$row['acudiente'];
                $item->celular_acudiente=$row['celular_acudiente'];
                $item->tipo_documento_id=$row['tipo_documento_id'];
                $item->estilos_aprendizaje=$row['estilos_aprendizaje'];
                $item->ficha_nroficha=$row['ficha_nroficha'];
                $item->total_fallas=$row['total_fallas'];
                
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
        $query = $this->db->connect()->prepare('UPDATE aprendiz SET nombres = :nombres, apellidos = :apellidos, email = :email, fecha_exp_documento = :fecha_exp_documento, lugar_exp_documento = :lugar_exp_documento, fecha_nacimiento = :fecha_nacimiento, lugar_nacimiento = :lugar_nacimiento, direccion = :direccion, celular = :celular, whatsapp = :whatsapp, eps = :eps, rh = :rh, acudiente = :acudiente, celular_acudiente = :celular_acudiente, tipo_documento_id = :tipo_documento_id, estilos_aprendizaje = :estilos_aprendizaje, ficha_nroficha = :ficha_nroficha WHERE documento = :documento');
        try{
            $query->execute([
              
                                'documento' => $item['documento'],
                                'nombres' => $item['nombres'],
                                'apellidos' => $item['apellidos'],
                                'email' => $item['email'],
                                'fecha_exp_documento' => $item['fecha_exp_documento'],
                                'lugar_exp_documento' => $item['lugar_exp_documento'],
                                'fecha_nacimiento' => $item['fecha_nacimiento'],
                                'lugar_nacimiento' => $item['lugar_nacimiento'],
                                'direccion' => $item['direccion'],
                                'celular' => $item['celular'],
                                'whatsapp' => $item['whatsapp'],
                                'eps' => $item['eps'],
                                'rh' => $item['rh'],
                                'acudiente' => $item['acudiente'],
                                'celular_acudiente' => $item['celular_acudiente'],
                                'tipo_documento_id' => $item['tipo_documento_id'],
                                'estilos_aprendizaje' => $item['estilos_aprendizaje'],
                                'ficha_nroficha' => $item['ficha_nroficha']
                                
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
        $item = new aprendizDAO();
        try{
            $query = $this->db->connect()->prepare('SELECT * FROM aprendiz WHERE documento = :documento');

            $query->execute(['documento' => $id]);
            
            while($row = $query->fetch()){
                $item->documento = $row['documento'];
                $item->nombres = $row['nombres'];
                $item->apellidos = $row['apellidos'];
                $item->email = $row['email'];
                $item->fecha_exp_documento = $row['fecha_exp_documento'];
                $item->lugar_exp_documento = $row['lugar_exp_documento'];
                $item->fecha_nacimiento = $row['fecha_nacimiento'];
                $item->lugar_nacimiento = $row['lugar_nacimiento'];
                $item->direccion = $row['direccion'];
                $item->celular = $row['celular'];
                $item->whatsapp = $row['whatsapp'];
                $item->eps = $row['eps'];
                $item->rh = $row['rh'];
                $item->acudiente = $row['acudiente'];
                $item->celular_acudiente = $row['celular_acudiente'];
                $item->tipo_documento_id = $row['tipo_documento_id'];
                $item->estilos_aprendizaje = $row['estilos_aprendizaje'];
                $item->ficha_nroficha = $row['ficha_nroficha'];

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
        $misestilos="";
        foreach($datos["estilos"] as $estilo){
            $misestilos=$misestilos."-".$estilo;
        }
        $sentenceSQL="INSERT INTO aprendiz( documento, nombres, apellidos, email, fecha_exp_documento, lugar_exp_documento, fecha_nacimiento, lugar_nacimiento, direccion, celular, whatsapp, eps, rh, acudiente, celular_acudiente, tipo_documento_id, estilos_aprendizaje, ficha_nroficha) VALUES( :documento, :nombres, :apellidos, :email, :fecha_exp_documento, :lugar_exp_documento, :fecha_nacimiento, :lugar_nacimiento, :direccion, :celular, :whatsapp, :eps, :rh, :acudiente, :celular_acudiente, :tipo_documento_id, :estilos_aprendizaje, :ficha_nroficha)";
        $connexionDB=$this->db->connect();
        $query = $connexionDB->prepare($sentenceSQL);
        
        try{
            $query->execute([
                'documento' => $datos['documento'],
                'nombres' => $datos['nombres'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'fecha_exp_documento' => $datos['fecha_exp_documento'],
                'lugar_exp_documento' => $datos['lugar_exp_documento'],
                'fecha_nacimiento' => $datos['fecha_nacimiento'],
                'lugar_nacimiento' => $datos['lugar_nacimiento'],
                'direccion' => $datos['direccion'],
                'celular' => $datos['celular'],
                'whatsapp' => $datos['whatsapp'],
                'eps' => $datos['eps'],
                'rh' => $datos['rh'],
                'acudiente' => $datos['acudiente'],
                'celular_acudiente' => $datos['celular_acudiente'],
                'tipo_documento_id' => $datos['tipo_documento'],
                'estilos_aprendizaje' => $misestilos, 
                'ficha_nroficha' => $datos['ficha_nroficha'],  
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
        $query = $this->db->connect()->prepare('DELETE FROM aprendiz WHERE documento = :identificador');
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