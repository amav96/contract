<?php 


class Usuarios{

    private $identificacion;
    private $fecha;
    private $imgFirma;
    private $cuit;
    private $domicilio;
    private $marcaAuto;
    private $modeloAuto;
    private $patente;
    private $email;
    private $telefono;
    private $cbu;
    private $banco;
    private $db;


    public function __construct(){

        $this->db=Database::connect();
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getImgFirma(){
        return $this->imgFirma;
    }
    public function getCuit(){
        return $this->cuit;
    }
    public function getDomicilio(){
        return $this->domicilio;
    }
    public function getMarcaAuto(){
        return $this->marcaAuto;
    }
    public function getModeloAuto(){
        return $this->modeloAuto;
    }
    public function getPatente(){
        return $this->patente;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    public function getCbu(){
        return $this->cbu;
    }

    public function getBanco(){
        return $this->banco;
    }



    public function setIdentificacion($identificacion){
        $this->identificacion=$identificacion;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function setImgFirma($imgFirma){
        $this->imgFirma=$imgFirma;
    }
    
    public function setCuit($cuit){
        $this->cuit=$cuit;
    }
    public function setDomicilio($domicilio){
        $this->domicilio=$domicilio;
    }
    public function setMarcaAuto($marcaAuto){
        $this->marcaAuto=$marcaAuto;
    }
    public function setModeloAuto($modeloAuto){
        $this->modeloAuto=$modeloAuto;
    }
    public function setPatente($patente){
        $this->patente=$patente;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function setCbu($cbu){
        $this->cbu=$cbu;
    }

    public function setBanco($banco){
        $this->banco=$banco;
    }


    public function gettAllReclute(){
        
       if($_GET){

           $result = false;
           $sql ="SELECT id_number,first_name,last_name,home_address,mail,phone_number,status_process,
           img_signed,signed_date,cuit,banco,cbu,vehicle_brand,vehicle_model,patent from reclute 
           where id_number='{$this->getIdentificacion()}'";
           $usuario = $this->db->query($sql);
          
           
           if($usuario && $usuario->num_rows ===  1){
               $result = $usuario;
           }else {
               $result = false;
           }
           return $result;
           
    
       }
    }

    public function settersSigned(){

        if($_POST){
            
              $base_to_php = explode(',', $this->getImgFirma());
              $data = base64_decode($base_to_php[1]);
              $filepath = '../resources/firmas/contrato'.$this->getFecha().$this->getIdentificacion().'.png';
              $guardarimagen = file_put_contents($filepath, $data, FILE_APPEND);
              if(file_exists($filepath)){

                 $this->setContractEnded();

              }else{
                  echo "nolsa";
              }
        }

    }

    private function setContractEnded(){

        $nameImg = 'contrato'.$this->getFecha().$this->getIdentificacion().'.png'; 

        $result = false;
        $sql = "UPDATE reclute set mail='{$this->getEmail()}',phone_number='{$this->getTelefono()}',cbu='{$this->getCbu()}',banco='{$this->getBanco()}',status_process='waiting_for_discharge',img_signed='$nameImg',signed_date='{$this->getFecha()}',cuit='{$this->getCuit()}',vehicle_brand='{$this->getMarcaAuto()}',vehicle_model='{$this->getCuit()}',patent='{$this->getPatente()}' where id_number='{$this->getIdentificacion()}'";
        $actualizar = $this->db->query($sql); 

        if($actualizar){
            
            $result = true;
            
        }else {
           
            $result = false;

        }
        die();

        // if($actualizar){

        // }
       

    }
    
}