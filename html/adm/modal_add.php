<?php
 require_once('../../conectar/conexion.php');

 ?>
<link rel="stylesheet" href="../../estilos/css/alert.css">


<script>

$(function(){
    $('#enviar').on('click', function(e){
		e.preventDefault();
		var elemento = document.getElementById("serie").value
             if (elemento == ""){
             alert("Debes llenar el campo serie.")
			 return false}
			 var elemento = document.getElementById("identificacion").value
             if (elemento == ""){
             alert("Debes llenar el campo identificacion.")
			 return false}
			 var elemento = document.getElementById("id_orden").value
             if (elemento == ""){
             alert("Debes Generar un Nro de orden.")
			 return false}
			 var elemento = document.getElementById("id_orden_pass").value
             if (elemento == ""){
             alert("Debes Generar un Nro de orden.")
             return false}

        var id_recolector = $('#id_recolector').val();
        var id_orden_pass = $('#id_orden_pass').val();
        var serie = $('#serie').val(); //los # son los id
        var identificacion = $('#identificacion').val();
        var id_orden = $('#id_orden').val();
        var estado = $('#estado').val();
        var horario_rec = $('#horario_rec').val();
        var cable_hdmi = document.forms["add_product"]["cable_hdmi"].value;
        var cable_av= document.forms["add_product"]["cable_av"].value;
	    var fuente = document.forms["add_product"]["fuente"].value;
		var control_1= document.forms["add_product"]["control_1"].value;
		var otrosaccesorios= document.forms["add_product"]["otrosaccesorios"].value;
        var adicional = $('#adicional').val();

	  

        $.ajax({
            type:"POST",
            url: "../javascriptvalidacion/insertar.php",
            data: {'id_recolector': id_recolector,
                   'id_orden_pass': id_orden_pass, 
                   'serie':serie, 
                   'identificacion':identificacion,
                   'id_orden':id_orden,
                   'estado':estado,
                   'horario_rec':horario_rec,
                   'cable_hdmi':cable_hdmi,
                   'cable_av':cable_av,
                   'fuente':fuente,
                   'control_1':control_1,
				   'adicional':adicional,
				   'otrosaccesorios':otrosaccesorios},
                beforeSend: function(){
                    $('#imagen').show();
                    $('#mensajes').html('Procesando datos...');

                },
                success:function(respuesta){
                    $('#imagen').hide();
                    if(respuesta==1){
						$('#mensajes').html('<div class="alert alert-info">Enviado correctamente');
						
                    }
                    else{
                        $('#mensajes').html('<div class="alert alert-danger">Verificar Identificación Cliente');
                    }
            }    
        })
    })
})
</script>

	<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="" method="POST" name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Equipo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
						<label><strong>Cable HDMI</strong></label>
							<div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"  name="cable_hdmi" value="Si" checked>Si
                            <input type="radio" class="custom-control-input"  name="cable_hdmi" value="No">No
                          </div>
						</div>
						<div class="form-group">
							<label><strong>Cable AV</strong></label>
							<div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"  name="cable_av" value="Si" checked>Si
                            <input type="radio" class="custom-control-input"  name="cable_av" value="No">No
                          </div>
						</div>
						
						<div class="form-group">
							<label><strong>Fuente</strong></label>
							<div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"  name="fuente" value="Si" checked>Si
                            <input type="radio" class="custom-control-input"  name="fuente" value="No">No
                          </div>
						</div>
						<div class="form-group">
							<label><strong>Control</strong></label>
							<div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"  name="control_1" value="Si" checked>Si
                            <input type="radio" class="custom-control-input"  name="control_1" value="No">No
                          </div>
						</div>
						<div class="form-group">
							<label><strong>Otro Accesorio/Opcional</strong></label>
							
                            <input type="text" class="form-control"  name="otrosaccesorios" id="otrosaccesorios">
                            
                          </div>
						<div class="form-group">
						  <label><strong>Estado</strong></label>
					        <select type="text" name="estado" id="estado" class="form-control" required>
	                        <option value="A-CONFIRMAR">A CONFIRMAR</option>
						  </select>					
						</div>
						
						<div class="form-group">
							<label><strong>Serie</strong></label>
							<input type="text" name="serie"  id="serie" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label><strong>Identificacion CTE</strong></label>
							<input type="text" name="identificacion" id="identificacion" class="form-control" required>
						</div>
						<div class="form-group">
							<label><strong>Sugerencias/Opcional</strong></label>
							<textarea type="text" name="adicional" id="adicional" class="form-control">
							</textarea>
						</div>
						
						<div class="form-group">
							
							<input type="hidden" name="id_orden"  id="id_orden" class="form-control"  required>
							
						</div>

						
						<div class="form-group">
	                    <input class="form-control" type="hidden" name="horario_rec" id="horario_rec" value="<?php date_default_timezone_set('America/Argentina/Buenos_Aires'); echo date("Y-m-d H:i:s");?>" readonly>
						</div>
						<div class="form-group">
							<label><strong>ID Recolector</strong></label>
							<input type="text" name="id_recolector"  id="id_recolector" class="form-control"  required>
							
						</div>
						<label><strong>Nro Orden</strong></label>
						<input type="text" name="id_orden_pass"  id="id_orden_pass" class="form-control"  required readonly>
					</div>
					<div class="modal-footer">
					   <div class="form-group">
					   <div id="alert"><img id="imagen" src="../../img/cargando.gif" alt="">
						<span id="mensajes"></span>


					   </div>
					   </div>
						<input type="button" class="btn btn-danger" data-dismiss="modal" value="Salir">
						<input type="submit" id="enviar" name="enviar" class="btn btn-success" value="Guardar datos">
					   
						
					</div>
				</form>
			</div>
		</div>
	</div>

<script>
	function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9 ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>