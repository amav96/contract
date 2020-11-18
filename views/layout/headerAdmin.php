
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Express || Logística</title>

    <script src="../../estilos/personal/js/jquery.min.js"></script>
    <script src="../../estilos/personal/js/bootstrap.min.js"></script>

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
                <a href="../../views/adm/registrados.php"><i class="fas fa-file-invoice"></i>Solicitudes</a>
            </li>
           


            <li>
                <a href="../../views/adm/destroy.php"><i class="fas fa-users"></i>Salir</a>
            </li>



        </ul>



    </div>