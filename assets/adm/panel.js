var notificacionDisplayed = false;
var panelGeneralDisplayed = true;

$(document).ready(function () {

  Redireccion();
  
  function MuestraNumeroDeNotificaciones() {
    $.ajax({
      url: "../../model/noti-work/notifications.php",
      success: function (response) {
        let notificacion = JSON.parse(response);

        if (notificacion.cuentaDatos[0] == "0") {
        } else {
          let template = "";

          template += `
          <div class="cajita-notificacion"  >
                       <div  tomoDato='${notificacion.cuentaDatos}'> 
                          <span class="info-bd"> <span class="info-titulo"></span> ${notificacion.cuentaDatos[0]}<span>
                         </div>
                   </div>  
 
          `;
          $("#caja-notificacion").html(template);
        }
      },
    });
  }
  MuestraNumeroDeNotificaciones();

  $("#solicitudes").click(function () {
    // console.log($(this)); ver que toco
 
    $.ajax({
      url: "../../model/noti-work/despliegue_notifications.php",
      success: function (response) {
        let despliegueNoti = JSON.parse(response);
        let template = `<div class="header-despliegue" id="header-despliegue">
              Notificaciones
          </div> <hr>`;
        despliegueNoti.forEach((recorroDatos) => {
          template += `
               
                    <div class="body-despliegue" id="body-despliegue-${recorroDatos.id} " tomoDato="${recorroDatos.id}" >
                    ${recorroDatos.nombre} ha enviado una solicitud para ${recorroDatos.tipo}
                    <span class="status-noti">${recorroDatos.estadoNotificacion}</span>
                  </div>
                  <hr>
                  `;
        });

        $("#despliegue-notificacion").html(template);

        mostrar_ocultarNotificaciones(notificacionDisplayed);
      },
    }).done(function () {
      MostrarCuerpoNotificacion();
      MuestraNumeroDeNotificaciones();
     
    });
  });

  $("#form-iden").submit(function (e) {
    let BuscarDato = $("#datoBuscar").val();

    $.ajax({
      url: "../../model/adm/search.php",
      type: "POST",
      data: { BuscarDato },
      beforeSend: function (objeto) {
        $("#procesando").show();
      },
      success: function (response) {
        $("#procesando").hide();
        let DatoEncontrado = JSON.parse(response);
        let template = "";

        if (DatoEncontrado[0].result == 1) {
          DatoEncontrado.forEach((recorroDatos) => {
            template += `
                
               <tr>
               <td>${recorroDatos.estadoRec}</td>
               <td>${recorroDatos.orden}</td>
               <td>${recorroDatos.fechaRec}</td>
               <td>${recorroDatos.recolector}</td>
               <td>${recorroDatos.identificacion}</td>
               <td>${recorroDatos.serie}</td>
               <td>${recorroDatos.tarjeta}</td>
               <td>${recorroDatos.nombreCliente}</td>
               <td>${recorroDatos.direccion}</td>
               <td>${recorroDatos.provincia}</td>
               <td>${recorroDatos.localidad}</td>
               <td>${recorroDatos.codigoPostal}</td>
               <td>${recorroDatos.cableHdmi}</td>
               <td>${recorroDatos.cableAv}</td>
               <td>${recorroDatos.fuente}</td>
               <td>${recorroDatos.control}</td>
               <td>${recorroDatos.telefono1}</td>
                <td>${recorroDatos.telefono2}</td>
               <td>${recorroDatos.idOrdenPass}</td>

             </tr>
               
               
               `;
          });

          $("#tbody").html(template);
          MostrarTablaOcultarError();
        } else {
          // $('#buscador').hide();
          MostrarErrorOcultarTabla();
        }
      },
    });
    event.preventDefault();
  });

  MostrarBuscadorPorRecoYFecha();

  $("#form-reco-fecha").submit(function (e) {
    let ReciboReco = $("#recolector").val();
    let ReciboFechaUno = $("#recoFechaUno").val();
    let ReciboFechaDos = $("#recoFechaDos").val();

    $.ajax({
      url: "../../model/adm/search_reco_fecha.php",
      type: "POST",
      data: { ReciboReco, ReciboFechaUno, ReciboFechaDos },
      beforeSend: function (objeto) {
        $("#procesando").show();
      },
      success: function (response) {
        $("#procesando").hide();
        let RecoFechaEncontrado = JSON.parse(response);
        let template = "";

        if (RecoFechaEncontrado[0].result == 1) {
          RecoFechaEncontrado.forEach((recorroDatos) => {
            template += `
              
              <tr>
                <td>${recorroDatos.estadoRec}</td>
                <td>${recorroDatos.orden}</td>
                <td>${recorroDatos.fechaRec}</td>
                <td>${recorroDatos.recolector}</td>
                <td>${recorroDatos.identificacion}</td>
                <td>${recorroDatos.serie}</td>
                <td>${recorroDatos.tarjeta}</td>
                <td>${recorroDatos.nombreCliente}</td>
                <td>${recorroDatos.direccion}</td>
                <td>${recorroDatos.provincia}</td>
                <td>${recorroDatos.localidad}</td>
                <td>${recorroDatos.codigoPostal}</td>
                <td>${recorroDatos.cableHdmi}</td>
                <td>${recorroDatos.cableAv}</td>
                <td>${recorroDatos.fuente}</td>
                <td>${recorroDatos.control}</td>

                <td>${recorroDatos.idOrdenPass}</td>

                

 
              </tr>
              
              `;
          });
          $("#tbody").html(template);
          MostrarTablaOcultarError();
        } else {
          MostrarErrorOcultarTabla();
        }
      },
    });

    e.preventDefault();
  });

  MostrarBuscadorReporte();

  $("#form-negativos").submit(function (e) {
    let ReciboFechaReporteUno = $("#FechaUno-reporte").val();
    let ReciboFechaReporteDos = $("#FechaDos-reporte").val();

    $.ajax({
      url: "../../model/adm/search_reporte.php",
      type: "POST",
      data: { ReciboFechaReporteUno, ReciboFechaReporteDos },
       beforeSend: function (objeto) {
         $("#procesando").show();
       },
      success: function (response) {
         $("#procesando").hide();
        
         let reciboReporte = JSON.parse(response);
         let template = "";

         if (reciboReporte[0].result == 1) {
           reciboReporte.forEach((recorroDatos) => {
             template += `
               
                <tr>
                  <td>${recorroDatos.estadoRec}</td>
                  <td>${recorroDatos.orden}</td>
                  <td>${recorroDatos.fechaRec}</td>
                  <td>${recorroDatos.recolector}</td>
                  <td>${recorroDatos.identificacion}</td>
                  <td>${recorroDatos.serie}</td>
                  <td>${recorroDatos.tarjeta}</td>
                  <td>${recorroDatos.nombreCliente}</td>
                  <td>${recorroDatos.direccion}</td>
                  <td>${recorroDatos.provincia}</td>
                  <td>${recorroDatos.localidad}</td>
                  <td>${recorroDatos.codigoPostal}</td>
                  <td>${recorroDatos.cableHdmi}</td>
                  <td>${recorroDatos.cableAv}</td>
                  <td>${recorroDatos.fuente}</td>
                  <td>${recorroDatos.control}</td>
                  <td>${recorroDatos.idOrdenPass}</td>
  
                </tr>
               
                `;
           });
           $("#tbody").html(template);
           MostrarTablaOcultarError();
         } else {
           MostrarErrorOcultarTabla();
          }
      },
    });

    //  console.log(ReciboRecolectorNegativo, ReciboFechaNegativoUno, ReciboFechaNegativoDos);
    e.preventDefault();
  });

  MostrarBusquedaGeneral();
  // este es el que muestar el generaaaal, tienes que ver donde lo pones
});





