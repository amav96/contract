<?php 

 session_start();

if($_POST["usuario"] && $_POST["contrasena"]){

    $usu = $_POST["usuario"];
    $contra = $_POST["contrasena"];



     validarDatos($usu,$contra);
    
}

 function validarDatos($usu,$contra){
   
   
     include("../../control/parcel/db.php");

     $query = "SELECT * FROM usuarios where id='$usu' and password='$contra'";
    
     $result=mysqli_query($connection,$query);

   
 if(!$result){
     die("Query failed ." . mysqli_error($connection));
 } else {

     if($result->num_rows > 0){
    
         $datos= $result->fetch_array();
        
        
        
           $_SESSION["tipo"] = $datos;
           

           echo json_encode(
                     array(
                         'tipo'  => $datos["tipo"]
                          )
        );
            // $jsonstring=json_encode($array);
            // echo $jsonstring;
              

     } else {
    
        $return = new stdClass();
        $return->fail = false;
        echo json_encode($return);

    //    $arrayfalse = array(
    //        'fail' => 'false'
    //    );
    //    $string= json_encode($arrayfalse);
    //    echo $string;


     }
 }
  

   
 }