<?php



if (isset($_POST["document"])) {
  $documento = $_POST['document'];
  insertoPrimerRegistroDeSolicitante($documento);
} else if (isset($_POST['idenviado'])) {

  $idid = $_POST['idenviado'];
 
  insertoRegistrosCompleto($idid);

}


function insertoPrimerRegistroDeSolicitante($documento)
{

  include('../../control/parcel/db.php');
  $nombre = $_POST['first_name'];
  $apellido = $_POST['last_name'];
  $employee_age = $_POST['employee_age'];
  $viaConocimiento = $_POST['knowledge_path'];
  $documento = $_POST['document'];
  $numeroDocu = $_POST['id_number'];
  $monotributo = $_POST['monotax'];
  $infoMonotributo = $_POST['infomonotax'];
  $direccion = $_POST['home_address'];
  $codigoPostal = $_POST['postal_code'];
  $localidad = $_POST['location'];
  $provincia = $_POST['province'];
  $email = $_POST['mail'];
  $nroMovil = $_POST['phone_number'];
  $tipoVehiculo = $_POST['vehicle_type'];
  $horariosDisponibles = $_POST['available_schedules'];
  $caracteristica = $_POST['characteristic'];
  $tipo = $_POST['tipo'];
 
  

  if (isset($_POST['document'])) {
    $query = "INSERT INTO reclute (first_name,last_name,employee_age,knowledge_path,
        dni,id_number,monotributo,infomonotributo,home_address,postal_code,
        location,province,mail,phone_number,vehicle_type, available_schedules,status,type_request,characteristic,status_process)
         values ('$nombre','$apellido','$employee_age','$viaConocimiento',
         '$documento','$numeroDocu','$monotributo','$infoMonotributo',
         '$direccion','$codigoPostal','$localidad','$provincia','$email',
         '$nroMovil','$tipoVehiculo','$horariosDisponibles', 'Nuevo', '$tipo','$caracteristica','registered')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
      die('Query Failed.');
      echo 2;
    }
    echo 1;
  }
}

function insertoRegistrosCompleto($idid)
{
  include('../../control/parcel/db.php');

  $idid = $_POST['idenviado'];
  $fechaNacimiento = $_POST['fechaNacimiento'];
  $venceDocumento = $_POST['venceDocumento'];
  $seguroDesempleo = $_POST['seguroDesempleo'];
  $seguroDeseVence = $_POST['seguroDeseVence'];
  $estadoCivil = $_POST['estadoCivil'];
  $hijos = $_POST['hijos'];
  $estudiosFinalizados = $_POST['estudiosFinalizados'];
  $venceLicencia = $_POST['venceLicencia'];
  $vehiculoModelo = $_POST['vehiculoModelo'];
  $ultEmpleoUno = $_POST['ultEmpleoUno'];
  $fechaInicioEmpleoUno = $_POST['fechaInicioEmpleoUno'];
  $fechaFinEmpleoUno = $_POST['fechaFinEmpleoUno'];
  $ultEmpleoDos = $_POST['ultEmpleoDos'];
  $fechaInicioEmpleoDos = $_POST['fechaInicioEmpleoDos'];
  $fechaFinEmpleoDos = $_POST['fechaFinEmpleoDos'];
  $ultEmpleoTres = $_POST['ultEmpleoTres'];
  $fechaInicioEmpleoTres = $_POST['fechaInicioEmpleoTres'];
  $fechaFinEmpleoTres = $_POST['fechaFinEmpleoTres'];
  $antecedentesRestricciones = $_POST['antecedentesRestricciones'];
  $observaciones = $_POST['observaciones'];
  $tipo = $_POST['tipo'];

  if (isset($_POST['idenviado'])) {
    $query = "UPDATE reclute set 
          date_of_birth='$fechaNacimiento',
     id_expiration_date='$venceDocumento',
     unemployment_insurance='$seguroDesempleo',
     insurance_expiration_date='$seguroDeseVence',
     civil_status='$estadoCivil',
     sons='$hijos',
     studies_completed='$estudiosFinalizados',
     drivers_license_expiration='$venceLicencia',
     vehicle_type='$vehiculoModelo',
     business='$ultEmpleoUno',
     start_date='$fechaInicioEmpleoUno',
     finish_date='$fechaFinEmpleoUno',
     business_two='$ultEmpleoDos',
     start_date_two='$fechaInicioEmpleoDos',
     finish_date_two='$fechaFinEmpleoDos',
     business_three='$ultEmpleoTres',
     start_date_three='$fechaInicioEmpleoTres',
     finish_date_three='$fechaFinEmpleoTres',
     antecedents_or_restrictions='$antecedentesRestricciones',
     observations='$observaciones', status='Completada', type_request='$tipo' WHERE id_number='$idid';";
  }
  $result = mysqli_query($connection, $query);

  if ($result > 0) {
    echo 1;
  } else {
    echo 2;
  }
}
