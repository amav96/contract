<?php


function mostrarSolicitud()
{

  include('../../control/parcel/db.php');
  $id = $_POST['id'];
  if (isset($_POST['id'])) {


    $query = "SELECT * FROM reclute where id='$id'";
    $result = mysqli_query($connection, $query);


    if (!$result) {
      die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while ($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'id' => $row['id']
      );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
  }
}

mostrarSolicitud();




function LeerNotificacion()
{
  $id = $_POST['id'];

  if (isset($_POST['id'])) {
    include('../../control/parcel/db.php');
    $query2 = "UPDATE reclute SET estado=('leido')
       where id='$id';";
    $result2 = mysqli_query($connection, $query2);
    if (!$result2) {
      die('Query Failed' . mysqli_error($connection));
    }
  }
}

LeerNotificacion();



