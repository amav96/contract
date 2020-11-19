$(document).ready(function () {
var datos ="";

if(datos){
    console.log("si")
}if (!datos){
    console.log("no estoy")
}

    // $("#buscarCliente").click(function () {
    //     var DatoEnviado = $("#identificacionIngresada").val()
    //     console.log("input" + DatoEnviado)
    //     $.ajax({
    //         url: "../../model/deliver/Mdeliver-items.php",
    //         type: "GET",
    //         data: { DatoEnviado },
    //         success: function (response) {

    //             var ReciboDatos = JSON.parse(response)
    //             console.log(ReciboDatos)
    //             if (ReciboDatos.fail === false)
    //                 console.log("no tienes nada")
    //             if (ReciboDatos.fail !== false) {

    //                 $("#tabladatos").show();
    //                 $("#container-boton-entregar").show();
    //                 var provincia = ReciboDatos[0].provincia;
    //                 var localidad = ReciboDatos[0].localidad;
    //                 var direccion = ReciboDatos[0].direccion;
    //                 var codigo_postal = ReciboDatos[0].codigo_postal;

                    //  EntregarEquipo(provincia, localidad, direccion, codigo_postal);

    //                 templateTitulo = `
    // <h4>Hola ${ReciboDatos[0].nombre_cliente}. Estos los equipos que debes entregar.</h4>
    // `;
    //                 $("#box-titulo").html(templateTitulo);

    //                 template = "";

    //                 if (ReciboDatos.fail != false) {
    //                     ReciboDatos.forEach((recorroDatos) => {

    //                         template += `
    //     <tr>
    //         <td>${recorroDatos.serie}</td>
    //         <td>${recorroDatos.equipo}</td>
    //         <td>${recorroDatos.direccion}</td>
    //         <td>${recorroDatos.tarjeta}</td>
    //         <td>${recorroDatos.localidad}</td>
    //         <td>${recorroDatos.provincia}</td>
    //         <td>${recorroDatos.codigo_postal}</td>
    //     <tr>
       
       
    //     `;

    //                     })

    //                     $("#tbody").html(template);
    //                 }
    //             }
    //         }
    //     })        
    // })
})


//  function EntregarEquipo(provincia, localidad, direccion, codigo_postal) {

//           $.ajax({
//               url: "../../model/deliver/Mdeliver-items.php",
//               type:"POST",
//               data:{codigo_postal},
//               success: function (response){
// console.log(response)
//               }
//           })
//          console.log(provincia,localidad,direccion,codigo_postal)
//  }

// function BuscarCp(provincia,localidad,direccion){

//     $(document).on("blur", "#codigoPostal", function (){
//         var cp = $("#codigoPostal").val();

//         console.log(provincia,localidad,direccion);

//         $.ajax({
//             url:"../../model/deliver/deliver-items.php",
//             type:"POST",
//             data: { cp },
//             success: function (response){
//                 var CodigoPostales = JSON.parse(response)
//                  template =`'<option class="select-form" selected disabled>--Seleccione--</option>'`
//                console.log(CodigoPostales);

//                CodigoPostales.forEach((recorroDatos) =>{
//                 template+=`
//                 <option value="${recorroDatos.id_recolector}">${recorroDatos.nombre_recolector}</option>
//                 `;
//                 console.log(recorroDatos.nombre_recolector)
               // // template += `
                // // <option> ${}</option> 

                // `;
//                })

//                $("#deliver").html(template);
//             }
//         })


//     })



// }
