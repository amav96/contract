$(document).ready(function () {
  $("#loguear").click(function () {
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;
    
   

    $.ajax({
      url: "../../model/login/login_adm.php",
      type: "POST",
      data: { usuario, contrasena },
      success: function (response) {
        let data = JSON.parse(response)
        console.log(data)
      }
    });
  });
});
