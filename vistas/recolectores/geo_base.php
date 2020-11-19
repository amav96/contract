<?php
session_start();

if(!isset($_SESSION['username']))
{
header('Location:../../login/loginadm.php');
}
require_once "../../conectar/bd.php";


?>
<?php require_once('../../vistas/include/panelrecolector/superior_recolector.php') ?>
 
  <body>
  
  <div class="container" style="position:inherit;">
    <div class="table-wrapper" style="position:inherit;">
      <div class="table-title" style="position:inherit;">
        <div class="row" style="position:inherit;color:black;">
          <div class="col-sm-6" style="position:inherit;">
            <b><h2>Geo Base</b></h2>
          </div>
          
          <br>
          <!--formulario generar orden -->
          <div class='col-sm-4 pull-right' >
          <form action="#" method="POST">
          <div class="form-group">
                 <input type="text" class="form-control" name="id_admin" id="id_admin" value="<?php if(isset($_SESSION['username']))
							    { echo $_SESSION['username']['username']; } ?>" placeholder="ID recolector" style="width:100px;height:25px;" >
                 <input type="hidden" class="form-control" name="fecha_orden" id="fecha_orden" value="<?php date_default_timezone_set('America/Argentina/Buenos_Aires'); echo date("Y-m-d H:i:s");?>" readonly>
                   </div>
          
          </form> 
         </div>


          <!--tabla generar orden p -->

         
          
        </div>
      </div>
      
      <!-- BUSCAR -->
      
          <div class="input-group mb-3 pull-right" >
             <input type="text" class="form-control" placeholder="Buscar Cliente" id="q">
                <span class="input-group-btn">
                  <button class="btn btn-danger" type="button" onclick="load(1);">
                  <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>
          </div>
          <br>
          <br>
          <br>
          
        
          
            
          
        
        
        
          
      
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->  
    </div>	
  </div>
</div>
	<!-- Edit Modal HTML -->
  <?php //include("../../html/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("../../html/recolector/modal_edit.php");?>
	<!-- Delete Modal HTML -->
	<?php //include("../../html/modal_delete.php");?>

<!-- cerrar sesion despues de cierto tiempo-->
<?php require_once('../../vistas/include/panelrecolector/inferior_recolector.php')  ?>
<script type="text/javascript">
	function e(q) {
    document.body.appendChild( document.createTextNode(q) );
    document.body.appendChild( document.createElement("BR") );
}
function inactividad() {
  window.location.href = "../../conectar/cerrar_sesion.php";
}
var t=null;
function contadorInactividad() {
    t=setTimeout("inactividad()",600000);
}
window.onblur=window.onmousemove=function() {
    if(t) clearTimeout(t);
    contadorInactividad();
}


</script>


	<script src="../../script/recolector/script.js"></script>
	

</body>
</html>                          		                            