function MostrarBuscadorPorRecoYFecha() {
  $("#BuscadorFecha").click(function () {
    $("#container-busqueda-general").hide();
    $("#container-negativos").hide();
    $("#container-mensaje-error").hide();
    $("#container-busqueda-reco-fecha").show();
  });
}

function MostrarBuscadorReporte() {
  $("#BuscadorNegativos").click(function () {
    $("#container-negativos").show();
    $("#container-busqueda-reco-fecha").hide();
    $("#container-busqueda-general").hide();
    $("#container-mensaje-error").hide();
  });
}

function MostrarBusquedaGeneral() {
  $("#BuscadorGeneral").click(function () {
    $("#container-busqueda-reco-fecha").hide();
    $("#container-negativos").hide();
    $("#container-busqueda-general").show();
    $("#container-mensaje-error").hide();
  });
}

function MostrarErrorOcultarTabla() {
  $("#container-mensaje-error").show();
  $("#buscador").hide();
}

function MostrarTablaOcultarError() {
  $("#buscador").show();
  $("#container-mensaje-error").hide();
}

var notificationDisplay = $("#despliegue-notificacion");
function mostrar_ocultarNotificaciones(displayed) {
  if (!displayed) {
    notificationDisplay.show();
    notificacionDisplayed = true;
  } else {
    notificationDisplay.hide();
    notificacionDisplayed = false; //
  }
}

