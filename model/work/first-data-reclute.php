<?php

// if (isset($_POST['numero_dni'])) {
//     $nroDocumento = $_POST['numero_dni'];
//     print_r($nroDocumento);
// } else 
if (isset($_FILES['fotodocfront']) && ($_FILES['fotodocpost']) && ($_POST["numero_dni"]) ) {
    $fotodocumentofront = $_FILES['fotodocfront']['tmp_name'];
    $fotodocumentoPost = $_FILES['fotodocpost']['tmp_name'];
    
    $nroDocumento = $_POST["numero_dni"];
    
    InsertarPrimerRegistro($nroDocumento,$fotodocumentofront, $fotodocumentoPost);
} 

function InsertarPrimerRegistro($nroDocumento,$fotodocumentofront, $fotodocumentoPost){

    include("../../control/parcel/db.php");

    $consulta="SELECT id_number from reclute where id_number='$nroDocumento'";
    $result= mysqli_query($connection,$consulta);

   

    if($result->num_rows > 0){
        echo '3';
    } else {
        
 cargarImagenesDocYMono($nroDocumento,$fotodocumentofront, $fotodocumentoPost);
 $horario_solicitud = $_POST['hora_solicitud'];
 $nombre = $_POST["nombre"];
     $apellido = $_POST["apellido"];
     $email = $_POST["email"];
     $via_conocimiento = $_POST["via_conocimiento"];
     $pais = $_POST["pais"];
     $provincia = $_POST["provincia"];
     $localidad = $_POST["localidad"];
     $domicilio = $_POST["domicilio"];
     $codigoPostal = $_POST["codigoPostal"];
     $dni = $_POST["dni"];
     $monotributo = $_POST["monotributo"];
     $caracteristica = $_POST["caracteristica"];
     $tipo_vehiculo = $_POST["tipo_vehiculo"];
     $horario_disponible = $_POST["horario_disponible"];
     $telefono_celular = $_POST["telefono_celular"];
     $cbu = $_POST["cbu"];
     $tipo = $_POST["tipo"];

     $query="INSERT INTO reclute (first_name,last_name,mail,knowledge_path,country,province,location,home_address,postal_code,dni,monotributo,characteristic,vehicle_type,available_schedules,id_number,phone_number,cbu,type_request,status,fecha) values ('$nombre','$apellido','$email','$via_conocimiento','$pais','$provincia','$localidad','$domicilio','$codigoPostal','$dni','$monotributo','$caracteristica','$tipo_vehiculo','$horario_disponible','$nroDocumento','$telefono_celular','$cbu','$tipo','Nueva','$horario_solicitud')";

     $result=mysqli_query($connection,$query);

     if(!$result){
         die("Query Failer:" .mysqli_error($connection));
     } 

     if($result){
         echo '1'; 

     } else {
         echo '2';
     }


    }

    
}


function cargarImagenesDocYMono($nroDocumento,$fotodocumentofront, $fotodocumentopost)
{

    // Primera imagen front

    $type = 'jpg';


    $fotodocumentofront = $_FILES['fotodocfront']['tmp_name'];

    $nameuno = $nroDocumento . 'front.' . $type;

    if (is_uploaded_file($fotodocumentofront)) {

        $destinouno = '../../estilos/imagenes/imgRegister/' . $nameuno;

        $nombresuno = $nameuno;
        copy($fotodocumentofront, $destinouno);
    }

    // Segunda imagen front


    $fotodocumentopost = $_FILES['fotodocpost']['tmp_name'];

    $namedos = $nroDocumento . 'post.' . $type;

    if (is_uploaded_file($fotodocumentopost)) {

        $destinodos = '../../estilos/imagenes/imgRegister/' . $namedos;

        $nombresdos = $namedos;
        copy($fotodocumentopost, $destinodos);
    }

    // Segunda imagen front

    if (isset($_FILES['infomono']['tmp_name'])) {

        $fotomonotributo = $_FILES['infomono']['tmp_name'];

        $nametres = $nroDocumento . 'mono.' . $type;

        if (is_uploaded_file($fotomonotributo)) {

            $destinotres = '../../estilos/imagenes/imgRegister/' . $nametres;

            $nombrestres = $nametres;
            copy($fotomonotributo, $destinotres);
        }
    }

    if (isset($_FILES['comprobante']['tmp_name'])) {

        $fotocuilrut = $_FILES['cuilrut']['tmp_name'];

        $namecuatro = $nroDocumento . 'cuilrut.' . $type;

        if (is_uploaded_file($fotocuilrut)) {

            $destinocuatro = '../../estilos/imagenes/imgRegister/' . $namecuatro;

            $nombrescuatro = $namecuatro;
            copy($fotocuilrut, $destinocuatro);
        }
    }

    if (isset($_FILES['comprobante']['tmp_name'])) {

        $fotocomprobante = $_FILES['comprobante']['tmp_name'];

        $namecinco = $nroDocumento . 'comprobante.' . $type;

        if (is_uploaded_file($fotocomprobante)) {

            $destinocinco = '../../estilos/imagenes/imgRegister/' . $namecinco;

            $nombrescinco = $namecinco;
            copy($fotocomprobante, $destinocinco);
        }
    }


   
    


}
