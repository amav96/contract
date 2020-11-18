<?php

 if (isset($_POST['identificacion'])) {
     $identificacionAComprobar = $_POST['identificacion'];
     ReciboDatosParaComprobar($identificacionAComprobar);
 }



function ReciboDatosParaComprobar($identificacionAComprobar)
{
    include('../../control/parcel/db.php');
    $query = "SELECT id_number,first_name from reclute where id_number='$identificacionAComprobar'";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed.' . mysqli_error($connection));
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $array[] = $row;
            }
            foreach ($array as $row) {
                $row["id_number"];
                $row["first_name"];

            }
           $jsonstring=json_encode($array);
           echo $jsonstring;
            // $return = new stdClass();
            // $return->success = true;
            // echo json_encode($return);
        } else {
            $return = new stdClass();
            $return->fail = false;
            echo json_encode($return);
        }
    }

    $result->close();
    /* close connection */
    $connection->close();
}

