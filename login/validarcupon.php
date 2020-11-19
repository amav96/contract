<?php
//$_SESSION["newsession"]=$value;

$identificacion=$_POST['identificacion'];

//conectar a la base de datos //
    $conexion = mysqli_connect("192.99.46.110", "postalmarketing", "Samsung56#", "reality2_postalmarketing");
    $consulta="SELECT * FROM express WHERE identificacion='$identificacion'"; //VALIDANDO id de la TABLA express//
    $resultado=mysqli_query($conexion, $consulta);
   
    $filas=mysqli_num_rows($resultado);
    if ($filas>0) {
        $resultado = mysqli_fetch_array($resultado, MYSQLI_BOTH);
         
        SESSION_START();
        $_SESSION["cupon"] = $identificacion['identificacion'];
    	header('location:../descargacupon.php');
    } else {
    	echo ("Error en la autenticacion");
    }
    mysqli_close($conexion);
?>
  