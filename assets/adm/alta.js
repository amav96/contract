

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


   
if(id === ''){alertNegative("El formulario de registro no tiene una guia");return false}
else if (nombre === ''){alertNegative("Debes ingresar el nombre de recolector");return false}
else if(correo === ''){alertNegative("Debes ingresar el correo del recolector");return false}
else if(tipo === '0'){alertNegative("Debes escoger el tipo");return false}
else if(id_ingreso === ''){alertNegative("Debes ingresar el id del recolector");return false}
else {
     $.ajax({
              url:"../../control/usuarioControllers.php?usuario&accion=activateUser",
              type:"POST",
              data:{id,nombre,correo,tipo,id_ingreso},
              beforeSend:function(){
              },
          }).done(function(response){
              var objeto = JSON.parse(response)
              console.log(objeto)
               if(objeto[0].result === '1'){
              
                 alertPositive("Se guardo exitosamente");
                 $("#modalAlta").modal("hide") 

               }if(objeto[0].result === '2'){
                 alertNegative("Error al actualizar estado");return false
              
               }if(objeto[0].result === '3'){
                 alertNegative("El id ya existe");return false
               }
               if(objeto[0].result === '4'){
                 alertNegative("No llego la información completa");return false
               }
          
          })
}

       

       
})



   function showRequest(object){

   
    var html="";

            html+='<table class="table table-responsive">';
            html+=' <thead>';
            html+='<tr>';
            html+='<th>Contrato<th>';
            html+='<th>Alta<th>';
            html+='<th>Estado de proceso <th>';
            html+='<th>ID<th>';
            html+='<th>Nombre <th>';
            html+='<th>Apellido <th>';
            html+='<th>Fecha NacIMIENTO <th>';
            html+='<th>Tipo Documento <th>';
            html+='<th>Nro Documento <th>';
            html+='<th>Como Conocio <th>';
            html+='<th>Seguro Desempleo <th>';
            html+='<th>Seguro Vence <th>';
            html+='<th>Domicilio <th>';
            html+='<th>Localidad <th>';
            html+='<th>Tel Movil <th>';
            html+='<th>Correo <th>';
            html+='<th>Estado Civil <th>';
            html+='<th>Hijos <th>';
            html+='<th>Estudios Completados <th>';
            html+='<th>Horarios Disponibles <th>';
            html+='<th>Empresa Trabajo Anterior <th>';
            html+='<th>Inicio Empresa <th>';
            html+='<th>Final Empresa <th>';
            html+='<th>Antecedentes Restricciones <th>';
            html+='<th>Observaciones <th>';
            html+='<th>Pais <th>';
            html+='<th>Provincia <th>';
            html+='<th>Cp <th>';
            html+='<th>Monotributo <th>';
        
            html+='<th>Estado <th>';
            html+='<th>Empresa Trabajo Anterior Dos <th>';
            html+='<th>Empresa Trabajo Anterior Tres <th>';
            html+='<th>Inicio EmpresaDos <th>';
            html+='<th>Inicio EmpresaTres <th>';
            html+='<th>Final EmpresaDos <th>';
            html+='<th>Final EmpresaTres <th>';
            html+='<th>Tipo De Solicitud <th>';
            html+='<th>Cbu <th>';
            html+='<th>Cuit <th>';
            html+='<th>Tipo <th>';
            html+='<th>Banco <th>';
            html+='<th>fecha firma <th>';
            
        
            html+='<th>Tipo Vehiculo <th>';
            html+='<th>Licencia <th>';
            html+='<th>Licencia Vence <th>';
            html+='<th>Marca vehiculo <th>';
            html+='<th>Modelo vehiculo <th>';
            html+='<th>Patente <th>';
            
            html+=' </tr>';
            html+='</thead>';
            html+='<tbody>';

         object.forEach((val)=>{

           html+='<tr>';

                    html+='<td><a target="_blank" href="http://localhost/contract/control/usuarioControllers.php?usuario&accion=showContract&numerodoc=' +val.nroDoc+'"><button class="btn btn-danger">Contrato</button></a><td>';
                    html+='<td guia="'+val.id+'" nombre="'+ val.nombre + ' ' +val.apellido+'" correo="' +val.correo +'"  ><button id="alta" class="btn btn-success">Alta/baja</button><td>';
                    html+='<td>'+val.status_process + '<td>';
                    html+='<td>'+val.id + '<td>';
                    html+='<td >'+val.nombre + '<td>';
                    html+='<td>'+val.apellido + '<td>';
                    html+='<td>'+val.fechaNac + '<td>';
                    html+='<td>'+val.documento + '<td>';
                    html+='<td>'+val.nroDoc + '<td>';
                    html+='<td>'+val.comoConocio + '<td>';
                    html+='<td>'+val.seguroDese + '<td>';
                    html+='<td>'+val.seguroVence + '<td>';
                    html+='<td>'+val.domicilio + '<td>';
                    html+='<td>'+val.localidad + '<td>';
                    html+='<td>'+val.caracteristicas +val.telMovil + '<td>';
                    html+='<td >'+val.correo + '<td>';
                    html+='<td>'+val.eCivil + '<td>';
                    html+='<td>'+val.hijos + '<td>';
                    html+='<td>'+val.estudiosCompletados + '<td>';
                    html+='<td>'+val.horariosDisponibles + '<td>';
                    
                    html+='<td>'+val.empresaTrabajoAnterior + '<td>';
                    html+='<td>'+val.inicioEmpresa + '<td>';
                    html+='<td>'+val.finalEmpresa + '<td>';
                    html+='<td>'+val.antecedentesRestricciones + '<td>';
                    html+='<td>'+val.observaciones + '<td>';
                    html+='<td>'+val.pais + '<td>';
                    html+='<td>'+val.provincia + '<td>';
                    html+='<td>'+val.cp + '<td>';
                    html+='<td>'+val.monotributo + '<td>';
                   
                    html+='<td>'+val.estado + '<td>';
                    html+='<td>'+val.empresaTrabajoAnteriorDos + '<td>';
                    html+='<td>'+val.empresaTrabajoAnteriorTres + '<td>';
                    html+='<td>'+val.inicioEmpresaDos + '<td>';
                    html+='<td>'+val.inicioEmpresaTres + '<td>';
                    html+='<td>'+val.finalEmpresaDos + '<td>';
                    html+='<td>'+val.finalEmpresaTres + '<td>';
                    html+='<td>'+val.tipoDeSolicitud + '<td>';
                    html+='<td>'+val.cbu + '<td>';
                    html+='<td>'+val.cuit + '<td>';
                    html+='<td>'+val.tipo + '<td>';
                    html+='<td>'+val.banco + '<td>';
                    html+='<td>'+val.signed_date + '<td>';
                   
                   
                    html+='<td>'+val.tipoVehiculo + '<td>';
                    html+='<td>'+val.licencia + '<td>';
                    html+='<td>'+val.licenciaVence + '<td>';
                    html+='<td>'+val.vehicle_brand + '<td>';
                    html+='<td>'+val.vehicle_model + '<td>';
                    html+='<td>'+val.patent + '<td>';
           html+='</tr>';

         })
         html+='</tbody>';
         html+='</table>';

         return html;

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

   




