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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Express || Logística</title>

    <script src="../../estilos/personal/js/jquery.min.js"></script>


    <link rel="stylesheet" href="../../estilos/personal/fontawesome/css/all.css">

    <link rel="stylesheet" href="../../estilos/personal/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../estilos/personal/css/adm/recursos_panel.css">
    <link rel="stylesheet" href="../../estilos/personal/css/sidebarper.css">


</head>

<body>

    <div class="fondoimagen" id="fondoimagen">


        <img class="logo-main" id="logodos" src="../../estilos/imagenes/logo2.png" alt="">

        <img class="logo-main-dos" id="logouno" src="../../estilos/imagenes/logo.png" alt="">

    </div>

    <!--Carousel Wrapper-->


    <div class="container-barra-panel">
        <div class="tamano-espacio-items">


            <div class="mini-box-panel" id="inicio">
                <div class="item">
                    <i class="fas fa-home"></i>
                </div>


            </div>
            <div class="mini-box-panel" id="mostrarpanel">
                <div class="item">
                    <i class="fas fa-search"></i>
                </div>

            </div>
            <div class="mini-box-panel">
                <div class="solicitudes" id="solicitudes">
                    <div class="caja-notificacion" id="caja-notificacion">
                    </div>
                    <div class="item">
                        <i class="far fa-bell"></i>
                    </div>
                </div>
                <div class="despliegue-notificacion" id="despliegue-notificacion">
                </div>
            </div>
            <div class="mini-box-panel" id="cerrar">
                <div class="item">
                    <i class="fas fa-sign-out-alt"></i>
                </div>

            </div>
        </div>


    </div>







    <input class="input-form" type="checkbox" id="cuadraditocheck">
    <label class="titulo-label" for="cuadraditocheck">
        <i class="fas fa-bars" id="boton"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebarper completo">
        <header>Express</header>
        <ul class="completo">
            <li>
                <a href="../../index.html"><i class="fas fa-home"></i>Inicio</a>
            </li>
            <li>
                <a href="../../views/products/corporativo.html"><i class="fas fa-truck"></i>Logistica inversa</a>
            </li>
            <li>
                <a href="../../views/products/corp-traslados.html"><i class="fas fa-stream"></i>Distribución</a>
            </li>
            <li>
                <a href="../../views/products/ecommerce.html"><i class="fas fa-laptop"></i>Ecommerce</a>
            </li>
            <li>
                <a href="../../views/products/particulares.html"><i class="fas fa-box-open"></i>Particulares</a>
            </li>

            <li>
                <a href="../../views/products/productos.html"><i class="fas fa-shopping-bag"></i>Productos</a>
            </li>
            <li>
                <a href="../../views/company/nosotros.html"><i class="fas fa-envelope"></i>#Express</a>
            </li>
            <li>
                <a href="../../views/company/contacto.html"><i class="fas fa-phone"></i>Contacto</a>
            </li>

            <li>
                <a href="../../views/adm/destroy.php"><i class="fas fa-users"></i>Salir</a>
            </li>



        </ul>



    </div>




    <div class="container-titulo-usuario">
        <div class="box-titulo-usuario">
            <h4>Coordinadora: <?php echo $_SESSION["tipo"]["nombre"]; ?></h4>
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






    <script src="../../assets/adm/panel.js"></script>
    <script src="../../estilos/personal/js/logo.js"> </script>


</body>

</html>