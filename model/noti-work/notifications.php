<?php



function notificacion()
{

    include('../../control/parcel/db.php');

    $query = "SELECT COUNT(*) FROM reclute WHERE status IS NULL OR status !='leido';";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }
    $num_rows = mysqli_fetch_array($result);

    $jsonstring = json_encode(['cuentaDatos' => $num_rows]);
    echo $jsonstring;
}
notificacion();


