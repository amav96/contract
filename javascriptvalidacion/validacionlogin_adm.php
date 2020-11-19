<?php
session_start();
include("../conectar/conexion.php");


$usuario=mysqli_real_escape_string($con,$_POST['usuario']); 
$clave=mysqli_real_escape_string($con,$_POST['clave']); 

//Here converting passsword into MD5 encryption. 


$result=mysqli_query($con,"SELECT usuario,clave FROM usuarios WHERE usuario='$usuario' and clave='$clave'");

$count=mysqli_num_rows($result);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    
if($count==1)
{
    echo json_encode(array('success' => 1));
    $_SESSION['usuario']=$_POST;
    
}else {
    echo json_encode(array('success' => 0));
}


?>

