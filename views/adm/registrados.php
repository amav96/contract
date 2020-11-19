<?php
session_start();


if (isset($_SESSION["tipo"])) {

    if ($_SESSION["tipo"]["tipo"] != 'admin') {
        header("Location: ../../index.html");
    }
} else {
    header("Location: ../../");
}

?>

<?php require_once '../layout/headerAdmin.php'; ?>

<div class="container">
    <div class="container-titulo-usuario">
        <div class="box-titulo-usuario">
            <h4>Coordinadora: <?php echo $_SESSION["tipo"]["nombre_recolector"]; ?></h4>
        </div>
    </div>

    <div class="container-datos-solicitante" id="container-datos-solicitante">

        <div class="box-solicitante" id="box-solicitante">

        </div>
    </div>

    <div class="text-center  d-flex justify-content-center">
           <div class="form-group w-40 p-3 ">
              <label  for="">Ingresar documento</label>
              <input id="documento" class="form-control" type="text">
              <button id="buscar-solicitudes" class="btn btn-warning m-2" >Buscar</button>
              <button id="mostrar-todos" class="btn btn-info m-2" >Mostrar Todos</button>
           </div>
    </div>


    <div class="table-solicitudes" id="table-solicitudes">


    </div>

    </div>

   
    
    <?php require_once '../layout/footerAdmin.php'; ?>
