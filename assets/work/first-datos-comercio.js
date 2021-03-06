$(document).ready(function () {

  cargarPais();

  pais.addEventListener('change', function () {
    const CodePais = pais.value

    const EnvioCodigoPais = {

      'codigoPais': CodePais

    }

    if (CodePais === "1") {
      $("#cpar").show();
      $("#cpur").hide();
    } else if (CodePais === "2") {
      $("#cpur").show();
      $("#cpar").hide();
    }



    cargarProvincias(EnvioCodigoPais)
  })

  validarFirstFormRequest();

 $('#fotodocfront').on('change', function (event) {
   docfront = event.target.files;
   documentoFront = docfront[0];

 })
 $('#fotodocpost').on('change', function (event) {
   docPost = event.target.files;
   documentoPost = docPost[0];

 })
 $('#comercio').on('change', function (event) {
     comercioDoc = event.target.files;
     fotoComercio = comercioDoc[0];
 
   })

 $('#infomono').on('change', function (event) {
   monoDoc = event.target.files;
   monotributo = monoDoc[0];

 })

 $('#cuilrut').on('change', function (event) {
  cuilrutDoc = event.target.files;
  cuilRut = cuilrutDoc[0];

})
 $('#persona').on('change', function (event) {
   personaDomPer = event.target.files;
   persona = personaDomPer[0];



 })


 $("#datosPost").submit(function (e) {
   e.preventDefault();

   $("input[name=horario_solicitud]").val('')
      var d = new Date();
      const letrero = document.querySelector("#horario_solicitud")
      const fecha = new Date();   
      let anio = fecha.getFullYear()
      let mes = fecha.getMonth()+1
      let dia = fecha.getDate()
      let hora =fecha.getHours() 
      let minuto = fecha.getMinutes() 
      let segundo = fecha.getSeconds() 
      if(dia < 10){
      dia='0'+dia
        }
      if(mes < 10){
      mes='0'+mes
      } 
      if(hora < 10){
      hora='0'+hora
        }
      if(minuto < 10){
      minuto='0'+minuto
      }
      if(segundo < 10){
      segundo='0'+segundo
      }  
      letrero.value = `${anio}-${mes}-${dia} ${hora}:${minuto}:${segundo}`

   const datos = new FormData();



   datos.append("fotodocfront", documentoFront);
   datos.append("fotodocpost", documentoPost);
   datos.append("infomono", monotributo);
   datos.append("comercio", fotoComercio);
   datos.append("cuilrut", cuilRut);
   datos.append("persona", persona);
   datos.append("numero_dni", $("#numero_dni").val());
   datos.append("nombre", $("#nombre").val());
   datos.append("apellido", $("#apellido").val());
   datos.append("email", $("#email").val());
   datos.append("via_conocimiento", $("#via_conocimiento").val());
   datos.append("pais", $("#pais option:selected").text());
   datos.append("provincia", $("#provincia option:selected").text());
   datos.append("localidad", $("#localidad").val());
   datos.append("domicilio", $("#domicilio").val());
   datos.append("codigoPostal", $("#codigoPostal").val());
   datos.append("dni", $("#dni").val());
   datos.append("monotributo", $("#monotributo").val());
   
   datos.append("tipo_vehiculo", $("#tipo_vehiculo").val());
   datos.append("horario_disponible", $("#horario_disponible").val());
   datos.append("telefono_celular", $("#telefono_celular").val());

   datos.append("tipo", $("#tipo").val());
   datos.append("hora_solicitud", $("#horario_solicitud").val());



   $.ajax({
     url: "../../model/work/first-data-comercio.php",
     type: "POST",
     data: datos,
     processData: false,
     contentType: false,
     beforeSend: function(objeto){
     
       $("#procesando").show();
       },
     success: function (response) {
       console.log(response);
        if (response != 3) {
          Subir()
          ocultar()
          mostrarMensaje()
        } if(response == 3 || response == 2) {
         $("#procesando").hide();
          Swal.fire({
            icon: 'error',
            title: 'Grave!',
            text: 'El numero de identificacion ya existe!'
          })
          return false
        }



     }

   })


 });
});




SiNoTieneMonotributo();


$("#monotributo").on("change", function () {
  let monotributo = $("#monotributo option:selected").text();


  if (monotributo === "no") {

    var elemento = document.getElementById("codigoPostal").value
    if (elemento == "") {
      let template = "";

      template += `
       <div class="mensajeMonotributo">Si no cuentas con monotributo comunicate con nosotros 
       <a href="https:api.whatsapp.com/send?phone=+5491138741772&text=Hola%20Express%20,%20solicito%20información%20para%20trabajar%20como%20recolector%20.%20No%20poseo%20monotributo/Mides" target="_blank"><img class="imagen-mensaje" src="../../estilos/imagenes/front/whatsapp.png" alt=""></a>
        </div>
        `;
      $("#box-monitributo").html(template);
      $("#container-monotributo").show();
      return false
    } else {
      $("#container-monotributo").show();
    }



  }
  else if (monotributo === "si") {
    $("#container-monotributo").hide();

  }
});


