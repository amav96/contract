<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('Location:../../login/loginrecolector.php');
}


?>
<?php require_once('../../vistas/include/panelrecolector/superior_recolector.php') ?>

<body>

  <style>
    #color {
      display: none;
    }

    #puntero {
      display: none;
    }

    #errorAclaracion {
      display: none;
      color: #c44a4a;
    }

    #errorDocumento {
      display: none;
      color: #c44a4a;
    }

    #exito-firmar {
      display: none;
    }

    .mensaje-exito-firma {
      display: flex;
      justify-content: center;
      align-content: center;
      align-items: center;
      margin: 0 auto;
      flex-direction: row;
    }

    .box-mensaje-exito-firma {
      padding: 0.5rem;
      background: #fff;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      border-radius: 7px;
    }

    #debes-recuperar {
      display: none;
    }

    .container-mensaje-debes-recuperar {
      display: flex;
      justify-content: center;
      align-content: center;
      align-items: center;
      margin: 0 auto;
      flex-direction: row;
    }

    .box-mensaje-debes-recuperar {
      padding: 0.5rem;
      background: #fff;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      border-radius: 7px;
    }
  </style>




  <div class="container" style="position:inherit;">
    <div class="table-wrapper" style="position:inherit;">
      <div class="table-title" style="position:inherit;">
        <div class="row" style="position:inherit;color:black;">
          <div class="col-sm-6" style="position:inherit;">
            <b>
              <h2>Panel Recolector
            </b></h2>
          </div>

          <br>
          <!--formulario generar orden -->

          <div class='col-sm-4 pull-right'>
            <form id="task-form" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="id_recoleorden" id="id_recoleorden" value="<?php if (isset($_SESSION['username'])) {
                                                                                                            echo $_SESSION['username']['username'];
                                                                                                          } ?>" placeholder="ID recolector" style="width:100px;height:25px;">
                <input type="hidden" class="form-control" name="fecha_orden" id="fecha_orden" value="<?php date_default_timezone_set('America/Argentina/Buenos_Aires');
                                                                                                      echo date("Y-m-d H:i:s"); ?>" readonly>
              </div>

              <button type="button" href="#addProductModal" data-toggle="modal" class="btn btn-success agregar">Agregar Equipo</button>
              <button class="btn btn-primary" name="ordengenerar">Generar Orden</button>
            </form>
          </div>



          <!--tabla generar orden p -->

          <table id="table1" style="border-collapse: collapse;" class='table table-responsive'>
            <thead>
              <tr>
                <th scope='col'>Nro.Orden</th>
              </tr>
            </thead>
            <tbody id="tasks"></tbody>

            </tbody>
          </table>

        </div>
      </div>

      <!-- BUSCAR -->





      <div class="input-group mb-3 pull-right" style="margin:0 0.5rem;">
        <input type="text" class="form-control" placeholder="Buscar Cliente" id="q">
        <span class="input-group-btn">
          <button class="btn btn-danger" type="button" id="clickBuscar" onclick="load(1);">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <br>
      <br>
      <br>

      <div class='input-group mb-3 pull-right'>

        <form action="../../correo/enviarcliente.php" method="POST" id="abrirRemito">
          <button class="btn btn-primary mb-2" name="mensaje">Remito Electrónico</button>
        </form>

      </div>
      <div class='input-group mb-3 pull-right' style="margin:0 0.5rem;">
        <button class="btn btn-info" type="button" id="abrirfirmar" data-toggle="modal" data-target="#firmar">
          Firmar
        </button>
      </div>



       <div class="modal fade" id="firmar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Firma, aclaración y documento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-mensaje-debes-recuperar" id="debes-recuperar">
                <div class="box-mensaje-debes-recuperar">
                  <i class="fas fa-times"></i>
                  <span>Debes recuperar un equipo</span>
                </div>
              </div>
              <div class="mensaje-exito-firma" id="exito-firmar">
                <div class="box-mensaje-exito-firma">
                  <i class="fas fa-check"></i>
                  <span>Has firmado el remito con exito</span>
                </div>
              </div>
              <div id="contenedor">
                <div class="col-md-12">
                  <canvas id="firma" width="290" height="310" style="border:1px solid black; margin:0.5rem auto">
                  </canvas>
                </div>
                <div class="row">
                  
                  <div class="col-md-12  mb-5">
                    <label class="text-left" for="">Aclaración</label>
                    <input style="background-color:#D6EAF8 ;border:0;" type="text" class="form-control" id="nombreaclaracion" placeholder="Quien entrega el equipo">
                    <label for="" id="errorAclaracion"></label>
                    <label class="text-left" for="">Documento</label>
                    <input style="background-color:#D6EAF8 ;border:0;" type="text" class="form-control" id="documentoFirmar" placeholder="Documento">
                    <label for="" id="errorDocumento"></label>
                    <input style="background-color:#D6EAF8 ;border:0;" type="hidden" class="form-control" id="idFirmar">
                    
                  </div>
                  <div class="row-md-12 text-center mb-5">
                    <input style="margin:0.5rem auto;" type="button" class="btn btn-success" id="crear-imagen" value="Listo"></input>
                    <input style="margin:0.5rem auto;" type="button" class="btn btn-info" id="borrar-imagen" value="Borrar Firma"></input>
                    <input type="color" id="color">
                    <input type="range" id="puntero" min="1" default="1" max="5" width="10%">
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div> 
   
      <div class='clearfix'></div>
      <hr>
      <div id="loader"></div><!-- Carga de datos ajax aqui -->
      <div id="resultados"></div><!-- Carga de datos ajax aqui -->
      <div class='outer_div'></div><!-- Carga de datos ajax aqui -->


    </div>
  </div>











  <!-- Edit Modal HTML -->
  <?php include("../../html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("../../html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("../../html/modal_delete.php"); ?>




  <!-- abrir modal firmar  -->


  <!-- cerrar sesion despues de cierto tiempo-->
  <?php require_once('../../vistas/include/panelrecolector/inferior_recolector.php')  ?>









  <script type="text/javascript">
    function e(q) {
      document.body.appendChild(document.createTextNode(q));
      document.body.appendChild(document.createElement("BR"));
    }

    function inactividad() {
      window.location.href = "../../conectar/cerrar_sesion.php";
    }
    var t = null;

    function contadorInactividad() {
      t = setTimeout("inactividad()", 600000);
    }
    window.onblur = window.onmousemove = function() {
      if (t) clearTimeout(t);
      contadorInactividad();
    }



    $(".btn-success").click(function() {

      $("input[name=id_orden]").val($("#tasks").text().trim());
      $("input[name=id_orden_pass]").val($("#tasks").text().trim());


    });

     $("#confirmar").click(function() {
      

       $("input[name=horario_rec_editar]").val('')
       var d = new Date();
       const letrero = document.querySelector("#fecha_para_editar")
       const fecha = new Date();
       let anio = fecha.getFullYear()
       let mes = fecha.getMonth() + 1
       let dia = fecha.getDate()
       let hora = fecha.getHours()
       let minuto = fecha.getMinutes()
       let segundo = fecha.getSeconds()
       if (dia < 10) {
         dia = '0' + dia
       }
       if (mes < 10) {
         mes = '0' + mes
       }
       if (hora < 10) {
         hora = '0' + hora
       }
       if (minuto < 10) {
         minuto = '0' + minuto
       }
       if (segundo < 10) {
         segundo = '0' + segundo
       }
       letrero.value = `${anio}-${mes}-${dia} ${hora}:${minuto}:${segundo}`

       console.log(anio+mes+dia+hora+minuto+segundo);
});

  </script>

  <script src="../../script/recolector_recupero/ordenes.js"></script>

  <script src="../../script/recolector_recupero/script.js"></script>
  <script src="../../script/recolector_recupero/canvas.js"></script>


</body>

</html>