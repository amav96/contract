<style>
	.check {

		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
		align-content: center;
		align-items: center;
		text-align: center;
		margin: 0 auto;

	}

	@media (min-width:370px) {
		.check {
			width: 25rem;
		}


	}

	.check .form-group {

		margin: 0.5rem auto;

	}

	/* MOTIVO DE BAJA */

	#motivo {
		display: none;
	}

	#nroChip {
		display: none;
	}

	#chip_alt {
		display: none;
	}

	.chip {
		display: flex;
		flex-direction: row;
		justify-content: center;
		align-content: center;
		align-items: center;
		margin: 0 auto;

	}

	#Chip {
		display: none;
	}

	.opcionchip {
		background: #D6EAF8;


		width: 2.5rem;
		height: 2.5rem;

		display: flex;
		justify-content: center;
		align-content: center;
		align-items: center;
		align-self: center;
		text-align: center;
		margin-left: auto;
		margin-right: auto;
		border-radius: 50%;


	}

	.opcionchip {
		margin: 0.5rem auto;
	}

	.chip {


		padding: 0 3.5rem;
	}
</style>


<div id="editProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_product" id="edit_product">
				<div class="modal-header">
					<h4 class="modal-title">Recibir equipo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<div class="check">
							<div class="form-group">
								<label id="cable"><strong>Cable HDMI</strong></label>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="edit_cable_hdmi" value="Si entrego">Si
									<input type="radio" class="custom-control-input" name="edit_cable_hdmi" value="No entrego" checked>No
								</div>
							</div>
							<div class="form-group">
								<label id="cargador"><strong>Cable AV</strong></label>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="edit_cable_av" value="Si entrego">Si
									<input type="radio" class="custom-control-input" name="edit_cable_av" value="No entrego" checked>No
								</div>
							</div>

							<div class="form-group">
								<label id="fuente"><strong>Fuente</strong></label>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="edit_fuente" value="Si entrego">Si
									<input type="radio" class="custom-control-input" name="edit_fuente" value="No entrego" checked>No
								</div>
							</div>
							<div class="form-group">
								<label id="base"><strong>Control</strong></label>
								<div class="custom-control custom-radio">
									<input type="radio" class="custom-control-input" name="edit_control_1" value="Si entrego">Si
									<input type="radio" class="custom-control-input" name="edit_control_1" value="No entrego" checked>No
								</div>

							</div>
						</div>
						<br>
						<div class="form-group" id="motivo">
							<label><strong>Motivo de Retiro</strong></label>
							<select class="form-control" name="motivo_retiro" id="motivo_retiro">
								<option value="55 terminales-sin-movimientos">Terminales sin movimientos</option>
								<option value="49 cierre-local">Por cierre de local</option>
								<option value="50 retiro-por-deuda">Retiro por deuda</option>
								<option value="48 disconformidad-servicio">Disconformidad con el Serv.</option>
								<option value="51 cambio-razon-social">Por CRS (Cbio. Razón Soc.)</option>
								<option value="52 omnis-temporarias">Omnis temporarias</option>
								<option value="53 reduccion-de-costos">Reducción de costos</option>
								<option value="54 dejo-de-operar-c/tarjetas">Dejó de operar c/Tarjetas</option>
								<option value="56 agronacion">Agronación</option>
								<option value="57 otros-emisores">Otros emisores</option>
								<option value="58 desvinc-mayoristas">Desvinc. de mayoristas</option>
								<option value="59 otros-motivos">Otros motivos</option>
								<option value="60 entrega-en-posnet">Entrega en Posnet</option>
								<option value="61 terminales-diferidas">Terminales diferidas</option>
								<option value="62 Sistemas-propios">Sistemas propios</option>
								<option value="63 cambio-de-servicio">Cambio de servicio</option>
								<option value="54 cambio-de-domicilio">Cambio de domicilio</option>
								<option value="65 baja-adm-perdida">Baja adm - A perdida</option>
								<option value="66 baja-adm-cobradas">Baja adm - Cobradas</option>
								<option value="67 baja-por-siniestro">Baja por siniestro</option>
							</select>

						</div>

						<div class="form-group">
							<label><strong>Otro Accesorio/Opcional</strong></label>

							<input style="background-color:#D6EAF8 ;border:0;" type="text" class="form-control" name="edit_otrosaccesorios">

						</div>

					</div>
					<div class="form-group">
						<label><strong>Estado</strong></label>
						<select class="form-control" name="edit_estado_rec" id="edit_estado_rec" required>
							<option value="RECUPERADO">RECUPERADO</option>
							<option value="PACTADO">PACTADO</option>

							<option value="RECHAZADA">RECHAZADA</option>
							<option value="EN-USO">EN USO</option>
							<option value="NO-TUVO-EQUIPO">NO TUVO EQUIPO</option>
							<option value="NO-EXISTE-NUMERO">NO EXISTE NUMERO</option>
							<option value="NO-RESPONDE">NO RESPONDE</option>
							<option value="TIEMPO-ESPERA">TIEMPO LIMITE ESPERA</option>
							<option value="SE-MUDO">SE MUDO</option>
							<option value="YA-RETIRADO">YA RETIRADO</option>
							<option value="ZONA-PELIGROSA">ZONA PELIGROSA</option>
							<option value="NO-TUVO-EQUIPO">NO TUVO EQUIPO</option>
							<option value="N/TEL-EQUIVOCADO">TEL EQUIVOCADO</option>
							<option value="NO-COINCIDE-SERIE">NO COINCIDE SERIE</option>
							<option value="DESCONOCIDO-TIT">DESCONOCIDO TIT</option>
							<option value="DESHABITADO">DESHABITADO</option>
							<option value="EXTRAVIADO">EXTRAVIADA</option>
							<option value="FALLECIO">FALLECIO</option>
							<option value="FALTAN-DATOS">FALTAN DATOS</option>
							<option value="RECONECTADO">RECONECTADO</option>
							<option value="ROBADO">ROBADO</option>
							<option value="ENTREGO-EN-SUCURSAL">ENTREGO EN SUCURSAL</option>
							<option value="FALLECIO">FALLECIÓ</option>

						</select>
					</div>
					<div class="form-group">
						<label><strong>Serie</strong></label>
						<input style="background-color:#D6EAF8 ;border:0;" type="text" name="edit_serie" id="edit_serie" class="form-control" placeholder="Serie" required >
					</div>

					<input type="hidden" name="edit_id" id="edit_id"> <!-- id que toma para editar el equipo-->

					<div class="form-group" id="campocpu2">
						<label id="mostrar-cpu2"><strong>Serie Terminal / Verificar</strong></label>

						<input style="background-color:#D6EAF8 ;border:0;" type="text" name="cpu2" id="cpu2" class="form-control" placeholder="Ingresar serie de terminal" >

					</div>

					<div class="form-group" id="Chip">
						<label id="titulo-coincide">
							<strong>¿Coincide el Nro de chip?</strong></label>
						<div class="chip" id="chipopciones">
							<div class="opcionchip" id="nro_chip_si">si</div>
							<div class="opcionchip" id="nro_chip_no">no</div>
						</div>
						<label><strong>Nro chip</strong></label>
						<input style="background-color:#D6EAF8 ;border:0;" type="text" name="edit_tarjeta" id="edit_tarjeta" class="form-control" placeholder="Seleccione - NO - e ingrese Nro" readonly>
					</div>

					<div class="form-group" id="chip_alt">
						<label>
							<strong>Ingrese nuevo Nro. de chip / Sim </strong>
						</label>
						<input style="background-color:#D6EAF8 ;border:0;" type="text" name="nro_chip_alt" id="nro_chip_alt" class="form-control" placeholder="Verifique e ingrese nuevo Nro. de chip">
					</div>

					<div class="form-group">
						<label><strong>Nro Orden</strong></label>
						<input style="background-color:#D6EAF8 ;border:0;" type="text" id="edit_id_orden" name="edit_id_orden" class="form-control" readonly required>
					</div>
					<div class="form-group">

						<input style="background-color:#D6EAF8 ;border:0;" type="hidden" id="edit_id_orden_pass" name="edit_id_orden_pass" class="form-control" required>
					</div>

					<div class="form-group">

						<input type="hidden" class="form-control" name="horario_rec_editar" id="fecha_para_editar"   readonly readonly>
					</div>

					<div class="form-group">

						<input style="background-color:#D6EAF8 ;border:0;" class="form-control" type="hidden" name="id_recolector_2" id="id_recolector_2" value="<?php if (isset($_SESSION['username'])) {echo $_SESSION['username']['username'];} ?>" readonly required>

					</div>
					<!-- DATOS QUE USO Y ESCONDO -->
					<input type="hidden" id="fechafirma" name="fechafirma">
					<input type="hidden" id="nombre_cliente" name="nombre_cliente">


				</div>
				<div class="modal-footer">
					<input type="button" id="salirModal" class="btn btn-danger" data-dismiss="modal" value="Salir">
					<input type="submit" class="btn btn-info" id="confirmar" name="confirmar" value="Confirmar">
				</div>
			</form>
		</div>
	</div>


	<script>
		$(document).ready(function() {




			$("#abrirRemito").show();
			tomarNombreYIdIdentificador()

			$("#clickBuscar").click(function() {

				var identificacion = $("#q").val()

				var identiMayus = identificacion.toUpperCase()

				
				
				cadena = identiMayus.substr(0, 2)

				ConfirmarYLimpiarModal(cadena)
				SalirDelModalYLimpiar(cadena)

				controladorChip(cadena)

				if (cadena === 'PS') {
					$("#abrirRemito").hide();

					$("#abrirfirmar").show();
					MostrarItemsPosnet();
					$("#campocpu2").show();


					$("#nro_chip_no").click(function() {
						$("#chip_alt").show();
						$("#nro_chip_alt").val("");
						$("#Chip").hide();

						
						controladorChip(cadena)
					})

					$("#nro_chip_si").click(function() {
						$("#chip_alt").hide();
						$("#chipopciones").hide();
						$("#titulo-coincide").hide();
                        $("#nro_chip_alt").val("no");
						
					})
				}

				if (cadena === 'LA') {
					$("#abrirfirmar").hide();
					MostrarItemLapos()
					$("#abrirRemito").show();
				}

				if ((cadena !== 'PS') && (cadena !== 'LA')) {
					VolverItemsANormarlidad()

					$("#abrirfirmar").hide();

					console.log("diferente a la y ps  " + cadena)
					controladorChip(cadena)
					$("#abrirRemito").show();
				}
			})




		})

		function MostrarItemsPosnet() {

			$("#cable").text("Cable telefonico")
			$("#cargador").text("Sim Card")
			$("#fuente").text("Cargador")
			$("#base").text("Base")
			$("#motivo").show()
			$("#Chip").show()
			$("#nroChip").show()
			$("#motivo_retiro").prop("selectedIndex", 0);

		}

		function MostrarItemLapos() {

			$("#cable").text("Cable telefonico")
			$("#cargador").text("Sim Card")
			$("#fuente").text("Cargador")
			$("#base").text("Base")
			$("#motivo").hide()
			$("#Chip").hide()
			$("#nroChip").hide()
			$("#chip_alt").hide();
		}

		function VolverItemsANormarlidad() {

			$("#cable").text('Cable HDMI')
			$("#cargador").text('Cable AV')
			$("#fuente").text('Fuente')
			$("#base").text('Control')
			$("#motivo").hide()
			$("#Chip").hide()
			$("#nroChip").hide()
			$("#chip_alt").hide();
			$("#motivo_retiro").prop("selectedIndex", 19);

		}

		function ConfirmarYLimpiarModal(cadena) {

			$("#confirmar").click(function() {

				controladorChip(cadena)
				
				$("#chip_alt").hide();
				$("#chipopciones").show();


				 var seriebase = $("#cpu2").val()
			 if(seriebase === '0'){

				 $("#cpu2").val('No entrego')
				 console.log("essato"+ $("#cpu2").val())
			 }
			 

				// diferentes

				setTimeout(function() {

					$("#nro_chip_alt").val("no");
					$('input[name="edit_cable_hdmi"]').prop('checked', true);
					$('input[name="edit_cable_av"]').prop('checked', true);
					$('input[name="edit_fuente"]').prop('checked', true);
					$('input[name="edit_control_1"]').prop('checked', true);
				}, 1650)

				 var idvalor = $("#edit_id_orden").val()
				
				$("#idFirmar").val(idvalor)

				 console.log($("#idFirmar").val(idvalor))
			})
		}

		function SalirDelModalYLimpiar(cadena) {

			$("#salirModal").click(function() {
				$("#nro_chip_alt").val("");

				$("#chipopciones").show();
				$("#titulo-coincide").show();


				controladorChip(cadena)
			})
		}

		function tomarNombreYIdIdentificador() {

			$("#confirmar").click(function() {

				var nombreCli = $("#nombre_cliente").val()
				var idParaPasarAFirma = $("#edit_id_orden_pass").val()

				$("#nombreaclaracion").val(nombreCli)
				$("#idFirmar").val(idParaPasarAFirma)
				controladorChip(cadena)

				var valorSerieBase = $("#cpu2").val()

				asignarNegativoPorVacio(valorSerieBase)
			   


			})
		}

		function controladorChip(cadena) {

			if (cadena !== 'PS') {
				$("#Chip").hide()
				$("#campocpu2").hide().prop('required', false);
				// console.log("no es igual a posnet")
			}

			if (cadena === 'PS')
				$("#Chip").show()
				// console.log("es igual a ps")
		}

		 function asignarNegativoPorVacio(valorSerieBase){


			if(valorSerieBase == ""){
				$("#cpu2").val("No tiene")
				// console.log("asi me fui " + $("#cpu2").val() )
			   }
			   if(valorSerieBase !== ""){
				// console.log("asi estoy")
			   }
		 }

	</script>