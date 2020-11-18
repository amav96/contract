<?php 




if(isset($_POST['id'])){
   
    MostrarDatos();
    CambiarEstado();
} else {
    echo "no hay na";
}



function MostrarDatos(){
    include('../../control/parcel/db.php');
    $id=$_POST['id'];

    $query = "SELECT * FROM reclute where id='$id'";
    $result=mysqli_query($connection,$query);
   
    if(!$result){
        die('Query Failed' . mysqli_error($connection));
    }
   
    $json = array();
    while ($row = mysqli_fetch_array($result)){
        $json[] = array(
                'id'         => $row['id'],
                'nombre'     => $row['first_name'],
                'apellido'   => $row['last_name'],
               'fechaNac'    => $row['date_of_birth'],
               'documento'   => $row['dni'],
               'nroDoc'      => $row['id_number'],
               
               'comoConocio' => $row['knowledge_path'],
                'seguroDese' => $row['unemployment_insurance'],
               'seguroVence' => $row['insurance_expiration_date'],
                 'domicilio' => $row['home_address'],
                 'localidad' => $row['location'],
                  'telMovil' => $row['phone_number'],
                    'correo' => $row['mail'],
                    'eCivil' => $row['civil_status'],
                     'hijos' => $row['sons'],
       'estudiosCompletados' => $row['studies_completed'],
       'horariosDisponibles' => $row['available_schedules'],
           
              'tipoVehiculo' => $row['vehicle_type'],
                  'licencia' => $row['drivers_license'],
             'licenciaVence' => $row['drivers_license_expiration'],                  
    'empresaTrabajoAnterior' => $row['business'],
              
             'inicioEmpresa' => $row['start_date'],
              'finalEmpresa' => $row['finish_date'],
 'antecedentesRestricciones' => $row['antecedents_or_restrictions'],
             'observaciones' => $row['observations'],
                      'pais' => $row['country'],
                 'provincia' => $row['province'],
                        'cp' => $row['postal_code'],
               'monotributo' => $row['monotributo'],
           
           'caracteristicas' => $row['characteristic'],
                    'estado' => $row['status'],
 'empresaTrabajoAnteriorDos' => $row['business_two'],
'empresaTrabajoAnteriorTres' => $row['business_three'],
          'inicioEmpresaDos' => $row['start_date_two'],
         'inicioEmpresaTres' => $row['start_date_three'],
           'finalEmpresaDos' => $row['finish_date_two'],
          'finalEmpresaTres' => $row['finish_date_three'],
           'tipoDeSolicitud' => $row['type_request'],
           'cbu' => $row['cbu'],
                      'tipo' => $row['type']

           
        );
   
    }
   
    $jsonstring = json_encode($json);
    echo $jsonstring;
}

function CambiarEstado(){

    include('../../control/parcel/db.php');
    $id=$_POST['id'];

    $query= "UPDATE reclute SET status=('Leido') where id='$id'";
    $result=mysqli_query($connection,$query);
   
    if(!$result){
        die('Query Failed' . mysqli_error($connection));
    }

}




