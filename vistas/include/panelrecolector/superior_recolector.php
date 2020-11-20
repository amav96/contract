<?php require_once '../../config/parametros.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Postal Marketing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" href="<?=base_url?>estilos/css/alertorden.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="<?=base_url?>estilos/css/custom.css">

  <script>src="<?=base_url?>script/recolector_recupero/jquery-3.4.1.min.js"</script>
  
  
  <link href="<?=base_url?>fonts/styles.css" rel="stylesheet">
 <link rel="stylesheet" href="<?=base_url?>estilos/css/formulario.css">
 
  <link rel="stylesheet" href="<?=base_url?>estilos/css/flexbox.css">
  <link rel="stylesheet" href="<?=base_url?>estilos/personal/css/panel_recolector/credencial.css">
  

	
	<!--<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
BOOTSTRAP PUEDE CHOCAR CON TU VERSION DE BOOTSTRAP Y LOS ICONOS Y BOTONES LOS CAMBIA DE POSICION-->
  <!--<link href="../assets/css/style.css" rel="stylesheet"> este estilo es de la pagina principal-->
  <!--puede interrumpir el section-->
<!--===============================================================================================-->
    <!--<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
ESTE BOOTSTRAP TAMBIEN MODIFICA TU BOOTSTRAP ANTERIOR-->
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url?>css/contenedormove.css">
	
	<link href="<?=base_url?>fonts/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url?>estilos/css/estilos.css">
  <link rel="stylesheet" href="<?=base_url?>estilos/css/logo.css">
	
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<!--<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>-->
				</div>

				<!--<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>-->

				<div class="topbar-child2">
					<!--<span class="topbar-email">
						fashe@example.com
					</span>-->

					<div class="topbar-language rs1-select2">
						<!--<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>-->
					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?=base_url?>index.html" class="logo">
					<img src="<?=base_url?>images/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
						<li>
						<a href="<?=base_url?>index.html" >Inicio</a>
								
							</li>

							
							<li>
							<a href="<?=base_url?>vistas/recolectores/datoscliente.php" >Recolector</a>
							</li>
							
							
							<li>
							<a href="<?=base_url?>conectar/cerrar_sesion.php" >Cerrar sesión</a>
								
							</li>
							<li>
							<a href="https://www.youtube.com/watch?v=E7kXUY9ENJk" target="_blank" >¿Como hacer remito?</a>
								
							</li>
							<li>
							<a href="credencial.php" >Credencial</a>
								
							</li>

						

							
						</ul>
					</nav>
				</div>

				
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header PARTE DE ARRIBA AL ALDO DEL MENU -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?=base_url?>images/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<!--<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>-->
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="<?=base_url?>index.html">Inicio</a>
						
          <!--	<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>-->
          <!-- flechita a la derecha de menu  !IMPORTANTE! -->
					</li>

					
					<li class="item-menu-mobile">
					<a href="<?=base_url?>vistas/recolectores/credencial.php">Credencial</a>
					</li>
					

					
					<li class="item-menu-mobile">
						<a href="<?=base_url?>conectar/cerrar_sesion.php">Cerrar Sesión</a>
					</li>
					<li class="item-menu-mobile">
						<a href="https://www.youtube.com/watch?v=E7kXUY9ENJk" target="_blank" >¿Como hacer remito?</a>
					</li>

					
				</ul>
			</nav>
		</div>
  </header>