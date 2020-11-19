<?php

session_start();


if(!isset($_SESSION['username']))
{
header('Location:..login/loginrecolector.php');
}
?>
<?php 
require_once('../../../vistas/include/enviarcliente/superior_enviarcliente.php')
?>
</header>
<br>
<div style="text-align:center;";>       
<h1> ¡Enviado exitosamente! </h1>
</div>
<div class="text-center">
    	<div class="container">
			<div class="abs-center">
      <div class="form-group">
      <form class="form-horizontal" action="../../../correo/enviarcliente.php" method="POST">
      <input type="submit" name="seguir" value="Corregir correo" class="btn btn-info"> 
      </form>
      </div>
      </div>
     </div>
    </div>  
    <div class="text-center">
    	<div class="container">
			<div class="abs-center">
      
      <form class="form-horizontal" action="../../../conectar/cerrar_sesion.php" method="POST">
      <input type="submit" name="seguir" value="Finalizar" class="btn btn-info"> 
      </form>
      </div>
     </div>
    </div>  
    <?php 
require_once('../../../vistas/include/enviarcliente/inferior_enviarcliente.php')
?>                      		                            