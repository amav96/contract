
$(document).ready(function () {
  $("#form-compruebo").submit(function (e) {
    const comprueboIdentificacion = {
      identificacion: $("#idparacomprobar").val(),
    };
    $.post(
      "../../model/work/compruebo_doc.php",
      comprueboIdentificacion,
      function (response) {
        var recibodocumento = JSON.parse(response),
          template = "";
        if (recibodocumento.fail != false) {
          recibodocumento.forEach((recorroDatos) => {
            $("#container-compruebo-doc").hide();
            mostrarform();
            $("#container-compruebo-doc").hide();
            $("#container-mensaje-no-existe").hide();
            $("#container-fill-in").hide();
            $("#nombreUsuario").text(recorroDatos.first_name);
            template += `
                <div tomoDato="${recorroDatos.id_number}">${recorroDatos.id_number},</div>
                `;
          });
          $("#idas").html(template);


            validarFinishFormRequest();
            
            $("#datosPost").submit(function(e){
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
             
               var idacambiar = recibodocumento;
               idlisto = idacambiar[0][0];
                
               const datos = new FormData();

               datos.append("fechaNacimiento", $('#fechaNacimiento').val());
               datos.append("venceDocumento", $('#venceDocumento').val());
               datos.append("seguroDesempleo", $('#seguroDesempleo').val());
               datos.append("seguroDeseVence", $('#seguroDeseVence').val());
               datos.append("estadoCivil", $('#estadoCivil').val());
               datos.append("hijos", $('#hijos').val());
               datos.append("estudiosFinalizados", $('#estudiosFinalizados').val());
               datos.append("venceLicencia", $('#venceLicencia').val());
               datos.append("vehiculoModelo", $('#vehiculoModelo').val());
               datos.append("ultEmpleoUno", $('#ultEmpleoUno').val());
               datos.append("fechaInicioEmpleoUno", $('#fechaInicioEmpleoUno').val());
               datos.append("fechaFinEmpleoUno", $('#fechaFinEmpleoUno').val());
               datos.append("ultEmpleoDos", $('#ultEmpleoDos').val());
               datos.append("fechaInicioEmpleoDos", $('#fechaInicioEmpleoDos').val());
               datos.append("fechaFinEmpleoDos", $('#fechaFinEmpleoDos').val());
               datos.append("ultEmpleoTres", $('#ultEmpleoTres').val());
               datos.append("fechaInicioEmpleoTres", $('#fechaInicioEmpleoTres').val());
               datos.append("fechaFinEmpleoTres", $('#fechaFinEmpleoTres').val());
               datos.append("antecedentesRestricciones", $('#antecedentesRestricciones').val());
               datos.append("observaciones", $('#observaciones').val());
               datos.append("tipo", $('#tipo').val());
               datos.append("hora_solicitud", $("#horario_solicitud").val());
               
               datos.append("idenviado", idlisto);

               

                $.ajax({
                  url:"../../model/work/finish-employee-completed.php",
                  type:"POST",
                  data: datos,
                  processData: false,
                  contentType: false,
                  beforeSend: function(objeto){
        
                    $("#procesando").show();
                    },
                  success: function (response){
                    
                     console.log(response)
                     if(response == 1){
                       
                      $("#container-mensaje-exito").show();
                      Subir();
                      $("#container-form").hide();
                     }if(response == 2){
                      $("#container-mensaje-no-existe").show();
                      $("#container-form").hide();
                     }
                  }
                })
               
            })

        } else {
          $("#container-mensaje-no-existe").show();
        }
      }
    );
    e.preventDefault();

  });


});


var muestroform = $("#container-form");
function mostrarform() {
  muestroform.show();


}


function validarFinishFormRequest() {


  $("#submit").click(function () {

    var elemento = document.getElementById("fechaNacimiento").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu Fecha de nacimiento!'
      })
      return false
    }

    var elemento = document.getElementById("seguroDesempleo").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos si posees seguro de desempleo!'
      })
      return false
    }
    var elemento = document.getElementById("hijos").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos si tienes hijos!'
      })
      return false
    }
    var elemento = document.getElementById("venceLicencia").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos cuando vence tu licencia de conducir!'
      })
      return false
    }
    var elemento = document.getElementById("vehiculoModelo").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos el modelo de tu vehiculo!'
      })
      return false
    }
    var elemento = document.getElementById("ultEmpleoUno").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu ultimo empleo!'
      })
      return false
    }
    var elemento = document.getElementById("ultEmpleoUno").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes indicarnos tu ultimo empleo!'
      })
      return false
    }
    var elemento = document.getElementById("estudiosFinalizados").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes completar el campo de Estudios. Por si o por no.'
      })
      return false
    }
    var elemento = document.getElementById("antecedentesRestricciones").value
    if (elemento == "") {
      Swal.fire({
        icon: 'error',
        title: 'Ya casi..',
        text: 'Debes completar el campo de Antecedetes o Restricciones.'
      })
      return false
    }
    var elemento = document.getElementById("observaciones").value
    if (elemento == "") {
    
      $("#observaciones").value("No ingreso observación");
    }
    var elemento = document.getElementById("ultEmpleoDos").value
    if (elemento == "") {
     $("#ultEmpleoDos").val("No ingreso datos");
     
    }
    var elemento = document.getElementById("ultEmpleoDos").value
    if (elemento == "") {
     $("#ultEmpleoDos").val("No ingreso datos");
     
    }
    var elemento = document.getElementById("fechaInicioEmpleoDos").value
    if (elemento == "") {
     $("#fechaInicioEmpleoDos").val("No ingreso datos");
     
    }
    var elemento = document.getElementById("fechaFinEmpleoDos").value
    if (elemento == "") {
     $("#fechaFinEmpleoDos").val("No ingreso datos");
     
    }


    var elemento = document.getElementById("ultEmpleoTres").value
    if (elemento == "") {
     $("#ultEmpleoTres").val("No ingreso datos");
     
    }
    var elemento = document.getElementById("fechaInicioEmpleoTres").value
    if (elemento == "") {
     $("#fechaInicioEmpleoTres").val("No ingreso datos");
     
    }
    var elemento = document.getElementById("fechaFinEmpleoTres").value
    if (elemento == "") {
     $("#fechaFinEmpleoTres").val("No ingreso datos");
     
    }



    
  })



}
function Subir() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
}

