<?php
   class conectar{
        private $servidor="192.99.46.110";
        private $usuario="postalmarketing";
        private $bd="reality2_postalmarketing";
        private $password="Samsung5#";
        
        
        

        public function conexion(){
             $conexion=mysqli_connect($this->servidor,
                                      $this->usuario,
                                      $this->password,
                                      $this->bd);

          return $conexion;
        }

   }

   $obj = new conectar();
   if ($obj->conexion()){
      
   } else {
       echo "fallo conectar";
   }


?>
