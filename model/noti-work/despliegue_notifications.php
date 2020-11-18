<?php




function ventanaNotificacion()
{
    include('../../control/parcel/db.php');
    $query = "SELECT id,first_name,last_name,type_request,
    status FROM reclute ORDER BY id desc LIMIT 15";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['first_name'],
            'apellido' => $row['last_name'],
            'tipo' => $row['type_request'],
            'estadoNotificacion' => $row['status']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
}

ventanaNotificacion();