function MostrarCuerpoNotificacion() {
  $(".body-despliegue").click(function () {
    //
    let elementoRequerido = $(this)[0];
    let id = $(elementoRequerido).attr("tomoDato");

    $.post(
      "../../model/noti-work/request-data-notifications.php",
      { id },
      function (response) {
        $("#buscador").hide();
        let DatosDelSolicitante = JSON.parse(response);
        let template = `<h4>Datos del solicitante - ${DatosDelSolicitante[0].nombre} ${DatosDelSolicitante[0].apellido} - ${DatosDelSolicitante[0].tipoDeSolicitud} </h4>`;
        console.log(DatosDelSolicitante[0].tipoDeSolicitud);

        if (DatosDelSolicitante[0].tipoDeSolicitud === "Empleado-Completado") {
          console.log("es un empleado o recolector");

          DatosDelSolicitante.forEach((recorroDatos) => {
            template += `
    

     <div class="mini-box">
     <div class="dato-titulo">
       Documento Frontal
     </div>
     <div class="dato-contenido">
     <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}front.jpg" target="_blank">
     <img  class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}front.jpg"> 
     </a>
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Documento Posterior
     </div>
     <div class="dato-contenido">
      <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}post.jpg" target="_blank">
     <img class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}post.jpg"> 
          </a>  
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       CUIL / RUT
     </div>
     <div class="dato-contenido">
     <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}cuilrut.jpg" target="_blank">
     <img class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}cuilrut.jpg"> 
        </a>
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Comprobante de domicilio
     </div>
     <div class="dato-contenido">
     <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}comprobante.jpg" target="_blank">
     <img class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}comprobante.jpg"> 
        </a>
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
     Comprobante de monotributo
     </div>
     <div class="dato-contenido">
     <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}mono.jpg" target="_blank">
     <img id="imagen1" class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}mono.jpg"> 
        </a>
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
      Documento
     </div>
     <div class="dato-contenido">
     ${recorroDatos.documento} ${recorroDatos.nroDoc} 
     </div>
     </div>

     
    
    
     <div class="mini-box">
     <div class="dato-titulo">
       Tel Movil
     </div>
     <div class="dato-contenido">

 <a href="https:api.whatsapp.com/send?phone=${recorroDatos.caracteristicas}${recorroDatos.telMovil}&text=Hola%20 ${recorroDatos.nombre}%20 ${recorroDatos.apellido}%20,%20hemos%20recibido%20tu%20solicitud%20para%20formar%20parte%20de%20*Express.*" target="_blank">${recorroDatos.caracteristicas}${recorroDatos.telMovil}</a>
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
      Correo
     </div>
     <div class="dato-contenido">
       ${recorroDatos.correo} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Pais / Provincia
     </div>
     <div class="dato-contenido">
       ${recorroDatos.pais} - ${recorroDatos.provincia}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Localidad
     </div>
     <div class="dato-contenido">
       ${recorroDatos.localidad}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Domicilio
     </div>
     <div class="dato-contenido">
       ${recorroDatos.domicilio}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Codigo Postal
     </div>
     <div class="dato-contenido">
       ${recorroDatos.cp}
     </div>
     </div>
    
  
     <div class="mini-box">
     <div class="dato-titulo">
       Licencia de conducir
     </div>
     <div class="dato-contenido">
       ${recorroDatos.licencia}-${recorroDatos.licenciaVence}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
     Tipo de vehiculo
     </div>
     <div class="dato-contenido">
       ${recorroDatos.tipoVehiculo} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Seguro de desempleo
     </div>
     <div class="dato-contenido">
       ${recorroDatos.seguroDese}-${recorroDatos.seguroVence}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
       Estudios Completados
     </div>
     <div class="dato-contenido">
       ${recorroDatos.estudiosCompletados}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
      Monotributo
     </div>
     <div class="dato-contenido">
       ${recorroDatos.monotributo}
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
      Trabajo Anterior
     </div>
     <div class="dato-contenido">
     <ul>
     <li> 
     ${recorroDatos.empresaTrabajoAnterior} - ${recorroDatos.inicioEmpresa} -${recorroDatos.finalEmpresa}
     </li>
     <li> 
     ${recorroDatos.empresaTrabajoAnteriorDos} - ${recorroDatos.inicioEmpresaDos} -${recorroDatos.finalEmpresaDos}
     </li>
     <li> 
     ${recorroDatos.empresaTrabajoAnteriorTres} - ${recorroDatos.inicioEmpresaTres} -${recorroDatos.finalEmpresaTres}
     </li>
     <ul>
       
     </div>
     </div>
     
     <div class="mini-box">
     <div class="dato-titulo">
     Estado Civil
     </div>
     <div class="dato-contenido">
       ${recorroDatos.eCivil} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
    Hijos
     </div>
     <div class="dato-contenido">
       ${recorroDatos.hijos} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
    Antecedentes o restricciones
     </div>
     <div class="dato-contenido">
       ${recorroDatos.antecedentesRestricciones} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
   Observaciones
     </div>
     <div class="dato-contenido">
       ${recorroDatos.observaciones} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
   Como nos conocio?
     </div>
     <div class="dato-contenido">
       ${recorroDatos.comoConocio} 
     </div>
     </div>
     <div class="mini-box">
     <div class="dato-titulo">
   Cuenta CBU
     </div>
     <div class="dato-contenido">
       ${recorroDatos.cbu} 
     </div>
     </div>
     
     `;
          });
        }
        if (
          DatosDelSolicitante[0].tipoDeSolicitud === "Recolector" ||
          DatosDelSolicitante[0].tipoDeSolicitud === "Call Center" ||
          DatosDelSolicitante[0].tipoDeSolicitud === "Comercio" ||
          DatosDelSolicitante[0].tipoDeSolicitud === "Empleado"
        ) {
          DatosDelSolicitante.forEach((recorroDatos) => {
            template += `
     
 
      <div class="mini-box">
      <div class="dato-titulo">
        Documento Frontal
      </div>
      <div class="dato-contenido">
      <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}front.jpg" target="_blank">
      <img  class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}front.jpg"> 
      </a>
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Documento Posterior
      </div>
      <div class="dato-contenido">
       <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}post.jpg" target="_blank">
      <img class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}post.jpg"> 
           </a>  
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        CUIL / RUT
      </div>
      <div class="dato-contenido">
      <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}cuilrut.jpg" target="_blank">
      <img class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}cuilrut.jpg"> 
         </a>
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Comprobante de domicilio
      </div>
      <div class="dato-contenido">
      <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}comprobante.jpg" target="_blank">
      <img class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}comprobante.jpg"> 
         </a>
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Comprobante de monotributo
      </div>
      <div class="dato-contenido">
      <a href="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}mono.jpg" target="_blank">
      <img id="imagen1" class="imagen-panel" src="../../estilos/imagenes/imgRegister/${recorroDatos.nroDoc}mono.jpg"> 
         </a>
      </div>
      </div>
 
      <div class="mini-box">
      <div class="dato-titulo">
       Documento
      </div>
      <div class="dato-contenido">
      ${recorroDatos.documento} ${recorroDatos.nroDoc} 
      </div>
      </div>
     
     
      <div class="mini-box">
      <div class="dato-titulo">
        Tel Movil
      </div>
      <div class="dato-contenido">
 
  <a href="https://api.whatsapp.com/send?phone=${recorroDatos.caracteristicas}${recorroDatos.telMovil}&text=Hola%20 ${recorroDatos.nombre}%20 ${recorroDatos.apellido}%20,%20hemos%20recibido%20tu%20solicitud%20para%20formar%20parte%20de%20*Express.*" target="_blank">${recorroDatos.caracteristicas}${recorroDatos.telMovil}</a>
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
       Correo
      </div>
      <div class="dato-contenido">
        ${recorroDatos.correo} 
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Pais / Provincia
      </div>
      <div class="dato-contenido">
        ${recorroDatos.pais} - ${recorroDatos.provincia}
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Localidad
      </div>
      <div class="dato-contenido">
        ${recorroDatos.localidad}
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Domicilio
      </div>
      <div class="dato-contenido">
        ${recorroDatos.domicilio}
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
        Codigo Postal
      </div>
      <div class="dato-contenido">
        ${recorroDatos.cp}
      </div>
      </div>
     
      <div class="mini-box">
      <div class="dato-titulo">
      Tipo
      </div>
      <div class="dato-contenido">
        ${recorroDatos.tipoVehiculo} 
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
       Monotributo
      </div>
      <div class="dato-contenido">
        ${recorroDatos.monotributo}
      </div>
      </div>
     
      
      <div class="mini-box">
      <div class="dato-titulo">
    Como nos conocio?
      </div>
      <div class="dato-contenido">
        ${recorroDatos.comoConocio} 
      </div>
      </div>
      <div class="mini-box">
      <div class="dato-titulo">
    Cuenta CBU
      </div>
      <div class="dato-contenido">
        ${recorroDatos.cbu} 
      </div>
      </div>
      
      `;
          });
        }

        $("#box-solicitante").html(template);
        //
        $("#container-datos-solicitante").show();

        MostrarOcultarPanelGeneral();

        //no tienes que esconderla cada vez si ya está mostrada y actualiza la información, más bien es saber en que momento se va a esconder, ... se esconde cuando la operadora quiera seguir gestionando en una seccion de busqueda de clientes,
      }
    );
  });
}

function MostrarPanelSeteo() {
  document
    .getElementById("#MostrarPanel")
    .addEventListener("click", function (event) {
      e.preventDefault();
      SeteaPanelGeneral();
    });
}

var panelGeneralDisplay = $("#panel");
function MostrarOcultarPanelGeneral() {
  panelGeneralDisplay.hide();
  panelGeneralDisplayed = false;
}
function SeteaPanelGeneral() {
  panelGeneralDisplay.show();
  panelGeneralDisplayed = true;
}

function Redireccion() {
  $("#mostrarpanel").click(function () {
    location.href = "panel.php";
  });

  $("#inicio").click(function () {
    location.href = "../../index.html";
  });
  $("#cerrar").click(function () {
    location.href = "../../model/adm/destroy.php";
  });
}