function OcultarMensajeMonotributo() {
  $(".prev-1").click(function () {
    $("#container-monotributo").hide();
  });
  $(".next-1").click(function () {
    $("#container-monotributo").hide();
  });
}

function validarFirstFormRequest() {


  $("#submit").click(function () {


    var elemento = document.getElementById("nombre").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu nombre!'
      })
      return false
    }
    var elemento = document.getElementById("apellido").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes tu apellido!'
      })
      return false
    }
    var elemento = document.getElementById("email").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu email!'
      })
      return false
    }
    var elemento = document.getElementById("pais").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu pais!'
      })
      return false
    }
    var elemento = document.getElementById("provincia").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu provincia!'
      })
      return false
    }
    var elemento = document.getElementById("localidad").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu localidad donde vives!'
      })
      return false
    }
    var elemento = document.getElementById("domicilio").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu domicilio!'
      })
      return false
    }
    var elemento = document.getElementById("codigoPostal").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu codigo postal!'
      })
      return false
    }
    var elemento = document.getElementById("dni").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu numero de dni!'
      })
      return false
    }
    var elemento = document.getElementById("numero_dni").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu numero de documento!'
      })
      return false
    }
    var elemento = document.getElementById("fotodocfront").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes tomar foto a la parte frontal de tu documento!'
      })
      return false
    }
    var elemento = document.getElementById("fotodocpost").value
    if (elemento == "") {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes tomar foto a la parte posterior de tu documento!'
      })
      return false
    }
    var elemento = document.getElementById("telefono_celular").value
    if (elemento.length <10 ) {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'El telefono debe tener minimo 10!'
      })
      return false
    }
    var elemento = document.getElementById("telefono_celular").value
    var celularPrimeros = elemento.substr(0,2)
    if (celularPrimeros != '54' ) {
      $("#procesando").hide();
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'El telefono debe empezar con (54). Ejemplo : 54 1177568412!'
      })
      return false
    }


    var elemento = document.getElementById("persona").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Foto frontal',
        text: 'Debes enviarnos una foto tuya frontal'
      })
      return false
    }
    var elemento = document.getElementById("comercio").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Foto',
        text: 'Debes enviarnos una foto frontal del comercio.'
      })
      return false
    }
    var elemento = document.getElementById("cuilrut").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Foto',
        text: 'Debes enviarnos una foto de tu cuil o rut.'
      })
      return false
    }

  })

}

function cargarPais() {
  let pais = document.querySelector("#pais")
  $.ajax({
    type: "GET",
    url: "../../model/work/ubicacion.php",
    success: function (response) {
      const ReciboPais = JSON.parse(response)

      let template = '<option class="select-form" selected disabled>--Seleccione--</option>'

      ReciboPais.forEach((RecorroPais) => {

        template += `<option value="${RecorroPais.idPais}">${RecorroPais.nomPais}</option>
       `;
      })

      $("#pais").html(template);
    }
  })
}

function cargarProvincias(EnvioCodigoPais) {
  let provincias = document.querySelector("#provincia")
  $.ajax({

    url: "../../model/work/ubicacion.php",
    type: "POST",
    data: EnvioCodigoPais,
    success: function (response) {

      const ReciboProvincia = JSON.parse(response)

      let template = '<option class="select-form" selected disabled>--Seleccione--</option>'

      ReciboProvincia.forEach((RecorroProvincia) => {


        template += `<option value="${RecorroProvincia.codProvincia}">${RecorroProvincia.nomProvincia}</option>
       
        `;
      })
      $("#provincia").html(template);

    }

  })

}

function SiNoTieneMonotributo() {
  $("#codigoPostal").keyup(function () {
    let TipeoInputCp = $("#codigoPostal").val()
    $.ajax({

      url: "../../model/work/ubicacion.php",
      type: "POST",
      data: { TipeoInputCp },
      success: function (response) {
        let ReciboCodigo = JSON.parse(response)
        const CAPTURODATO = ReciboCodigo[0].telefono;
         console.log(CAPTURODATO)
        let template = "";

        template += `
<div class="mensajeMonotributo">Si no cuentas con monotributo comunicate con nosotros 
<a href="https:api.whatsapp.com/send?phone=${CAPTURODATO}&text=Hola%20Express%20,%20solicito%20información%20para%20trabajar%20como%20recolector%20.%20No%20poseo%20monotributo/Mides
" target="_blank"><img class="imagen-mensaje" src="../../estilos/imagenes/front/whatsapp.png" alt=""></a>
</div>
`;
        $("#box-monitributo").html(template);

      }
    })
  })
}


function Subir() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
}
function ocultar() {
  $("#container-form").hide();
}
function mostrarMensaje() {
  document.getElementById("container-mensaje-exito").style.display =
    "block";
}


