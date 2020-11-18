
<?php require_once '../config/parametros.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Express | Logistica inversa</title>

    <script src="<?= base_url ?>estilos/personal/js/jquery.min.js"></script>
    <script src="<?= base_url ?>estilos/personal/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= base_url ?>estilos/personal/fontawesome/css/all.css">

    <link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/bootstrap/bootstrap.min.css">

   
    <link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/reclute/recursos_call.css">
    <link rel="stylesheet" href="<?= base_url ?>estilos/personal/css/sidebarper.css">


</head>

<style>
    .titulo-contract {
        margin: 7rem auto;
    }
</style>

<body>


    <div class="fondoimagen" id="fondoimagen">


        <img class="logo-main" id="logodos" src="<?= base_url ?>estilos/imagenes/logo2.png" alt="">

        <img class="logo-main-dos" id="logouno" src="<?= base_url ?>estilos/imagenes/logo.png" alt="">

    </div>
    <nav>
        <div class="contenedordemenu">
            <ul>
                <li>
                    <a href="<?= base_url ?>index.html">

                        <div class="fondocirculodelicono">
                            <i class="iconoadentrodelcirculo fas fa-home"></i>
                        </div>

                        <p class="textoicono">Inicio</p>

                    </a>
                </li>
                <li>
                    <a href="<?= base_url ?>nosotros.html">

                        <div class="fondocirculodelicono">
                            <i class="iconoadentrodelcirculo fas fa-box-open"></i>
                        </div>

                        <p class="textoicono">#Express</p>

                    </a>
                </li>
                <li>
                    <a href="<?= base_url ?>productos.html">

                        <div class="fondocirculodelicono">
                            <i class="iconoadentrodelcirculo fas fa-mobile-alt"></i>
                        </div>

                        <p class="textoicono">Productos</p>

                    </a>
                </li>
                <li>
                    <a href="<?= base_url ?>contacto.html">

                        <div class="fondocirculodelicono">
                            <i class="iconoadentrodelcirculo fas fa-phone"></i>
                        </div>

                        <p class="textoicono">Contacto</p>

                    </a>
                </li>
                <li>
                    <a href="">

                        <div class="fondocirculodelicono adm">
                            <i class="iconoadentrodelcirculo fas fa-user"></i>
                        </div>

                        <p class="textoicono">Login</p>

                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <!--Carousel Wrapper-->



    <input type="checkbox" id="cuadraditocheck">
    <label for="cuadraditocheck">
        <i class="fas fa-bars" id="boton"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebarper completo">
        <header>Express</header>
        <ul class="completo">
            <li>
                <a href="<?= base_url ?>index.html"><i class="fas fa-home"></i>Inicio</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/products/corporativo.html"><i class="fas fa-truck"></i>Logistica inversa</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/products/corp-traslados.html"><i class="fas fa-stream"></i>Distribución</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/products/ecommerce.html"><i class="fas fa-laptop"></i>Ecommerce</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/products/particulares.html"><i class="fas fa-box-open"></i>Particulares</a>
            </li>

            <li>
                <a href="<?= base_url ?>views/products/productos.html"><i class="fas fa-shopping-bag"></i>Productos</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/company/nosotros.html"><i class="fas fa-envelope"></i>#Express</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/company/contacto.html"><i class="fas fa-phone"></i>Contacto</a>
            </li>
            <li>
                <a href="<?= base_url ?>views/login/loginUs.php"><i class="fas fa-users"></i>Login</a>
            </li>

        </ul>



    </div>
