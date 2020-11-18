$(document).ready(function(){
   $('#loginform').submit(function(e){
   e.preventDefault();
   $.ajax({
      type: "POST",
      url: '../javascriptvalidacion/validacionlogin.php',
      data: $(this).serialize(),
      success: function(response)
      {
         var jsonData = JSON.parse(response);

         //elusuario es logueado satisfactoriamente en el back end
         // redirrecciona
         if (jsonData.success=="1")
         {
             location.href = '../vistas/recolectores/datoscliente.php';
             
         }
         else
         {
           alert('Usuario Incorrecto!');
         }
      }
   });
 });
});
