<?php 


class Usuarios{

    private $username;
    private $nombre;
    private $tipo;
    private $nro_dni;
    private $horarioSolicitud;
    private $imagenFirma;
    private $cuit;
    private $domicilio;
    private $vehiculoMarca;
    private $vehiculoModelo;
    private $patente;
    private $email;
    private $telefono_celular;
    private $cbu;
    private $banco;
    private $idenviado;
    private $status;
    private $horario_disponible;
    
    private $db;


    public function __construct(){

        $this->db=Database::connect();
    }

    public function getUsername(){
        return $this->username;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getNro_dni(){
        return $this->nro_dni;
    }
    public function getHorarioSolicitud(){
        return $this->horarioSolicitud;
    }
    public function getImagenFirma(){
        return $this->imagenFirma;
    }
    public function getCuit(){
        return $this->cuit;
    }
    public function getDomicilio(){
        return $this->domicilio;
    }
    public function getVehiculoMarca(){
        return $this->vehiculoMarca;
    }
    public function getVehiculoModelo(){
        return $this->vehiculoModelo;
    }
    public function getPatente(){
        return $this->patente;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono_celular(){
        return $this->telefono_celular;
    }

    public function getCbu(){
        return $this->cbu;
    }

    public function getBanco(){
        return $this->banco;
    }
    public function getIdenviado(){
        return $this->idenviado;
    }
    public function getStatus(){
        return $this->status;
    }

    public function getHorario_disponible(){
        return $this->horario_disponible;
    }

    public function setUsername($username){
        $this->username=$this->db->real_escape_string($username);
    }
    public function setNombre($nombre){
        $this->nombre=$this->db->real_escape_string($nombre);
    }
    public function setTipo($tipo){
        $this->tipo=$this->db->real_escape_string($tipo);
    }


    public function setNro_dni($nro_dni){
        $this->nro_dni=$this->db->real_escape_string($nro_dni);
    }

    public function setHorarioSolicitud($horarioSolicitud){
        $this->horarioSolicitud=$horarioSolicitud;
    }

    public function setImagenFirma($imagenFirma){
        $this->imagenFirma=$imagenFirma;
    }
    
    public function setCuit($cuit){
        $this->cuit=$this->db->real_escape_string($cuit);
    }
    public function setDomicilio($domicilio){
        $this->domicilio=$this->db->real_escape_string($domicilio);
    }
    public function setVehiculoMarca($vehiculoMarca){
        $this->vehiculoMarca=$this->db->real_escape_string($vehiculoMarca);
    }
    public function setVehiculoModelo($vehiculoModelo){
        $this->vehiculoModelo=$this->db->real_escape_string($vehiculoModelo);
    }
    public function setPatente($patente){
        $this->patente=$this->db->real_escape_string($patente);
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setTelefono_celular($telefono_celular){
        $this->telefono_celular=$this->db->real_escape_string($telefono_celular);
    }

    public function setCbu($cbu){
        $this->cbu=$this->db->real_escape_string($cbu);
    }

    public function setBanco($banco){
        $this->banco=$this->db->real_escape_string($banco);
    }
    public function setIdenviado($idenviado){
        $this->idenviado=$this->db->real_escape_string($idenviado);
    }

    public function setStatus($status){
        $this->status=$this->db->real_escape_string($status);
    }

    public function setHorario_disponible($horario_disponible){
        $this->horario_disponible=$horario_disponible;
    }




  
    public function gettAllReclute(){
        
           $result = false;
           $sql ="";

           
           
           if(isset($_POST["key"]) && $_POST["key"]==='all'){
            $sql.="SELECT * from reclute order by momento desc ";
           }
            if(isset($_REQUEST["numerodoc"]) ||  !empty($_REQUEST["numerodoc"])) {
              $sql.=" SELECT * from reclute where id_number like '%{$this->getNro_dni()}%' or last_name like '%{$this->getNro_dni()}%' or first_name  like '%{$this->getNro_dni()}%' order by momento desc";
           }
        

           $usuario = $this->db->query($sql);
           if($usuario && $usuario->num_rows > 0){
               $result = $usuario;
           }else {
               $result = false;
           }
           return $result;
           
       
    }

    public function settersSigned(){

        if($_REQUEST){

            
              $result = false;
              $base_to_php = explode(',', $this->getImagenFirma());
              $data = base64_decode($base_to_php[1]);
              $filepath = '../resources/firmas/contrato'.$this->getHorarioSolicitud().$this->getnro_dni().'.png';
              $guardarimagen = file_put_contents($filepath, $data, FILE_APPEND);
              if(file_exists($filepath)){

                 if($this->setContractEnded()){
                    $result= 'actualizado';
                 }else {
                    $result = 'no-actualizado';
                 }

              }else{

                  $result= 'no-ingreso-firma';
              }

              return $result;
        }

    }

    private function setContractEnded(){

        $nameImg = 'contrato'.$this->getHorarioSolicitud().$this->getNro_dni().'.png'; 

        $result = false;

        if(isset($_POST["email"]) && !empty($_POST["email"]) ){

            $sql= "UPDATE reclute set status='contrato-firmado', mail='{$this->getEmail()}',phone_number='{$this->getTelefono_celular()}',cbu='{$this->getCbu()}',banco='{$this->getBanco()}',status_process='signedcontract',img_signed='$nameImg',signed_date='{$this->getHorarioSolicitud()}',cuit='{$this->getCuit()}',vehicle_brand='{$this->getVehiculoMarca()}',vehicle_model='{$this->getCuit()}',patent='{$this->getPatente()}',name_ecommerce='{$this->getNombre()}',customer_service_hours='{$this->getHorario_disponible()}' where id_number='{$this->getNro_dni()}'";
        } else {

            $sql= "UPDATE reclute set status='contrato-firmado',cbu='{$this->getCbu()}',banco='{$this->getBanco()}',status_process='signedcontract',img_signed='$nameImg',signed_date='{$this->getHorarioSolicitud()}',cuit='{$this->getCuit()}',name_ecommerce='{$this->getNombre()}',customer_service_hours='{$this->getHorario_disponible()}' where id_number='{$this->getNro_dni()}'";
           
        }
       
       
        
        $actualizar = $this->db->query($sql); 
       
        if($actualizar){
            
            $result = true;
            
        }else {
           
            $result = false;

        }
        return $result;
     

    }

    public function setStatusUser(){

        $result = false;

        if(isset($_POST["status_reco"]) && $_POST["status_reco"] === 'active'){

            $sql ="INSERT INTO recolectores (id,tipo,nombre_recolector,email,id_reclute,status,momento) values 
            ('{$this->getUsername()}','{$this->getTipo()}','{$this->getNombre()}','{$this->getEmail()}','{$this->getIdenviado()}','{$this->getStatus()}',NOW())";
            
            
             
             $ejecutar = $this->db->query($sql);
    
             if($ejecutar){
                
                
                if($this->setStatusReclute()){
                  
                    $result = 'set-update';
                }else {
                    
                    $result= 'no-update';
                }
             }else {
    
                
                 $result =  'exist-id';
             }
             
        } if(isset($_POST["status_reco"]) && $_POST["status_reco"] === 'down' ||  $_POST["status_reco"] === 'activeExist'){

            $sql = "UPDATE recolectores set status='{$this->getStatus()}' where id_reclute='{$this->getIdenviado()}'";
            
            $ejecutar = $this->db->query($sql);
            if($ejecutar){
                
                
                if($this->setStatusReclute()){
                  
                    $result = 'set-update';
                }else {
                    
                    $result= 'no-update';
                }
             }else {
    
                
                 $result =  'exist-id';
             }
             

        }
    
         return $result;
    }


    public function setStatusReclute(){
        $result = false;
        $sql = "UPDATE reclute set status_process='{$this->getStatus()}' where id='{$this->getIdenviado()}'";
       
        $status = $this->db->query($sql);

        if($status){
            $result = true;

        }else {
            $result = false;
        }
        return $result;
    }

    public function getIDACTIVO(){
        if($_POST){
            $result = false;
            $sql = "SELECT reclu.id AS 'idReclute', reco.id AS 'idUsuario' FROM recolectores reco 
            INNER JOIN reclute reclu ON reclu.id = reco.id_reclute WHERE reclu.id='{$this->getIdenviado()}'"; 
            $ejecutar = $this->db->query($sql);
            if($ejecutar && $ejecutar->num_rows>0){
                $result = $ejecutar;

            }else {
                $result = false;
            }
            return $result;

        }
    }
    public function getAllUsuariosRecolectores(){
    

            $result = false;
             if(isset($_POST["usuario"])){
                 
                 $sql =  "SELECT * from recolectores where id='{$this->getIdenviado()}'";
                
                 $ejecucion = $this->db->query($sql);

                
                 if($ejecucion && $ejecucion->num_rows>0){

                    $result = $ejecucion;

                 }else{
                     $result= false;
                 }
                 return $result;

             }else if($this->getIdenviado() === 'todos'){

                $sql =  "SELECT * from recolectores";
               
                 $ejecucion = $this->db->query($sql);

                 if($ejecucion && $ejecucion->num_rows>0){

                    $result = $ejecucion;

                 }else{
                     $result= false;
                 }
                 return $result;

             }

    }
    
}