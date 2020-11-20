<?php

session_start();

require_once '../../config/parametros.php';

 require_once('../../vistas/include/panelrecolector/superior_recolector.php') 
?>

<script src="<?= base_url ?>estilos/personal/js/jquery.min.js"></script>
<script src="<?= base_url ?>estilos/personal/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url ?>estilos/personal/fontawesome/css/all.css">

<link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/panel_recolector/credencial.css">
<br>
<br>
<br>



<div class="container">
    <div class="soli-credencial" >
       
        <input value="<?= $_SESSION["username"]["id"] ?> " class="form-group" id="usuario-credencial" type="hidden">
        <br>
        <button style="font-size:16px;" id="getcre" class="btn btn-info">Obtener credencial</button>

    </div>

    <div class="credencial-contenedor">
    </div>

<br>
       <div class="soli-dorso" >
          
          
       </div>
</div>

<script>


var hoy = new Date();
        var dia = ("0" + hoy.getDate()).slice(-2);
        console.log((dia.match(+2) ))

    $(document).on("click", "#getcre", function() {

        var templateFront = "";
        var templatePost = "";

        if ($("#usuario-credencial").val() === '') {
            alert("no hay id")
        } else {
            var object = $("#usuario-credencial").val()

            $(".soli-credencial").fadeOut();

            templateFront = showCredencialFront(object)

            $(".credencial-contenedor").html(templateFront).fadeIn()
           

            templatePost = showCredencialPost()
            $(".soli-dorso").html(templatePost).fadeIn()
            

        }

    })



    function showCredencialFront() {
        var html = "";


        var hoy = new Date();
        var dia = ("0" + hoy.getDate()).slice(-2);
       
        var dateTime =hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' +
         ++dia;
       

        html += '<div class="card-credencial">';
        html += '<div class="credencial-contenido">';
        html += '<div class="cont-img">';
        html += '<img class="img-cre" src="../../estilos/imagenes/imgRegister/<?=$_SESSION["username"]["id_number"]?>persona.jpg" alt="">';
        html += '<img class="img-cre-empre"  src="../../estilos/imagenes/logo/logocir.png" alt="">';
        html += '</div>';
        html += '</div>';
        html += '<div class="credencial-contenido">';
        html += '<div class="datos-cre">';
        html += '<div class="titulo">';
        html += '<span>Nombre </span>';
        html += '</div>';
        html += '<div class="respuesta">';
        html += '<span> <?=$_SESSION["username"]["nombre_recolector"]?> </span>';
        html += '</div>';
        html += '<div class="titulo">';
        html += '<span>Trabajo </span>';
        html += '</div>';
        html += '<div class="respuesta">';
        html += '<span><?=$_SESSION["username"]["tipo"]?> </span>';
        html += '</div>';
        html += '<div class="titulo">';
        html += '<span>Documento </span>';
        html += '</div>';
        html += '<div class="respuesta">';
        html += '<span><?=$_SESSION["username"]["id_number"]?> </span>';
        html += '</div>';
        html += '<div class="titulo">';
        html += '<span >Vence </span>';
        html += '</div>';
       
        html += '<div class="respuesta vence">';
     
        html += '<span style=" box-shadow:0 10px 30px rgba(0,0,0,0.2); background:white;color:#0093f5;padding:5px;border-radius:10px;" > '+dateTime + ' </span>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        return html;
    }

    function showCredencialPost(){


        var html="";

    html += '<div class="card-credencial-post">';
       html += '<div class="credencial-contenido-post">';
            html += '<div class="img-dorso-cont">';
             html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/creantina.png">';
            html += '</div>';
            html += '<div class="img-dorso-cont">';
            html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/creiplan.png">';
        html += '</div>';
        html += '<div class="img-dorso-cont">';
            html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/cremetrotel.png">';
        html += '</div>';
        html += '<div class="img-dorso-cont">';
            html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/crecablevision.png">';
        html += '</div>';
        html += '<div class="img-dorso-cont">';
            html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/crelapos.png">';
        html += '</div>';
        html += '<div class="img-dorso-cont">';
            html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/creintv.png">';
        html += '</div>';
        html += '<div class="img-dorso-cont">';
            html += '<img class="img-dorso" src="../../estilos/imagenes/empresas/creposnet.png">';
        html += '</div>';
        
        
      
       html += '</div>';
    html += '</div>';
       
       

        return html;


    }
</script>





<?php  require_once('../../vistas/include/panelrecolector/inferior_recolector.php')  
?>