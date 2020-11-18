<?php

require_once("../../control/parcel/conexion.php");

class mostrarSolicitud extends Conexion
{
  public $id;
  private $conexion;

  public function __construct()
  {
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->connect();
    $this->id = $_POST["id"];
  }


  public function mostrarDatos()
  {


    $sql = "SELECT * FROM reclute";
    $execute = $this->conexion->query($sql);
    $request = $execute->fetchall(PDO::FETCH_ASSOC);

    $json = array();
    foreach ($request as $row) {
      $json[] = array(
        'id' => $row['id'],
        'nombre' => $row['first_name']

      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }


  public function solicitudCompleta()
  {
    
    $sql2 = "SELECT * FROM reclute where id='$this->id";
    $execute2 = $this->conexion->query($sql2);
    $request2 = $execute2->fetchall(PDO::FETCH_ASSOC);

    $json = array();
    foreach ($request2 as $row) {
      $json[] = array(
        'id' => $row['id'],
        'nombre' => $row['first_name']
        

      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }
}
