$(document).ready(function () {
  $("#loguear").click(function () {
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;
    
   
    $.ajax({
      url: "../../model/login/Mlogin.php",
      type: "POST",
      data: { usuario, contrasena },
      success: function (response) {
         var data = JSON.parse(response)
  
  if(data.fail !=false){
      
     if(data.tipo === 'admin'){
        location.href = '../../views/adm/panel.php';
     }

  } else{
    $("#error").show();
    $("#usuario").val('');
    $("#contrasena").val('');
    
  }
        
          // if(data[0].tipo === 'admin'){
          //   location.href = '../../views/adm/panel.php';
          //  }
        
      
      
      }
    });
  });
});
