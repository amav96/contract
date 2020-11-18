<?php
session_start();
    require_once '../config/parametros.php';
    require_once '../config/db.php';
    require_once '../model/usuario.php';
    require_once '../helpers/utils.php';


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

        public function getData(){
            require_once '../views/work/enter.php';
        }

        public function showContract(){
            
             if(isset($_REQUEST["numerodoc"]) || isset($_POST["key"])){

                 $identificacion = $_REQUEST["numerodoc"];
                 $firma = new Usuarios();
                 $firma->setNro_dni($identificacion);
                 $firma = $firma->gettAllReclute();

                  if(is_object($firma)){

                      $cliente = $firma->fetch_object();
                      require_once '../views/work/contract.php';
                     
                     }else{
                       
                      $_SESSION["error_usuario_contract"] = 'noExisteUsuario';

                      header("Location:".base_url."control/usuarioControllers.php?usuario&accion=getData");
    
                     }


             }else {
                 echo "aca haces algo para demostrar error";
             }
            
        }


        public function signedContract(){

            if($_POST){

                $identificacion = !empty($_POST['documento']) ? $_POST["documento"] : false;
                $fecha = !empty($_POST["fecha"]) ? $_POST["fecha"] : false;
                $key = !empty($_POST["key"]) ? $_POST["key"] : false;
                $img = !empty($_POST['dataUrl']) ? $_POST["dataUrl"] : false;
                $cuit = !empty($_POST["cuit"]) ? $_POST["cuit"] : false;
                $domicilio = !empty($_POST["domicilio"]) ? $_POST["domicilio"] : false;
                $marca = !empty($_POST["marca"]) ? $_POST["marca"] : false;
                $modelo = !empty($_POST["modelo"]) ? $_POST["modelo"] : false;
                $patente = !empty($_POST["patente"]) ? $_POST["patente"] : false;
                $email = !empty($_POST["email"]) ? $_POST["email"] : false;
                $telefono = !empty($_POST["telefono"]) ? $_POST["telefono"] : false;
                $cbu = !empty($_POST["cbu"]) ? $_POST["cbu"] : false;
                $banco = !empty($_POST["banco"]) ? $_POST["banco"] : false;

                if($identificacion && $fecha && $img && $cuit && $domicilio && $marca && $modelo && $patente
                && $email && $telefono && $cbu && $banco){

                
                $contrato = new Usuarios();
                $contrato->setNro_dni($identificacion);
                $contrato->setHorarioSolicitud($fecha);
                $contrato->setImagenFirma($img);
                $contrato->setCuit($cuit);
                $contrato->setDomicilio($domicilio);
                $contrato->setVehiculoMarca($marca);
                $contrato->setVehiculoModelo($modelo);
                $contrato->setPatente($patente);
                $contrato->setEmail($email);
                $contrato->setTelefono_celular($telefono);
                $contrato->setCbu($cbu);
                $contrato->setBanco($banco);
                $contrato = $contrato->settersSigned();
                

                 if($contrato  === 'actualizado'){

                    $objeto[]=array(
                        'result' => '1',
                    );

                 }else if($contrato  === 'no-actualizado'){

                    $objeto[]=array(
                        'result' => '2',
                    );

                 }
                 else if($contrato  === 'no-ingreso-firma'){

                    $objeto[]=array(
                        'result' => '3',
                    );

                 }
               
                }else {

                    $objeto[]=array(
                        'result' => '4',
                    );
                }

                $jsonstring= json_encode($objeto);
                echo $jsonstring;

                

            }
            

        }

        public function request(){
            
                    $documento = isset($_POST["numerodoc"])?$_POST["numerodoc"]:false;
                    $solicitudes = new Usuarios();
                    $solicitudes->setNro_dni($documento);
                    $solicitudes = $solicitudes->gettAllReclute();
                    
                    if(is_object($solicitudes)){

            
                            foreach($solicitudes as $row){


                        $objeto[]=array(
                            'result' => '1',
                            
                            'id'                   => $row['id'],
                            'nombre'               => $row['first_name'],
                            'apellido'             => $row['last_name'],
                            'fechaNac'              => $row['date_of_birth'],
                            'documento'             => $row['dni'],
                            'nroDoc'                => $row['id_number'],
                        
                            'comoConocio'           => $row['knowledge_path'],
                            'seguroDese'           => $row['unemployment_insurance'],
                            'seguroVence'           => $row['insurance_expiration_date'],
                            'domicilio'           => $row['home_address'],
                            'localidad'           => $row['location'],
                                'telMovil'           => $row['phone_number'],
                                'correo'           => $row['mail'],
                                'eCivil'           => $row['civil_status'],
                                'hijos'           => $row['sons'],
                    'estudiosCompletados'           => $row['studies_completed'],
                    'horariosDisponibles'           => $row['available_schedules'],
                    
                            'tipoVehiculo'           => $row['vehicle_type'],
                                'licencia'           => $row['drivers_license'],
                        'licenciaVence'           => $row['drivers_license_expiration'],                  
                'empresaTrabajoAnterior'           => $row['business'],
                        
                        'inicioEmpresa'           => $row['start_date'],
                            'finalEmpresa'           => $row['finish_date'],
            'antecedentesRestricciones'           => $row['antecedents_or_restrictions'],
                        'observaciones'           => $row['observations'],
                                    'pais'           => $row['country'],
                            'provincia'           => $row['province'],
                                    'cp'           => $row['postal_code'],
                            'monotributo'           => $row['monotributo'],
                    
                        'caracteristicas'           => $row['characteristic'],
                                'estado'           => $row['status'],
            'empresaTrabajoAnteriorDos'           => $row['business_two'],
            'empresaTrabajoAnteriorTres'           => $row['business_three'],
                        'inicioEmpresaDos'           => $row['start_date_two'],
                    'inicioEmpresaTres'           => $row['start_date_three'],
                        'finalEmpresaDos'           => $row['finish_date_two'],
                        'finalEmpresaTres'           => $row['finish_date_three'],
                        'tipoDeSolicitud'           => $row['type_request'],
                                    'cbu'           => $row['cbu'],
                                    'cuit'           => $row['cuit'],
                                    'tipo'           => $row['type'],
                                'banco'           => $row['banco'],
                            'signed_date'           => $row['signed_date'],
                            'img_signed'           => $row['img_signed'],
                        'status_process'           => $row['status_process'],
                        'vehicle_brand'           => $row['vehicle_brand'],
                        'vehicle_model'           => $row['vehicle_model'],
                                'patent'           => $row['patent'],

                  );
             }

            }else {
                $objeto[]=array(
                    'result' => '2',
                );
            }
            $jsonstring=json_encode($objeto);
            echo $jsonstring;

        }
       
        public function activateUser(){
         
            if($_POST){
                $id = isset($_POST["id"])?$_POST["id"] : false;
                $nombre = isset($_POST["nombre"])?$_POST["nombre"] : false;
                $correo = isset($_POST["correo"])?$_POST["correo"] : false;
                $tipo = isset($_POST["tipo"])?$_POST["tipo"] : false;
                $id_ingreso = isset($_POST["id_ingreso"])?$_POST["id_ingreso"] : false;

                if($id && $nombre && $correo && $tipo && $id_ingreso){

                    
                    $activate = new Usuarios();
                    $activate-> setUsername($id_ingreso);
                    $activate-> setIdenviado($id);
                    $activate->setNombre($nombre);
                    $activate->setEmail($correo);
                    $activate->setTipo($tipo);
                    $activate = $activate->addUser();
                   
    
                    if($activate === 'set-update'){
    
                        $objeto[]=array(
                            'result' => '1',
                        );
                       
    
                    }if($activate === 'no-update'){
                      
    
                        $objeto[]=array(
                            'result' => '2',
                        );
                    }
                    if($activate === 'exist-id'){
    
                        $objeto[]=array(
                            'result' => '3',
                        );
                       
                    }
                }else {

                    $objeto[]=array(
                        'result' => '4',
                    );
                }
               

                $jsonstring = json_encode($objeto);
                echo $jsonstring;


                


            }
        }

   }


?>
