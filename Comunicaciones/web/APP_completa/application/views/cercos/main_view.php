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

		<div class="col-sm-7 px-0">
			<div class="p-5 position-absolute logo">
				<a href="<?=base_url()?>"><img src="<?=base_url('images/logotipo.png')?>" alt="AyS Alarmas"></a>
			</div>
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?=base_url('images/cercos/slide_cercos_01.jpg')?>" alt="Cercos Electrificados">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/cercos/slide_cercos_02.jpg')?>" alt="Cercos Electrificados">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/cercos/slide_cercos_03.jpg')?>" alt="Cercos Electrificados">
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-5 bg-yellow">
			<div class="p-3">
				<div class="jumbotron">
					<h1 class="light text-uppercase">El cerco <span class="medium">más seguro</span> <br> del mercado</h1>
					<h2 class="medium white mt-3 display-4">COLOCA LOS METROS </h2>
					<h1 class="light white display-3"> COTIZA AHORA</h1>
					<!---->
					<form method="post" class="w-100">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="condensed">Metros <br> lineales a cubrir</h3>
							</div>
							<div class="col-sm-6 text-right">
								<h2 class="light white display-4 mts">0</h2>
							</div>
							<div class="col-sm-12">
								<div class="form-group mt-5">
									<input type="range" value="0" class="form-control-range w-100 range" min="0" max="500" id="formControlRange">
								</div>
								<div class="text-center">
									<a href="#cotizador" class="btn btn-default white text-uppercase medium">Ir al cotizador</a>
								</div>
							</div>
						</div>
					</form>
					<!---->
				</div>
			</div>
		</div>

	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div class="p-5 text-center">
				<img src="<?=base_url('images/cercos/24_horas.png')?>" alt="24 Horas">
				<h4 class="light">CERCO PROTEGIDO <br> <span class="medium">LAS 24 HORAS</span></h4>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="p-5 text-center">
				<img src="<?=base_url('images/cercos/financiado.png')?>" alt="Financiado">
				<h4 class="light">FINANCIADO CON  <br> <span class="medium">0% DE INTERES</span></h4>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="p-5 text-center">
				<img src="<?=base_url('images/cercos/servicio_tecnico.png')?>" alt="Servicio Técnico">
				<h4 class="light">SERVICIO TÉCNICO  <br> <span class="medium">INMEDIATO</span></h4>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div id="carouselExampleSlidesOnly" class="carousel slide w-100" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?=base_url('images/cercos/disuacion-y-prevencion.jpg')?>" alt="Disuacion y Prevención">
					<div class="carousel-caption d-none d-md-block w-50 pr-5">
						<div class="jumbotron">
							<h5 class="condensed display-4">DISUASION Y <br>PREVENCION</h5>
							<p class="lead condensed pr-3">Tu casa o comercio están protegidos por el mejor cerco eléctrico. Instalado por profesionales de gran experiencia y monitoreado las 24hs para tu tranquilidad.</p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?=base_url('images/cercos/seguridad_y_tranquilidad.jpg')?>" alt="Seguridad y tranquilidad">
					<div class="carousel-caption d-none d-md-block w-50 pr-5">
						<div class="jumbotron">
							<h5 class="condensed display-4">SEGURIDAD Y <br>TRANQUILIDAD</h5>
							<p class="lead condensed pr-3">Descansa tranquilo sabiendo que tu casa y tu patio están protegidos por un Cerco Eléctrico monitoreado 24hs. Tu familia puede aprovechar la temporada de vacaciones tranquila.</p>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?=base_url('images/cercos/terminaciones-cuidadas.jpg')?>" alt="terminaciones cuidadas">
					<div class="carousel-caption d-none d-md-block w-50 pr-5">
						<div class="jumbotron">
							<h5 class="condensed display-4">TERMINACIONES <br>CUIDADAS</h5>
							<p class="lead condensed pr-3">El trabajo de  instalación es de primera calidad y nivel profesional, una vez activado el cerco quedará totalmente satisfecho y con la seguridad de estar en casa protegido. </p>
						</div>
					</div>
				</div>
			</div>
			<!---->
			<a class="carousel-control-prev left" href="#carouselExampleControls" role="button" data-slide="prev">
				<img src="<?=base_url('images/landing/arrow_left.png')?>">
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<img src="<?=base_url('images/landing/arrow_right.png')?>">
			</a>
		</div>
	</div>
</div>

<div class="bg-black">
	<div class="container">
		<div class="text-center">
			<h1 class="white condensed py-4 m-0">
				<span><img src="<?=base_url('images/cercos/precio.png')?>" alt="Precio"></span>
				DESDE <span class="medium">$18.000</span> + IVA
			</h1>
		</div>
	</div>
</div>

<footer id="cotizador" class="container-fluid">
	<div class="row">
		<div class="col-sm-7 px-0">
			<img src="<?=base_url('images/cercos/footer_cercos.jpg')?>" class="w-100" alt="">
		</div>

		<div class="col-sm-5 bg-yellow" id="message">
			<div class="p-5">
				<h1 class="condensed text-uppercase text-center white">Coloca los metros</h1>
				<h2 class="medium black text-uppercase text-center">y cotiza ahorta mismo</h2>
				<form method="post" class="w-100" action="<?=base_url('cercos/sendContact')?>" id="sendForm">
					<div class="form-group mt-5">
						<ul class="flex condensed">
							<li>Metros lineales a cubrir</li>
							<li class="text-right mts">0</li>
						</ul>
						<input type="range" name="range" class="form-control-range w-100 range" min="100" value="0" max="500" id="formControlRange">
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
						<button type="button" id="buttonForm" class="btn btn-default white text-uppercase medium">Enviar cotización</button>
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
<!-- SCRIPT -->
<script type="text/javascript" src="<?=base_url('js/scripts.js')?>"></script>
</body>
</html>