

   var btnSearchRequest = $("#buscar-solicitudes")
   
  
   $(document).on("click",'#buscar-solicitudes',function(){

    var numerodoc = $("#documento").val()

      $.ajax({
          url:"../../control/usuarioControllers.php?usuario&accion=request",
          type:"POST",
          data:{numerodoc},
          beforeSend: function(){
            $("#table-solicitudes").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>')
          },
      }).done(function(response){
         var object = JSON.parse(response);
         var template ="";
          if(object[0].result === '1'){

         template = showRequest(object); $("#table-solicitudes").html(template)

          }else if(object[0].result === '2'){ alert("no existe")}
      })
       
   })


   $(document).on("click",'#mostrar-todos',function(){
       showAll()
})

$(document).on("click","#alta",function(){

   var guia = this.parentElement
   var id = $(guia).attr('guia')
   $("#id_recolector").val(id)
   var nombre = this.parentElement
   var name = $(nombre).attr('nombre')
   $("#nombre_recolector").val(name)
   var correo = this.parentElement
   var email = $(correo).attr('correo')
   $("#correo_recolector").val(email)
  
   $("#modalAlta").modal("show") 

})

$(document).on("click","#send-data-alta",function(){

    var id = $("#id_recolector").val()
    var nombre = $("#nombre_recolector").val()
    var correo = $("#correo_recolector").val()
    var tipo = $("#tipo").val();
    var id_ingreso = $("#id_ingreso").val();
    var status_reco = $("#status_reco").val();


   
if(id === ''){alertNegative("El formulario de registro no tiene una guia");return false}
 if (nombre === ''){alertNegative("Debes ingresar el nombre de recolector");return false}
 if(correo === ''){alertNegative("Debes ingresar el correo del recolector");return false}
 if(tipo === '0'){alertNegative("Debes escoger el tipo");return false}
 if($("#cont-id").is(":visible")){
  if(id_ingreso === ''){alertNegative("Debes ingresar el id del recolector");return false}
 }

if(status_reco === '0'){alertNegative("Debes escoger el estado");return false}
     $.ajax({
              url:"../../control/usuarioControllers.php?usuario&accion=activateUser",
              type:"POST",
              data:{id,nombre,correo,tipo,id_ingreso,status_reco},
              beforeSend:function(){
              },
          }).done(function(response){
              var objeto = JSON.parse(response)
             
               if(objeto[0].result === '1'){
              
                

              

                  alertPositive("Se guardo exitosamente");
                  $("#id_ingreso").val("")
                  $("#status_reco").prop("selectedIndex", 0);
                  $("#cont-id").show()
                  $("#modalAlta").modal("hide") 
                
                  showAll()

               }
                if(objeto[0].result === '2'){
                  alertNegative("Error al actualizar estado");return false
              
                }if(objeto[0].result === '3'){
                  alertNegative("El recolector ya existe");return false
                }
                if(objeto[0].result === '4'){
                  alertNegative("No llego la información completa");return false
                }
          })       
})

$(document).on("click","#estados",function(){

  var guia = this.parentElement
   var id = $(guia).attr('guia')
   $("#id_status").val(id)
   $("#modalStatus").modal("show")

})

$(document).on("click","#sendcontrato",function(){

  var guiacontrato = this.parentElement
   var idcontrato = $(guiacontrato).attr('guiacontrato')
   $("#id_status").val(idcontrato)
   $("#modalStatus").modal("show")

})



$(document).on("click","#send-data-status",function(){
var estado = $("#status").val()
var id_status =  $("#id_status").val()

  if(estado === '0'){
    alertNegative("Debes seleccionar un estado");return false
  }else if(id_status === ''){
    alertNegative("No existe guia de id para modificar estados");return false
  }else {

    $.ajax({
      url:"../../control/usuarioControllers.php?usuario&accion=modifyStatus",
      type:"POST",
      data:{estado,id_status},
      beforeSend:function(){

      }
    }).done(function(response){
      
      var object = JSON.parse(response);
      
      if(object[0].result === '1'){

        $("#status").prop("selectedIndex", 0);
        showAll();
        
        $("#modalStatus").modal("hide")
        
        alertPositive("Se actualizo el estado exitosamente!");
        
      }else {
        alertNegative("Ocurrio algún problema al cambiar estado");return false
      }
    })
  }
})


