<?php 




if(isset($_POST['id'])){
   
    MostrarDatos();
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
                'edad'       => $row['employee_age'],
               'fechaNac'    => $row['date_of_birth'],
               'documento'   => $row['dni'],
               'nroDoc'      => $row['id_number'],
               'docVenc'     => $row['id_expiration_date'],
               'comoConocio' => $row['knowledge_path'],
                'seguroDese' => $row['unemployment_insurance'],
               'seguroVence' => $row['insurance_expiration_date'],
                 'domicilio' => $row['home_address'],
               'entreCalles' => $row['between_streets'],
                 'localidad' => $row['location'],
                 'ultAporte' => $row['last_contribution'],
              'tipoVivienda' => $row['living_place'],
                   'telFijo' => $row['landline_number'],
                  'telMovil' => $row['phone_number'],
                    'correo' => $row['mail'],
                    'eCivil' => $row['civil_status'],
                     'hijos' => $row['sons'],
       'estudiosCompletados' => $row['studies_completed'],
            'estuTerminados' => $row['finished'],
        'otrosConocimientos' => $row['other_knowledge'],
           'diasDisponibles' => $row['available_days'],
       'horariosDisponibles' => $row['available_schedules'],
              'renumeracion' => $row['renumbering'],
            'vehiculoPropio' => $row['own_vehicle'],
              'tipoVehiculo' => $row['vehicle_type'],
               'anoVehiculo' => $row['year_of_vehicle'],
                  'licencia' => $row['drivers_license'],
             'licenciaVence' => $row['drivers_license_expiration'],                  
    'empresaTrabajoAnterior' => $row['business'],
              'rubroEmpresa' => $row['business_sector'],
             'inicioEmpresa' => $row['start_date'],
              'finalEmpresa' => $row['finish_date'],
           'telefonoEmpresa' => $row['company_phone_number'],
           'contactoEmpresa' => $row['contact_company'],
               'razonSalida' => $row['reason_egress'],
 'antecedentesRestricciones' => $row['antecedents_or_restrictions'],
             'observaciones' => $row['observations'],
                     'firma' => $row['firm'],
                'aclaracion' => $row['clarification'],
                      'tipo' => $row['type']

           
        );
   
    }
   
    $jsonstring = json_encode($json);
    echo $jsonstring;
}




