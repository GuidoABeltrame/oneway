<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="es-mx">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	<!-- Icons -->
	<link rel="shortcut icon" href="<?=base_url('images/icon-32.png')?>">
	<link rel="apple-touch-icon" href="<?=base_url('images/icon-60.png')?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url('images/icon-76.png')?>">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=base_url('images/icon-120.png')?>">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=base_url('images/icon-152.png')?>">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>">
	<!-- FONTAWESOME -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/fontawesome-all.css')?>">
	<!-- STYLE -->	
	<link rel="stylesheet" type="text/css" href="<?=base_url('css/css.css')?>">
</head>

<body>

<div class="container-fluid">
	<div class="row">

		<div class="p-5 position-absolute logo">
			<a href="<?=base_url()?>"><img src="<?=base_url('images/logotipo.png')?>" alt="AyS Alarmas" class="img-fluid"></a>
		</div>

		<div class="col-sm-12 px-0">
			
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?=base_url('images/camaras/slide_tranquilidad.jpg')?>" alt="Tranquilidad">
						<div class="carousel-caption d-md-block">
							<div class="row">
								<div class="col-sm-7">
									<div class="jumbotron pl-1 mt-5">
										<h1 class="display-3 yellow mt-5 pt-5 medium"><span class="light">Protegemos</span><br class="d-none"> lo que te<br> importa </h1>
									</div>
								</div>
								<div class="col-sm-5 d-none d-sm-block">
									<div class="jumbotron text-center text-uppercase py-0">
										<img src="<?=base_url('images/camaras/proteccion.png')?>" alt="Protección">
										<h2 class="display-4 condensed">Tranquilidad</h2>
										<h3 class="display-3 light">A toda hora</h3>
										<p class="lead condensed">Cotiza las camaras a tu medida</p>
									</div>
									<div class="text-center">
										<a href="#message" class="btn btn-default white text-uppercase medium">Ir al cotizador</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/camaras/slide_vigilancia.jpg')?>" alt="Vigilancia">
						<div class="carousel-caption d-md-block">
							<div class="row">
								<div class="col-sm-7">
									<div class="jumbotron pl-1 mt-5">
										<h1 class="display-3 yellow mt-5 pt-5 medium"><span class="light">Protegemos</span><br class="d-none"> lo que te<br> importa </h1>
									</div>
								</div>
								<div class="col-sm-5 d-none d-sm-block">
									<div class="jumbotron text-center text-uppercase py-0">
										<img src="<?=base_url('images/camaras/tranquilidad.png')?>" alt="Protección">
										<h2 class="display-4 condensed">Vigilancia</h2>
										<h3 class="display-3 light">A toda hora</h3>
										<p class="lead condensed">Cotiza las camaras a tu medida</p>
									</div>
									<div class="text-center">
										<a href="#message" class="btn btn-default white text-uppercase medium">Ir al cotizador</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div class="p-5 text-center">
				<img src="<?=base_url('images/camaras/dispositivo_movil.png')?>" alt="Dispositivo Móvil">
				<h4 class="light">ACCEDE DESDE CUALQUIER <br> <span class="medium">DISPOSITIVO MOVIL</span></h4>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="p-5 text-center">
				<img src="<?=base_url('images/camaras/financiado.png')?>" alt="Financiado">
				<h4 class="light">FINANCIADO CON  <br> <span class="medium">0% DE INTERES</span></h4>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="p-5 text-center">
				<img src="<?=base_url('images/camaras/servicio_tecnico.png')?>" alt="Servicio Técnico">
				<h4 class="light">SERVICIO TÉCNICO  <br> <span class="medium">INMEDIATO</span></h4>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div id="middle" class="carousel slide w-100" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?=base_url('images/camaras/camaras_exterior.jpg')?>" alt="Camaras exterior">
					<div class="carousel-caption d-none d-md-block w-50 pr-5">
						<div class="jumbotron">
							<h5 class="condensed display-4 black">CAMARAS PARA <br> EXTERIOR E INTERIOR</h5>
							<p class="lead condensed pr-5 black">Contamos con una amplia variedad de soluciones en cámaras y video vigilancia. Visualización de cámaras desde cualquier dispositivo móvil con opción de grabación.</p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?=base_url('images/camaras/video_verificacion.jpg')?>" alt="Video verificación">
					<div class="carousel-caption d-none d-md-block w-50 pr-5">
						<div class="jumbotron">
							<h5 class="condensed display-4 black">VIDEO VERIFICACION <br> DE EVENTOS</h5>
							<p class="lead condensed pr-5 black">Tu casa o comercio está protegido por nuestra central de alarmas que podrá acceder a las cámaras en caso de un evento de alarma.</p>
						</div>
					</div>
				</div>
			</div>
			<!---->
			<a class="carousel-control-prev left" href="#middle" role="button" data-slide="prev">
				<img src="<?=base_url('images/landing/arrow_left.png')?>">
			</a>
			<a class="carousel-control-next" href="#middle" role="button" data-slide="next">
				<img src="<?=base_url('images/landing/arrow_right.png')?>">
			</a>
		</div>
	</div>
