<?php 


if((!empty($_POST["idfirmar"]))){
    
    $idrecibo = $_POST["idfirmar"];
    $idOrden = md5($idrecibo);
    guardarImagen($idOrden);

} 


function guardarImagen($idOrden){

 $fecha = $_POST["fecha"];

// Imagen base64 enviada desde javascript en el formulario
$baseFromJavascript = $_POST['dataUrl'];

// Nuestro base64 contiene un esquema Data URI (data:image/png;base64,)
// que necesitamos remover para poder guardar nuestra imagen
// Usa explode para dividir la cadena de texto en la , (coma)
$base_to_php = explode(',', $baseFromJavascript);
// El segundo item del array base_to_php contiene la información que necesitamos (base64 plano)
// y usar base64_decode para obtener la información binaria de la imagen
$data = base64_decode($base_to_php[1]);// BBBFBfj42Pj4....

// Proporciona una locación a la nueva imagen (con el nombre y formato especifico)
$filepath = '../../resources/firmas/'.$fecha.$idOrden.'.png'; // or image.jpg

// Finalmente guarda la imágen en el directorio especificado y con la informacion dada
$guardarimagen = file_put_contents($filepath, $data, FILE_APPEND);

if($guardarimagen){

echo 1;

    limpiar($idOrden,$fecha,$baseFromJavascript,$base_to_php,$data,$filepath,$guardarimagen);
     
 }

}

 function limpiar(){
unset($idOrden,$fecha,$baseFromJavascript,$base_to_php,$data,$filepath,$guardarimagen);

 }







 
  






