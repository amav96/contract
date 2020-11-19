<!DOCTYPE html>
<html lang="en">
<head>
	<title>Express</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 
 <script>src="../script/datoscliente/jquery-3.4.1.min.js"</script>
  <script>src="../estilos//bootstrap/js/bootstrap.min.js"</script>
  <link rel="stylesheet" href="../estilos//bootstrap/css/bootstrap.min.css">
  <link href="../fonts/styles.css" rel="stylesheet">
 <link rel="stylesheet" href="../estilos/css/flexbox.css">
  
  <link rel="stylesheet" href="../estilos/css/logo.css">  
<link rel="icon" type="image/png" href="../images/logo.png"/>

	
  <!--<link href="../assets/css/style.css" rel="stylesheet"> este estilo es de la pagina principal-->
  <!--puede interrumpir el section-->

	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/contenedormove.css">
	
	<link href="../fonts/styles.css" rel="stylesheet">

  <link rel="stylesheet" href="../estilos/css/logo.css">
	
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
				<a href="../index.html" class="logo">
					<img src="../images/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
						<li>
								<a href="../index.html">Inicio</a>
								
							</li>

							<li>
							<a href="../vistas/nosotros.php">Empresa</a>
							</li>
							<li>
								<a href="../vistas/cobertura.php">Cobertura</a>
							</li>

							<li>
								<a href="../admin/administracion.php">Administración</a>
								<ul class="sub_menu">
									<li><a href="../admin/xfiltrox.php">Filtro</a></li>
									<li><a href="../admin/reportes.php">Reportes</a></li>
									<li><a href="../vistas/adm/index.php">Equipos</a></li>
									
								</ul>
							</li>

							<li>
								<a href="../login/loginrecolector.php">Recolectores</a>
							</li>
							<li>
								<a href="../conectar/cerrar_sesion.php">Cerrar Sesiòn</a>
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
				<img src="../images/logo.png" alt="IMG-LOGO">
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
						<a href="../index.html">Inicio</a>
						
          <!--	<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>-->
          <!-- flechita a la derecha de menu  !IMPORTANTE! -->
					</li>

					<li class="item-menu-mobile">
						<a href="../vistas/nosotros.php">Empresa</a>
					</li>

					<li class="item-menu-mobile">
						<a href="../vistas/cobertura.php">Cobertura</a>
					</li>

					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="../admin/xfiltrox.php">Filtro</a></li>
							<li><a href="../admin/reportes.php">Reportes</a></li>
							
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>


					<li class="item-menu-mobile">
						<a href="../login/loginrecolector">Recolectores</a>
					</li>
					<li>
						<a href="../conectar/cerrar_sesion.php">Cerrar Sesion</a>
					</li>

					
				</ul>
			</nav>
		</div>
  </header>