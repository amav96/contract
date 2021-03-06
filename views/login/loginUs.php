<?php
session_start();

 if (isset($_SESSION["tipo"])) {
     if ($_SESSION["tipo"]["tipo"] == "admin") {
         header("Location: ../../views/adm/panel.php");
     } else {
     }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Express | ¿Necesitas nuestro servicio de logistica inversa? ¡Traslada!</title>


    <script src="../../estilos/personal/js/jquery.min.js"></script>
    <script src="../../estilos/personal/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../estilos/personal/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../estilos/personal/css/lightslider.css">

    <link rel="stylesheet" href="../../estilos/personal/css/sidebarper.css">


    <link rel="stylesheet" href="../../estilos/personal/css/login/recursos_login.css">


</head>

<body>


     <div class="fondoimagen" id="fondoimagen">
        
       
        <img class="logo-main" id="logodos" src="../../estilos/imagenes/logo2.png" alt="">
    
        <img class="logo-main-dos" id="logouno" src="../../estilos/imagenes/logo.png" alt="">
    
    </div>



    <div class="contenedordemenu">
        <ul>
            <li>
                <a href="../../index.html">

                    <div class="fondocirculodelicono">
                        <i class="iconoadentrodelcirculo fas fa-home"></i>
                    </div>

                    <p class="textoicono">Inicio</p>

                </a>
            </li>
            <li>
                <a href="../../views/company/nosotros.html">

                    <div class="fondocirculodelicono">
                        <i class="iconoadentrodelcirculo fas fa-building"></i>
                    </div>

                    <p class="textoicono">#Express</p>

                </a>
            </li>
            <li>
                <a href="../../views/products/productos.html">

                    <div class="fondocirculodelicono">
                        <i class="iconoadentrodelcirculo fas fa-box-open"></i>
                    </div>

                    <p class="textoicono">Productos</p>

                </a>
            </li>
            <li>
                <a href="../../views/company/contacto.html">

                    <div class="fondocirculodelicono">
                        <i class="iconoadentrodelcirculo fas fa-phone"></i>
                    </div>

                    <p class="textoicono">Contacto</p>

                </a>
            </li>
            <li>
                <a href="../../views/adm/panel.php">

                    <div class="fondocirculodelicono adm">
                        <i class="iconoadentrodelcirculo fas fa-user"></i>
                    </div>

                    <p class="textoicono">Login</p>

                </a>
            </li>
        </ul>
    </div>
    </nav>



    <input type="checkbox" id="cuadraditocheck">
    <label for="cuadraditocheck">
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
                <a href="../../views/login/loginUs.php"><i class="fas fa-users"></i>Login</a>
            </li>

        </ul>



    </div>


    <div class="container-artisan">
        <div class="container-form">

            <div class="box-form">
                <div class="form-imagen">
                    <img src="../../estilos/imagenes/expresssinnombre.png" alt="">
                </div>
                <div class="form-titulo">
                    <span class="titulo-form">
                        Ingrese a Express
                    </span>
                </div>
                <div class="mini-box">
                    <div class="iconlabel">
                        <i class="fas fa-user"> </i>
                        <label for="">Usuario</label>

                    </div>
                    <input type="text" id="usuario" class="input" placeholder="Ingrese usuario">
                </div>

                <div class="mini-box">
                    <div class="iconlabel">
                        <i class="fas fa-key"> </i>
                        <label for="">Clave</label>

                    </div>
                    <input type="password" id="contrasena" class="input" placeholder="Ingrese contraseña">
                </div>
                  <p class="error" id="error">Usuario o Clave invalida!</p>
                <div class="mini-box">
                    <button class="loguear" id="loguear">Ingresar</button>
                </div>
            </div>
        </div>
    </div>

    


    <script src="../../estilos/personal/js/jquery.js"></script>
    <script src="../../assets/login/loginUs.js"></script>
    <script src="../../estilos/personal/js/logo.js"> </script>

    <!-- acordio -->




</body>

</html>