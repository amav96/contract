

<?php

session_start();
require_once('../../vistas/include/panelrecolector/superior_recolector.php') ?>



<?php print_r($_SESSION)   ?> 

<style>
.soli-credencial{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    margin: 5rem auto 5rem auto;
    width: 20rem;
}
.caja-obten{
    box-shadow:  0 10px 30px rgba(0,0,0,0.2);
    padding: 4px;
    background: #0093f5;
    color: white;
    border-radius: 5px;
    margin: 2rem auto;
}
.caja-obten{
    text-align: center;
}

</style>
 <h5>Aca obtendras tu credencial</h5>


 <div class="container">
     <div class="soli-credencial">
          <div class="caja-obten">
              <h4>Ingresa tu usuario para obtener credencial</h4>
          </div>
          <input value="<?= $_SESSION["username"]["username"]?> " class="form-group" id="usuario-credencial" type="hidden">
          <br>
          <button id="getCre" class="btn btn-info" >Obtener credencial</button>

     </div>
 </div>

 <script>

$("#getCre").click(function(){


    if($("#usuario-credencial").val() === ''){
        alert("no hay id")
    }else{

        var usuario = $("#usuario-credencial").val()
  

        $.ajax({
            url:"../../control/usuarioControllers.php?usuario&accion=credencial",
            type:"POST",
            data:{usuario},
            beforeSend:function(){

            }
        }).done(function(response){
            console.log(response)
        })
    }

   
})

 </script>





  <?php require_once('../../vistas/include/panelrecolector/inferior_recolector.php')  ?>