$(document).on("change", '#status_reco', function() {


  if ($("#status_reco").val() === 'down' || $("#status_reco").val() === 'activeExist') {

      $("#cont-id").hide()

  }
  if ($("#status_reco").val() === 'active') {


      $("#cont-id").show()

      }

})

$(document).on("click","#avisoactivo",function(){


  var idwhats = this.parentElement
  var idsacado = $(idwhats).attr('guiacontrato')

  var attrTel =  this.parentElement
  var telMovil = $(attrTel).attr('telefono')

  
  $("#telefono_enviar_whatsapp").val(telMovil)


       $.ajax({
         url:"../../control/usuarioControllers.php?usuario&accion=consultaParaObtenerIdInsertado",
         type:"POST",
         data:{idsacado},
         beforeSend:function(){
         
         }
       }).done(function(response){
         var objeto = JSON.parse(response)
         if(objeto[0].result === '1') {

          $("#modal_sendWhatsapp").modal("show")
          $("#id_enviar_whatsapp").val(objeto[0].id)
         }else{
           alertNegative('Este recolector no esta dado de alta');
         }
        
       })

})

$(document).on("click","#send-data-whatsap",function(){

  
  if($("#id_enviar_whatsapp").val()=== ''){
    alertNegative("Debes ingresar el id usuario")

  }else if($("#telefono_enviar_whatsapp").val() === ''){
    alertNegative("Debes ingresar el Nro de telefono")
  }else{
     var urlencodedtext = 'Hola%20ya%20estas%20activo%20para%20trabajar%20con%20nosotros! %20Ingresa%20con%20tu%20usuario%20'+$("#id_enviar_whatsapp").val()+'';

  window.open('https:api.whatsapp.com/send?phone='+ $("#telefono_enviar_whatsapp").val() +'&text=' + urlencodedtext, '_blank');
  }

})




   function showRequest(object){

   
    var html="";

            html+='<table class="table table-responsive">';
            html+=' <thead>';
            html+='<tr>';
            html+='<th>Estado Contrato<th>';
            html+='<th>Contrato<th>';
            html+='<th>Acción<th>';
            
            html+='<th>Estado de proceso <th>';
            html+='<th>Accion Usuario <th>';
            html+='<th>Tel Movil <th>';
          
            html+='<th>Nombre <th>';
            html+='<th>Apellido <th>';
            html+='<th>Fecha Nacimiento <th>';
            html+='<th>Tipo Documento <th>';
            html+='<th>Nro Documento <th>';
            html+='<th>Como Conocio <th>';
            
            html+='<th>Domicilio <th>';
            html+='<th>Localidad <th>';
            
            html+='<th>Correo <th>';
            html+='<th>Cbu <th>';
            html+='<th>Cuit <th>';
            
            html+='<th>Banco <th>';
            html+='<th>fecha firma <th>';
          
            html+='<th>Tipo<th>';
            html+='<th>Marca vehiculo <th>';
            html+='<th>Modelo vehiculo <th>';
            html+='<th>Patente <th>';
            html+='<th>Pais <th>';
            html+='<th>Provincia <th>';
            html+='<th>Cp <th>';
            html+='<th>Monotributo <th>';
            html+='<th>Seguro Desempleo <th>';
            html+='<th>Seguro Vence <th>';
            html+='<th>Estado Civil <th>';
            html+='<th>Hijos <th>';
            html+='<th>Estudios Completados <th>';
            html+='<th>Horarios Disponibles <th>';
            html+='<th>Empresa Trabajo Anterior <th>';
            html+='<th>Inicio Empresa <th>';
            html+='<th>Final Empresa <th>';
            html+='<th>Antecedentes Restricciones <th>';
            html+='<th>Observaciones <th>';
            
            html+='<th>Tipo De Solicitud <th>';
            
            html+='<th>Licencia <th>';
            html+='<th>Licencia Vence <th>';
           
            
            html+=' </tr>';
            html+='</thead>';
            html+='<tbody>';

         object.forEach((val)=>{

           html+='<tr>';

                    //td contrato 1

                    (val.status_process === 'registered')
                    ?html+='<td guia="'+val.id+'"><button style="font-size:14px;" id="estados" class="btn btn-warning">Estados</button><td>'
                    :(val.status_process === 'signcontract')
                    ?html+='<td>Esperando Firma<td>'
                    :(val.status_process === 'signedcontract')
                    ?html+='<td>Contrato firmado<td>'
                    :(val.status_process === 'doesNotQualify' || val.status_process === 'down')
                    ?html+='<td guia="'+val.id+'"><button style="font-size:14px;" id="estados" class="btn btn-warning">Estados</button><td>'
                    :(val.status_process === 'active' || val.status_process === 'activeExist' || val.status_process === 'show')
                    ?html+='<td>Firmado<td>'
                    :html+='<td>Procesando<td>';
                    
                    //td contrato 2
                                        
                    html+='<td><a target="_blank" href="http://localhost/contract/control/usuarioControllers.php?usuario&accion=showContract&numerodoc=' +val.nroDoc+'"><button style="font-size:13px;" class="btn btn-danger">Ver contrato</button></a><td>';

                     // td accion
                    (val.status_process === 'registered')
                    ?html+='<td>Esperando revisión<td>'
                    :(val.status_process === 'signcontract')
                    ?html+='<td>Esperando firmar contrato<td>'
                    :(val.status_process === 'signedcontract' || val.status_process === 'active' || val.status_process === 'down' || val.status_process === 'activeExist' || val.status_process === 'show')
                    ?html+='<td guia="'+val.id+'" nombre="'+ val.nombre + ' ' +val.apellido+'" correo="' +val.correo +'"  ><button style="font-size:14px;" id="alta" class="btn btn-success">Alta/baja</button><td>'
                    :(val.status_process === 'doesNotQualify')
                    ?html+='<td>No Califica<td>'
                    :html+='<td>Procesando<td>';
                    
        

                    // td status proceso

                    (val.status_process === 'registered')
                    ?html+='<td>Espera primera revisión <td>'
                    :(val.status_process === 'signcontract')
                    ?html+='<td>Esperando firmar contrato <td>'
                    :(val.status_process === 'signedcontract')
                    ?html+='<td>Contrato firmado <td>'
                    :(val.status_process === 'active' || val.status_process === 'activeExist')
                    ?html+='<td>Activo<td>'
                    :(val.status_process === 'doesNotQualify')
                    ?html+='<td>No califica <td>'
                    :(val.status_process === 'down' || val.status_process === 'show')
                    ?html+='<td>Baja<td>'
                    :true;
                    
                    //td accion usuario
                 
                    (val.status_process === 'registered' || val.status_process === 'doesNotQualify' || val.status_process === 'down' || val.status_process === 'show')
                    ?html+='<td guiacontrato="'+val.id +'" > <a id="sendcontrato" target="_blank" href="https:api.whatsapp.com/send?phone='+val.telMovil + '&text=Te%20invitamos%20a%20completar%20tu%20*alta*%20firmando%20este%20*contrato*%20192.168.8.112/contract/control/usuarioControllers.php?usuario%26accion=showContract%26numerodoc='+val.nroDoc +'"><button class="btn btn-info">Enviar Contrato</button></a><td>'
                    :(val.status_process === 'active' || val.status_process === 'activeExist')
                    ?html+='<td guiacontrato="'+val.id +'" telefono="'+val.telMovil+'" ><button id="avisoactivo" class="btn btn-success">Aviso activo</button><td>'
                    :(val.status_process === 'signcontract')
                    ?html+='<td guiacontrato="'+val.id +'" ><a target="_blank" href="https:api.whatsapp.com/send?phone='+val.telMovil + '&text=Te%20hemos%20enviado%20el%20contrato.%20ya%20estas%20listo?"><button class="btn btn-primary">¿Firmaste contrato?</button></a><td>'
                    :(val.status_process === 'signedcontract')
                    ?html+='<td guiacontrato="'+val.id +'"  ><a target="_blank" href="https:api.whatsapp.com/send?phone='+val.telMovil + '&text=En%20breve%20estaras%20activo%20para%20trabajar"><button class="btn btn-warning">Pronto Activo</button></a><td>'
                    :html+='<td guiacontrato="'+val.id +'"  >'+val.telMovil+'<td>';

                    // --------------
                    html+='<td>'+val.telMovil+ '<td>';
                    
                    html+='<td >'+val.nombre + '<td>';
                    html+='<td>'+val.apellido + '<td>';
                    html+='<td>'+val.fechaNac + '<td>';
                    html+='<td>'+val.documento + '<td>';
                    html+='<td>'+val.nroDoc + '<td>';
                    html+='<td>'+val.comoConocio + '<td>';
                    
                    html+='<td>'+val.domicilio + '<td>';
                    html+='<td>'+val.localidad + '<td>';
                    
                    html+='<td >'+val.correo + '<td>';
                    html+='<td>'+val.cbu + '<td>';
                    html+='<td>'+val.cuit + '<td>';
                    
                    html+='<td>'+val.banco + '<td>';
                    html+='<td>'+val.signed_date + '<td>';
                   
                   
                    html+='<td>'+val.tipoVehiculo + '<td>';
                    html+='<td>'+val.vehicle_brand + '<td>';
                    html+='<td>'+val.vehicle_model + '<td>';
                    html+='<td>'+val.patent + '<td>';
                    html+='<td>'+val.pais + '<td>';
                    html+='<td>'+val.provincia + '<td>';
                    html+='<td>'+val.cp + '<td>';
                    html+='<td>'+val.monotributo + '<td>';
                    html+='<td>'+val.seguroDese + '<td>';
                    html+='<td>'+val.seguroVence + '<td>';
                    html+='<td>'+val.eCivil + '<td>';
                    html+='<td>'+val.hijos + '<td>';
                    html+='<td>'+val.estudiosCompletados + '<td>';
                    html+='<td>'+val.horariosDisponibles + '<td>';
                    
                    html+='<td>'+val.empresaTrabajoAnterior + '<td>';
                    html+='<td>'+val.inicioEmpresa + '<td>';
                    html+='<td>'+val.finalEmpresa + '<td>';
                    html+='<td>'+val.antecedentesRestricciones + '<td>';
                    html+='<td>'+val.observaciones + '<td>';
                    
                   
              
                    html+='<td>'+val.tipoDeSolicitud + '<td>';
                    
                    html+='<td>'+val.licencia + '<td>';
                    html+='<td>'+val.licenciaVence + '<td>';
                    
           html+='</tr>';

         })

         html+='</tbody>';
         html+='</table>';

         

         return html;

   }


   function showAll(){
    var key = 'all';
  
    $.ajax({
        url:"../../control/usuarioControllers.php?usuario&accion=request",
        type:"POST",
        data:{key},
        beforeSend: function(){
        },
    }).done(function(response){
       var object = JSON.parse(response);
       var template ="";
        if(object[0].result === '1'){
  
       template = showRequest(object); $("#table-solicitudes").html(template)
  
        }else if(object[0].result === '2'){ alert("no existe")}
    })
  }

   
function alertPositive(str){

    Swal.fire({
                      
      icon: 'success',
      title: str,
      showConfirmButton: false,
      timer: 1600
    })
  
  }
  
  function alertNegative(str){
    Swal.fire({
      icon: "error",
      title: "Info",
      text: str,
      timer: 3000,
      showConfirmButton: false,
  });
  }

  
   




