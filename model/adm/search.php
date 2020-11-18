<?php 

include_once('../../control/parcel/db.php');

$DatoBuscar = $_POST['BuscarDato'];
mysqli_set_charset($connection, 'utf8');

 if(!empty($DatoBuscar)){

$query = "SELECT DISTINCT empresa,identificacion,serie,cpu2,tarjeta,order_rec,emailcliente,horario_rec,estado_rec,localidad,
provincia,codigo_postal,direccion,id_orden_pass,nombre_cliente,cable_hdmi,cable_av,fuente,control_1,id_recolector_2,telefono1,telefono2
 FROM express where identificacion='$DatoBuscar' or serie='$DatoBuscar' OR 
order_rec='$DatoBuscar'  or tarjeta='$DatoBuscar' or cpu2='$DatoBuscar' or id_recolector_2='$DatoBuscar' union 
SELECT empresa,identificacion,serie,cpu2,tarjeta,order_rec,emailcliente,horario_rec,estado_rec,localidad,
provincia,codigo_postal,direccion,id_orden_pass,nombre_cliente,cable_hdmi,cable_av,fuente,control_1,id_recolector_2,telefono1,telefono2
 FROM autorizar where identificacion='$DatoBuscar' or serie='$DatoBuscar' OR 
order_rec='$DatoBuscar'  or tarjeta='$DatoBuscar' or cpu2='$DatoBuscar' or id_recolector_2='$DatoBuscar' ORDER BY horario_rec DESC";
$result = mysqli_query($connection,$query);

$json = array();

if(!$result){
    die ('Query Error' . mysqli_error($connection));
}else{
    if($result->num_rows > 0){
        while($row=mysqli_fetch_array($result)){

            $json[] = array (
                'result' => 1,
                'empresa' => $row['empresa'],
                'estadoRec' => $row['estado_rec'],
                'orden' => $row['order_rec'],
                'fechaRec' => $row['horario_rec'],
                'identificacion' => $row['identificacion'],
                'serie' => $row['serie'],
                'tarjeta' => $row['tarjeta'],
                'nombreCliente' => $row['nombre_cliente'],
                'direccion' => $row['direccion'],
                'provincia' => $row['provincia'],
                'localidad' => $row['localidad'],
                'codigoPostal' => $row['codigo_postal'],
                'cableHdmi' => $row['cable_hdmi'],
                'cableAv' => $row['cable_av'],
                'fuente' => $row['fuente'],
                'control' => $row['control_1'],
                'recolector' => $row['id_recolector_2'],
                'telefono1' => $row['telefono1'],
                'telefono2' => $row['telefono2'],
                'idOrdenPass' => $row['id_orden_pass']
            );
        }
    }else{
        $json[] = array (
            'result' => 0
        );
    }

}

$jsonstring = json_encode($json);
echo $jsonstring;


 }