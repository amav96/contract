<?php

  require_once '../config/parametros.php';
 require_once '../config/db.php';
require_once '../model/usuario.php';

// if(isset($_GET["usuario"])){

//     $controlador = new usuarioController;
//     $accion = $_GET["usuario"];
//     $controlador->$accion();

// }

if(isset($_GET["usuario"])  &&  isset($_GET["accion"])){
    $accion = $_GET["accion"];
    $controlador = new usuarioController;
    
    if(method_exists($controlador, $accion)){
        
        $controlador->$accion();
        
    }else {
        header('Location:' .base_url);
    }

}else {
    header('Location:' .base_url);
}



   class usuarioController{

        public function showContract(){
            

                if(isset($_GET["dfc"])){

                    $identificacion = $_GET["dfc"];
                    $firma = new Usuarios();
                    $firma->setIdentificacion($identificacion);
                    $firma = $firma->gettAllReclute();

                    if(is_object($firma)){

                     $cliente = $firma->fetch_object();
                     require_once '../views/work/contract.php';
                       
                       
                    }else{

                        header('Location:' .base_url ."views/error/dont_exist.php");
                    }
                   
                }else {
                    echo "aca haces algo para demostrar error";
                }

        }

        public function signedContract(){

            if($_POST){

                $identificacion = $_POST['documento'];
                $fecha = $_POST["fecha"];
                $key = $_POST["key"];
                $img = $_POST['dataUrl'];
                $cuit = $_POST["cuit"];
                $domicilio = $_POST["domicilio"];
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $patente = $_POST["patente"];
                $email = $_POST["email"];
                $telefono = $_POST["telefono"];
                $cbu = $_POST["cbu"];
                $banco = $_POST["banco"];

                $contrato = new Usuarios();
                $contrato->setIdentificacion($identificacion);
                $contrato->setFecha($fecha);
                $contrato->setImgFirma($img);
                $contrato->setCuit($cuit);
                $contrato->setDomicilio($domicilio);
                $contrato->setMarcaAuto($marca);
                $contrato->setModeloAuto($modelo);
                $contrato->setPatente($patente);
                $contrato->setEmail($email);
                $contrato->setTelefono($telefono);
                $contrato->setCbu($cbu);
                $contrato->setBanco($banco);
                $contrato->settersSigned();

            }
            

        }

   }


?>
