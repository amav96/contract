<?php



 

 if(isset($_POST["DatoEnviado"])){
     
    $identificacion = $_POST["DatoEnviado"];
    MostrarDatosCliente($identificacion);
 } if(isset($_POST["cp"])){
     $codigoPostal = $_POST["cp"];
     

     BuscarCp($codigoPostal);
 }

 function BuscarCp($codigoPostal){
     
    include("../../control/parcel/db.php");
    mysqli_set_charset($connection, 'utf8');
    $query="SELECT * FROM recolectores_deliver where codigo_postal='$codigoPostal'";

    $result= mysqli_query($connection,$query);

    if(!$result){
        die("Query failed." . mysqli_error($connection));
    }else{

           if($result->num_rows>0){
         
            while($row = $result->fetch_array()){
                $array[] = $row;
            }
                foreach($array as $row){
                    $row["id_medio"];
                    
                }
                
            $jsonstring=json_encode($array);
            echo $jsonstring;
           } else {
            $return = new stdClass();
            $return->fail = false;
            echo json_encode($return);
           }

        
    }

   

 }

 function MostrarDatosCliente($identificacion){

    include("../../control/parcel/db.php");
    mysqli_set_charset($connection, 'utf8');
    $query = "SELECT identificacion,empresa,nombre_cliente,provincia,direccion,localidad,codigo_postal,equipo,serie,tarjeta FROM express WHERE
    identificacion = '$identificacion'";
    $result = mysqli_query($connection,$query);

    if(!$result){
        die("Query Failed ." . mysqli_error($connection));
    }else {

      if($result->num_rows > 0){

           while($row = $result->fetch_array()){
               $array[] = $row;
           }

           foreach ($array as $row){
               $row["identificacion"];
               $row["empresa"];
           }
           
           $jsonstring=json_encode($array);
           echo $jsonstring;
           

      } else {
        $return = new stdClass();
            $return->fail = false;
            echo json_encode($return);
      }

    }
    $result->close();
    /* close connection */
    $connection->close();
   
   
   

 }