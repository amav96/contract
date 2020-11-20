<?php
session_start();
include("../conectar/conexion.php");


$username=mysqli_real_escape_string($con,$_POST['username']); 

//Here converting passsword into MD5 encryption. 



$result=mysqli_query($con,"SELECT reco.id as 'id',reco.nombre_recolector,reclu.id_number,reco.tipo,reco.status  FROM recolectores reco
INNER JOIN reclute reclu
ON reco.id_reclute = reclu.id
WHERE reco.id='$username' AND reco.status IN('active','activeExist')");



$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    
if($count==1)
{

    echo json_encode(array('success' => 1));
    $_SESSION['username']=$row;
    
}else {
   
    echo json_encode(array('success' => 0));
}


?>