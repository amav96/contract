<?php 
session_start();

include('../../conectar/conexion.php');

$id_reco = $_GET["id_reco"];

$query = "SELECT id FROM ordenes where id_recolector='$id_reco' order by id desc limit 1";

$result = mysqli_query($con, $query);

if(!$result){
    die('query failed'. mysqli_error($con));
}

$json=array(); //objetos

while($row=mysqli_fetch_array($result)){
    $json[]=array( //objetos
     //[campos de BD]
    
    'id' => $row['id'],
    );
    $_SESSION['id']=$row;
    

}


$jsonstring = json_encode($json); //imprime objetos
echo $jsonstring;

?>