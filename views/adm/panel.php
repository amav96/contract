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


    <div class="container-titulo-usuario">
        <div class="box-titulo-usuario">
            <h4>Coordinadora: <?php echo $_SESSION["tipo"]["nombre_recolector"]; ?></h4>
        </div>
    </div>

    <div class="container-datos-solicitante" id="container-datos-solicitante">

        <div class="box-solicitante" id="box-solicitante">

        </div>
    </div>

    <main class="panel" id="panel">
        <div class="container-selecciona-busqueda">
            <div class="box-consulta" id="BuscadorGeneral">
                <span>Buscador</span>
            </div>
            <div class="box-consulta" id="BuscadorFecha">
                <span>Recolector por Fecha</span>
            </div>
            <div class="box-consulta" id="BuscadorNegativos">
                <span>Reporte por Fecha</span>
            </div>
            <!-- <div class="box-consulta" id="BuscadorRecuperados">
                    <span>Recuperados</span>
                </div> -->
        </div>


        <div class="container-busqueda-general" id="container-busqueda-general">
            <div class="box-busquedageneral">
                <div class="mini-box">
                    <form id="form-iden">
                        <div class="form-input">
                            <div class="linea-buscadora">
                                <input type="text" class="input-general" id="datoBuscar" placeholder="Buscar" required>
                                <button type="submit"><i class="busca fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="container-busqueda-reco-fecha" id="container-busqueda-reco-fecha">
            <div class="box-busquedageneral">
                <div class="mini-box">
                    <form id="form-reco-fecha">
                        <div class="form-input">
                            <label for="">Recolector</label>
                            <input type="text" class="input-general" id="recolector" placeholder="Recolector">
                        </div>
                        <div class="form-input">
                            <label for="">Desde</label>
                            <input type="date" class="input-general" id="recoFechaUno" placeholder="Buscar" required>
                        </div>
                        <div class="form-input">
                            <label for="">Hasta</label>

                            <input type="date" class="input-general" id="recoFechaDos" placeholder="Buscar" required>

                            <button type="submit"><i class="busca fas fa-search"></i></button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container-negativos" id="container-negativos">
            <div class="box-busquedageneral">
                <div class="mini-box">
                    <form id="form-negativos">

                        <div class="form-input">
                            <label for="">Desde</label>
                            <input type="date" class="input-general" id="FechaUno-reporte" placeholder="Buscar">
                        </div>
                        <div class="form-input">
                            <label for="">Hasta</label>
                            <input type="date" class="input-general" id="FechaDos-reporte" placeholder="Buscar">

                            <button type="submit"><i class="busca fas fa-search"></i></button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="spinner-border" role="status" id="procesando">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="container-mensaje-error" id="container-mensaje-error">
            <div class="box-mensaje-error">
                <p class="texto-mensaje">No existen registros con estos datos</p>
            </div>
        </div>


    </main>
    <div class="table-responsive" id="buscador">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Estado</th>
                    <th scope="col">Orden</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Recolector</th>
                    <th scope="col">Identificacion</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Tarjeta</th>
                    <th scope="col">Nombre C.</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">C.P</th>
                    <th scope="col">Hdmi</th>
                    <th scope="col">Av</th>
                    <th scope="col">Fuente</th>
                    <th scope="col">Control</th>
                    <th scope="col">Tlf1</th>
                    <th scope="col">Tlf2</th>
                    <th scope="col">Cod Remito</th>
                    


                </tr>
            </thead>
            <tbody id="tbody">
                <!-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                
              </tr> -->

            </tbody>
        </table>
    </div>

   
    
    <?php require_once '../layout/footerAdmin.php'; ?>
