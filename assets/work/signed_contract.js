

var btnDonwload = document.getElementById("donwload");
var btnAccept = document.getElementById("acepto");
var btnDontAccept = document.getElementById("noacepto");
var modalSignedContract = document.getElementById("firmarContrato")

var cuit = document.getElementById("cuit")
var domicilio = document.getElementById("domicilio")
var marca = document.getElementById("marca")
var modelo = document.getElementById("modelo")
var patente = document.getElementById("patente")
var email = document.getElementById("email")
var telefono = document.getElementById("telefono")
var cbu = document.getElementById("cbu")
var banco = document.getElementById("banco")

if(btnDonwload != null){
	    btnDonwload.addEventListener("click",()=>{
		
	 	const invoice = this.document.getElementById("invoice");
		
	 	html2pdf().from(invoice).save();
	 })
}


if(btnAccept != null){

	domicilio.addEventListener("click",()=>{domicilio.removeAttribute('readonly')})
	email.addEventListener("click",()=>{email.removeAttribute('readonly')})
	telefono.addEventListener("click",()=>{telefono.removeAttribute('readonly')})


	btnAccept.addEventListener("click",()=>{
		  
		  (cuit.value === "")
		  ?alertNegative('Debes ingresar tu numero de cuit')
		  :(domicilio.value === "")
		   ?alertNegative('Debes ingresar tu domicilio')
		   :(marca.value === "")
		 	?alertNegative('Debes ingresar la marca del auto')
		 	:(modelo.value === "")
		 	 ?alertNegative('Debes ingresar el modelo del auto')
		 	 :(patente.value === "")
		 	  ?alertNegative('Debes ingresar el nro de pantente del auto')
			   :(email.value === "")
				?alertNegative('Debes ingresar tu email')
				:!(/^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})/i).test(email.value)
				 ?alertNegative('Debes ingresar un email válido, revisa cuidadosamente')
		 	     :(telefono.value === "")
		 		  ?alertNegative('Debes ingresar tu telefono')
		 		  :(telefono.value.lenght < 8)
					?alertNegative('El telefono debe tener minimo 8 digitos')
					:(cbu.value === "")
					 ?alertNegative('Debes ingresar el CBU')
					  :(banco.value === "")
					  ?alertNegative('Debes ingresar el Banco')
					   :(banco.value.lenght> 32)
					   ?alertNegative('El CBU debe tener minimo 32 digitos')
					   :$("#firmarContrato").modal("show")
					 
		 		   
	})
}

    $(document).on("click","#noacepto",function(){

        alert("no acepto la persona jeje")
    })



		// Obtenenemos un intervalo regular(Tiempo) en la pamtalla
		window.requestAnimFrame = (function (callback) {
			return window.requestAnimationFrame ||
				window.webkitRequestAnimationFrame ||
				window.mozRequestAnimationFrame ||
				window.oRequestAnimationFrame ||
				window.msRequestAnimaitonFrame ||
				function (callback) {
					window.setTimeout(callback, 1000 / 60);
					// Retrasa la ejecucion de la funcion para mejorar la experiencia
				};
		})();
	
		// Traemos el canvas mediante el id del elemento html
		var canvas = document.getElementById("firma");
		var ctx = canvas.getContext("2d");

		

		$(canvas).on("touchmove",function(){

			$("#crear-imagen").show()
			$("#borrar-imagen").show()
		})
		$(canvas).on("click",function(){

			$("#crear-imagen").show()
			$("#borrar-imagen").show()
		})


		// Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
		// var urlImagen = document.getElementById("url-imagen");
	
		var borrarImagen = document.getElementById("borrar-imagen");
		// CREAR FIRMA SIMULA EL SIGUIENTE PERO DE FIRMAR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		var crearImagen = document.getElementById("crear-imagen");
		borrarImagen.addEventListener("click", function (e) {
			// Definimos que pasa cuando el boton imagen-creada es pulsado
			clearCanvas();
			$("#crear-imagen").hide()
		}, false);
	
			// Definimos que pasa cuando el boton crear-imagen es pulsado
			crearImagen.addEventListener("click", function (e) {
 
			var hoy = new Date();
			var fecha = hoy.getFullYear()+ '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
			
	
			$("#fechafirma").val(fecha)

				var dataUrl = canvas.toDataURL();
				
				var documento = $("#documentoFirmar").val()
                var key = 'firmaContrato';
			
				if (documento == "") {  
					alertNegative('Debes ingresar tu nro de documento'); return false
				} else if (!(/^[0-9.]+$/).test(documento)) {

					alertNegative('El documento ingresado es inválido'); return false
				}else{
					
					      var cuit = $("#cuit").val()
						  var domicilio = $("#domicilio").val()
						  var marca  = $("#marca").val()
						  var modelo = $("#modelo").val()
						  var patente = $("#patente").val()
						  var email = $("#email").val()
						  var telefono = $("#telefono").val()
						  var cbu = $("#cbu").val()
						  var banco = $("#banco").val()
					
			
				 Swal.fire({
				 	title: 'Estas por firmar el contrato. Revisaste todos los datos cuidadosamente?',
				 	text: "Aun tienes la posibilidad de modificar algún dato si te equivocaste",
				 	icon: 'info',
				 	showCancelButton: true,
				 	confirmButtonColor: '#3085d6',
				 	cancelButtonColor: '#d33',
				 	confirmButtonText: 'Si, estoy seguro!'
				   }).then((result) => {
				 	if (result.isConfirmed) {
				 		$("#subspinner-firmar").show()
						
							
					 //  reseteo formulario firmas
					 
				 		$.ajax({
				 			url:"../control/usuarioControllers.php?usuario&accion=signedContract",
				 			type: "post",
				 			data: {cuit,domicilio,marca,modelo,patente,email,telefono,fecha,key,dataUrl, documento,cbu,banco},
						
				 			success: function(response){

				 	// 			$("#subspinner-firmar").hide()
								
				 	// 			let reciboExistenciaFirma = JSON.parse(response)
				 	//  if(reciboExistenciaFirma[0].result === true){
						 
					// 	alertPositive('Contrato firmado con exito!')
				 	// 	// si no existe la firma insertarda y si se inserto la nueva firma correctamente...
				 	// 	//  ingreso la data de la recuperacion en la base de datos
				
				 	// }if(reciboExistenciaFirma[0].result === 'failInsert'){
				 	// 	  clearCanvas()
				 	// 	  alertNegative('Error CODE DB'); return false;
				 	// }
				 	// if(reciboExistenciaFirma[0].result === 'existeFirma'){
				    // 		clearCanvas()
				    // 		alertNegative('La firma ingresada ya existe!'); return false;
				 	//            }
				 			}
				 		})
				 	}
				   })
				}
	

			}, false);
		
		// Activamos MouseEvent para nuestra pagina
		var drawing = false;
		var mousePos = { x: 0, y: 0 };
		var lastPos = mousePos;
		canvas.addEventListener("mousedown", function (e) {
			/*
			  Mas alla de solo llamar a una funcion, usamos function (e){...}
			  para mas versatilidad cuando ocurre un evento
			*/
			var tint = document.getElementById("color");
			var punta = document.getElementById("puntero");
			// console.log(e);
			drawing = true;
			lastPos = getMousePos(canvas, e);
		}, false);
		canvas.addEventListener("mouseup", function (e) {
			drawing = false;
		}, false);
		canvas.addEventListener("mousemove", function (e) {
			mousePos = getMousePos(canvas, e);
		}, false);
	
		// Activamos touchEvent para nuestra pagina
		canvas.addEventListener("touchstart", function (e) {
			mousePos = getTouchPos(canvas, e);
			// OJOOOOO console.log(mousePos);
			e.preventDefault(); // Prevent scrolling when touching the canvas
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousedown", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas.dispatchEvent(mouseEvent);
		}, false);
		canvas.addEventListener("touchend", function (e) {
			e.preventDefault(); // Prevent scrolling when touching the canvas
			var mouseEvent = new MouseEvent("mouseup", {});
			canvas.dispatchEvent(mouseEvent);
		}, false);
		canvas.addEventListener("touchleave", function (e) {
			// Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
			e.preventDefault(); // Prevent scrolling when touching the canvas
			var mouseEvent = new MouseEvent("mouseup", {});
			canvas.dispatchEvent(mouseEvent);
		}, false);
		canvas.addEventListener("touchmove", function (e) {
			e.preventDefault(); // Prevent scrolling when touching the canvas
			var touch = e.touches[0];
			var mouseEvent = new MouseEvent("mousemove", {
				clientX: touch.clientX,
				clientY: touch.clientY
			});
			canvas.dispatchEvent(mouseEvent);
		}, false);
	
		// Get the position of the mouse relative to the canvas
		function getMousePos(canvasDom, mouseEvent) {
			var rect = canvasDom.getBoundingClientRect();
			/*
			  Devuelve el tamaño de un elemento y su posición relativa respecto
			  a la ventana de visualización (viewport).
			*/
			return {
				x: mouseEvent.clientX - rect.left,
				y: mouseEvent.clientY - rect.top
			};
		}
	
		// Get the position of a touch relative to the canvas
		function getTouchPos(canvasDom, touchEvent) {
			var rect = canvasDom.getBoundingClientRect();
			//   OOOJOOOOOOO console.log(touchEvent);
			/*
			  Devuelve el tamaño de un elemento y su posición relativa respecto
			  a la ventana de visualización (viewport).
			*/
			return {
				x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
				y: touchEvent.touches[0].clientY - rect.top
			};
		}
	
		// Draw to the canvas
		function renderCanvas() {
			if (drawing) {
				var tint = document.getElementById("color");
				var punta = document.getElementById("puntero");
				ctx.strokeStyle = tint.value;
				ctx.beginPath();
				ctx.moveTo(lastPos.x, lastPos.y);
				ctx.lineTo(mousePos.x, mousePos.y);
				
				ctx.lineWidth = punta.value;
				ctx.stroke();
				ctx.closePath();
				lastPos = mousePos;
			}
		}
	
		function clearCanvas() {
			canvas.width = canvas.width;
		}
	
		// Allow for animation
		(function drawLoop() {
			requestAnimFrame(drawLoop);
			renderCanvas();
		})();
	
	
	
		function alertPositive(str) {
			Swal.fire({
			  icon: "success",
			  title: str,
			  showConfirmButton: false,
			  timer: 1600,
			});
		  }
		  
		  function alertNegative(str) {
			Swal.fire({
			  icon: "error",
			  title: "Info",
			  text: str,
			  timer: 3000,
			  showConfirmButton: false,
			});
		  }