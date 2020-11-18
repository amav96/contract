<?php 
 include_once('../../control/parcel/db.php');

//  $fechauno = $_POST['ReciboFechaReporteUno'];
//  $fechados = $_POST['ReciboFechaReporteDos'];
 
$fechauno = $_POST['ReciboFechaReporteUno'];
  $fechados = $_POST['ReciboFechaReporteDos'];
   if(!empty($fechauno)){
    mysqli_set_charset($connection, 'utf8');
  $query ="SELECT DISTINCT estado_rec,id_recolector_2,horario_rec,identificacion,serie,tarjeta,equipo,
  nombre_cliente,cable_hdmi,cable_av,fuente,control_1,otrosaccesorios,order_rec,direccion,provincia,localidad,codigo_postal,id_orden_pass
  FROM express 
  WHERE estado_rec IN('A-CONFIRMAR','RECUPERADO','PACTADO',
  'RECHAZADA','EN-USO','NO-TUVO-EQUIPO','NO-EXISTE-NUMERO','NO-RESPONDE','TIEMPO-ESPERA','SE-MUDO','YA-RETIRADO','ZONA-PELIGROSA','NO-TUVO-EQUIPO','N/TEL-EQUIVOCADO','NO-COINCIDE-SERIE','DESCONOCIDO-TIT','DESHABITADO','EXTRAVIADO',
  'FALLECIO','FALTAN-DATOS','RECONECTADO','ROBADO','ENTREGO-EN-SUCURSAL') 
    AND horario_rec >= '$fechauno' AND horario_rec <= '$fechados%'
  UNION SELECT estado_rec,id_recolector_2,horario_rec,identificacion,serie,tarjeta,equipo,
  nombre_cliente,cable_hdmi,cable_av,fuente,control_1,otrosaccesorios,order_rec,direccion,provincia,localidad,codigo_postal,id_orden_pass
  FROM autorizar
  WHERE estado_rec IN('A-CONFIRMAR','RECUPERADO','PACTADO',
  'RECHAZADA','EN-USO','NO-TUVO-EQUIPO','NO-EXISTE-NUMERO','NO-RESPONDE','TIEMPO-ESPERA',
  'SE-MUDO','YA-RETIRADO','ZONA-PELIGROSA','NO-TUVO-EQUIPO','N/TEL-EQUIVOCADO','NO-COINCIDE-SERIE','DESCONOCIDO-TIT','DESHABITADO','EXTRAVIADO',
  'FALLECIO','FALTAN-DATOS','RECONECTADO','ROBADO','ENTREGO-EN-SUCURSAL') 
    and  horario_rec >= '$fechauno' AND horario_rec <= '$fechados%' order by horario_rec DESC;";

  $result = mysqli_query($connection,$query);
 
  $json = array();

  if(!$result){
      die ('Query Error' . mysqli_error($connection));
  }else{
      if($result->num_rows > 0){
          while($row=mysqli_fetch_array($result)){

              $json[] = array (
                  'result' => 1,
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


  
 
  
//   $result->close();

//   $connection->close();

   }
