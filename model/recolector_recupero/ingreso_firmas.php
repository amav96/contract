<?php 

if(isset($_POST["idfirmar"])){
  $idACambiar= $_POST["idfirmar"];
  actualizarAclaracion($idACambiar);
}
if(!isset($_POST["idfirmar"])){
    
    echo 2;
  }


function actualizarAclaracion($idACambiar){
   

    include("../../conectar/conexion.php");

    $documento = $_POST["documento"];
    $aclaracion = $_POST["aclaracion"];
    $fecha = $_POST["fecha"];

    $converid = md5($idACambiar);

    $query = "INSERT INTO firmas VALUES(NULL,'$converid','$fecha',
    '$aclaracion','$documento',null)
    ";
    
    

    $result = mysqli_query($con,$query);

    if(!$result){
        die ("Query Failed :" . mysqli_error($con));
    }
echo 1;


  }