</div>

<div class="container">
	<div class="text-center">
		<div class="jumbotron p-0">
			<h1 class="gray light pt-5 pb-4 m-0 display-3">
				<span><img src="<?=base_url('images/camaras/grabacion.jpg')?>" alt="Grabación"></span>
				Grabación de cámaras disponible 
			</h1>
		</div>
	</div>
</div>

<footer id="cotizador" class="container-fluid">
	<div class="row">
		<div class="col-sm-7 px-0">
			<img src="<?=base_url('images/camaras/slide_acceso.jpg')?>" class="w-100" alt="">
		</div>

		<div class="col-sm-5 bg-yellow" id="message">
			<div class="p-5">
				<form method="post" class="w-100" action="<?=base_url('camaras/sendContact')?>" id="sendForm">
					<div class="form-group mt-5">
						<ul class="condensed camara-list">
							<li><input type="radio" name="opt_camara" value="interiores">&nbsp;Camaras interiores</li>
							<li><input type="radio" name="opt_camara" value="exteriores">&nbsp;Camaras exteriores</li>
							<li><input type="radio" name="opt_camara" value="ambas">&nbsp;Ambas</li>
						</ul>
					</div>
					<div class="form-group">
						<label class="medium">Nombre</label>
						<input type="text" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label class="medium">Teléfono</label>
						<input type="tel" name="tel" class="form-control">
					</div>
					<div class="form-group">
						<label class="medium">E-mail</label>
						<input type="email" name="mail" class="form-control">
					</div>
					<div>
						<button type="submit" id="buttonForm" class="btn btn-default white text-uppercase medium">Enviar cotización</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</footer>

<footer class="bg-black container-fluid py-3">
	<div class="row">
		<div class="col-sm-4">
			<img src="<?=base_url('images/cercos/gobierno_argentino.png')?>" alt="Gobierno Argentino" class="img-fluid w-75">
		</div>
		<div class="col-sm-4">
			<div class="text-center pt-4">
				<img src="<?=base_url('images/cercos/alarmas_y_servicios.png')?>" alt="Alarmas y Servicios" class="img-fluid">
			</div>
		</div>
		<div class="col-sm-4">
			<div class="text-right">
				<ul class="social mt-4">
					<li class="white light">¡Síguenos!</li>
					<li><a href="https://www.facebook.com/aysalarmas/?ref=br_rs" target="_blank"><i class="fab fa-facebook"></i></a></li>
					<li><a href="https://www.instagram.com/aysalarmas/" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<li><a href="https://mx.linkedin.com/company/a&s-alarmas-y-soluciones" target="_blank"><i class="fab fa-linkedin"></i></a></li>
				</ul>
				<ul class="social mt-3">
					<li><a href="<?=base_url()?>" class="white light">Volver a página principal</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<!-- JQUERY -->
<script type="text/javascript" src="<?=base_url('js/jquery-3.3.1.min.js')?>"></script>
<!-- BOOTSTRAP -->
<script type="text/javascript" src="<?=base_url('js/bootstrap.min.js')?>"></script>
<!-- SLICK SLIDE -->
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- SMOOTH SCROLL -->
<script type="text/javascript" src="<?=base_url('js/smooth-scroll.polyfills.min.js')?>"></script>
<!-- SCRIPT -->
<script type="text/javascript" src="<?=base_url('js/scripts.js')?>"></script>
</body>
</html>