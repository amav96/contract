<?php
session_start();
require_once("../conectar/conexion.php"); //Contiene funcion que conecta a la base de datos
// escaping, additionally removing everything that could be (html/javascript-) code

sleep(2);

$id_orden = $_POST['id_orden'];
$serie = $_POST['serie'];
$identificacion = $_POST['identificacion'];
$cable_hdmi = $_POST['cable_hdmi'];
$cable_av = $_POST['cable_av'];
$fuente = $_POST['fuente'];
$control_1 = $_POST['control_1'];
$estado = $_POST['estado'];
$horario_rec = $_POST['horario_rec'];
$adicional = $_POST['adicional'];
$id_recolector = $_POST['id_recolector'];
$otrosaccesorios = $_POST['otrosaccesorios'];
$id_orden_pass = $_POST['id_orden_pass'];
 $id_orden_pass = md5($id_orden_pass);


$sql1 = "SELECT identificacion
FROM express WHERE 
identificacion='$identificacion'";

$resultado = $con->query($sql1);
$conidentificacion = mysqli_fetch_array($resultado);

// echo "$sql1".'<br>';
// echo 'aca entro y encuentro en la bd->'.$conidentificacion['identificacion'].'<br>';
$sql2 = "SELECT serie
FROM autorizar WHERE 
serie='$serie'";


$resultado2 = $con->query($sql2);
$conserie = mysqli_fetch_array($resultado2);


// echo "$sql2".'<br>';
// echo 'aca entro y encuentro en la bd->'.$conserie['serie'].'<br>';
$identificaciontrue= ($conidentificacion>0) ? true : false;
$serietrue= ($conserie<1) ? true: false;

if ($identificaciontrue) {
	// echo 'identificacion existe<br>';

if($serietrue){
	// echo 'serie no existe<br>';

	if($identificacion && $serietrue){
		$sql = "INSERT INTO autorizar (id_recolector_2, order_rec, serie, identificacion, cable_hdmi, cable_av, fuente,control_1,estado_rec,horario_rec,
	adicional,otrosaccesorios,id_orden_pass) VALUES ('$id_recolector','$id_orden','$serie','$identificacion','$cable_hdmi','$cable_av','$fuente','$control_1','$estado','$horario_rec','$adicional','$otrosaccesorios','$id_orden_pass')";
	$insert = $con->query($sql) or die($mysqli->errno);

	
	$consulta="SELECT id_orden_pass from autorizar where id_orden_pass='$id_orden_pass'";
	$result = $con->query($consulta);
	$pass = mysqli_fetch_array($result);
	$_SESSION["id_orden_pass"]=$pass;
	// echo json_encode(array('success' => 1));
	echo 1;
	}
else {
	// echo 'la serie e identificacion no existe<br>';
	// echo json_encode(array('success' => 0));
	echo 0;
   }
}
else {
	//  echo 'la serie existe<br>';
	//  echo 2;
	// echo json_encode(array('success' => 2));
	echo 2;
}
} else {
	//  echo 'la identificacion no existe<br>';
	//  echo 3;
	// echo json_encode(array('success' => 3));
	echo 3;
}


?>