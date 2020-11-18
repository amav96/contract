	
		function load(page){
			var elemento = document.getElementById("q").value
             if (elemento == ""){
             alert("Debes llenar el campo buscar")
             return false}
			var query=$("#q").val();
			var per_page=5;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'../../ajax/listar_producto.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		$('#editProductModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
		  var serie = button.data('serie') 
		  $('#edit_serie').val(serie)

		  var tarjeta = button.data('tarjeta') 
		  $('#edit_tarjeta').val(tarjeta)

		  var id_orden = button.data('id_orden') 
		  $('#id_orden').val(id_orden)

		  var estado_rec = button.data('estado_rec') 
		  $('#estado_rec').val(estado_rec)

		  var cable_hdmi = button.data('cable_hdmi') 
		  $('#edit_cable_hdmi').val(cable_hdmi)

		  var cable_av = button.data('cable_av') 
		  $('#edit_cable_av').val(cable_av)

		  var fuente = button.data('fuente') 
		  $('#edit_fuente').val(fuente)

		  var control_1 = button.data('control_1') 
		  $('#edit_control_1').val(control_1)

		  var cpu2 = button.data('cpu2') 
		  $('#cpu2').val(cpu2)

		  var otrosaccesorios = button.data('otrosaccesorios') 
		  $('#edit_otrosaccesorios').val(otrosaccesorios)

		

		  var nombre_cliente = button.data('nombre_cliente') 
		  $('#nombre_cliente').val(nombre_cliente)

		  var id = button.data('id') 
		  $('#edit_id').val(id)

		  $(function(){
			$('#enviarveri').on('click', function(e){
				e.preventDefault();
				
					 var elemento = document.getElementById("edit_id_orden").value
					 if (elemento == ""){
					 alert("Debes Generar un Nro de orden.")
					 return false}
					 var elemento = document.getElementById("edit_id_orden_pass").value
					 if (elemento == ""){
					 alert("Debes Generar un Nro de orden.")
					 return false}
					 var elemento = document.getElementById("id_recolector_2").value
					 if (elemento == ""){
					 alert("Debes Ingresar el id recolector.")
					 return false}
		})
	})
})
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../ajax/editar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		
		$( "#add_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../ajax/guardar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "../../ajax/eliminar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		


		
		