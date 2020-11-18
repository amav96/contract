<?php 
include('../../conectar/conexion.php');

if(isset($_POST['id_recoleorden'])){
    
    $id_recoleorden= $_POST['id_recoleorden'];
    $fecha_orden = $_POST['fecha_orden'];
    $query = "INSERT INTO ordenes (id_recolector,fecha_orden) VALUES ('$id_recoleorden','$fecha_orden')";

    $result = mysqli_query($con,$query);

    if(!$result){
        die ('query failed');
    }
    echo "tarea exitosa";


}
?>