<?php 


 function obtenerPais(){
     include '../../control/parcel/db.php';
    $query = "SELECT * FROM pais";
    $result = mysqli_query($connection, $query);
    $json = array();
        
         while($row = mysqli_fetch_array($result)) {
             $json[] = array(
                 'nomPais' => $row['pais'],
                 'idPais' => $row['id_pais'],
             );
         }  

    $jsonstring =json_encode($json);
    echo $jsonstring;
 }

function obtenerProvincias($codPais){
    include '../../control/parcel/db.php';
    $query = "SELECT * FROM provincias_ar where id_pais= '$codPais'";
    $result = mysqli_query($connection, $query);
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'codProvincia' => $row['id_provincias'],
            'nomProvincia' => $row['provincias']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}



 function capturarCP($cP){
     include '../../control/parcel/db.php';
     $query = "SELECT cp_oper.id_operador, numeros_oper.telefono FROM cp_oper
     INNER JOIN numeros_oper ON cp_oper.id_operador=numeros_oper.id_oper WHERE cp_oper.cp ='$cP'";
     $result = mysqli_query($connection, $query);
     
     $json = array();

     if(!$result){
        die ('Query Error' . mysqli_error($connection));
    } else {
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                $json[] = array(
                    'codOper' => $row['id_operador'],
                    'telefono' => $row['telefono']
                );
    }

     } else{
        $json[] = array (
            'result' => 0
        );
        
    }
    
    
 }

 $jsonstring = json_encode($json);
 echo $jsonstring;
}

if(isset($_POST['codigoPais'])){
    $codPais = $_POST['codigoPais'];
    obtenerProvincias($codPais);
} else if (isset($_POST['TipeoInputCp'])){
    $cP = $_POST['TipeoInputCp'];
    capturarCP($cP);

} else {
    obtenerPais();
}
