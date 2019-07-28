<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="es-mx">

<?=$head?>

<body>

<div id="home" class="container-fluid">
	<div class="row">

		<div class="col-sm-7 bg bg-top-home pb-2">
			<div class="p-5">
				<a href="<?=base_url()?>"><img src="<?=base_url('images/landing/logotipo.png')?>" alt="AyS Alarmas"></a>
			</div>
			<div class="px-5">
				<h1 class="light yellow text-uppercase title">Seguridad total <br> <span class="medium">para edificios</span></h1>
				<ul class="flex white light text-uppercase">
					<li>Control de acceso</li>
					<li>Video vigilancia</li>
					<li>Video grabación</li>
					<li>Barreras</li>
					<li>Cerco eléctrico</li>
					<li>App móvil</li>
					<li>Control de puerta abierta</li>
					<li>Botón de pánico para uso personal</li>
					<li>Video verificación de eventos</li>
				</ul>
			</div>
		</div>

		<div class="col-sm-5 bg bg-top-home-1">
			<div class="p-5">
				<h2 class="light text-uppercase">Ayúdamos a ayudarte, <br> <span class="medium">completa tus datos</span></h2>
				<p class="condensed">En breve nos pondrémos en contacto</p>
				<form method="post" class="w-50" action="<?=base_url('landing/sendContact')?>" id="sendForm">
					<div class="form-group">
						<label class="medium">Nombre</label>
						<input type="text" name="nombre" class="form-control">
					</div>
					<div class="form-group">
						<label class="medium">Apellido</label>
						<input type="text" name="apellido" class="form-control">
					</div>
					<div class="form-group">
						<label class="medium">Teléfono</label>
						<input type="tel" name="telefono" class="form-control">
					</div>
					<div class="form-group">
						<label class="medium">E-mail</label>
						<input type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label class="medium">Localidad</label>
						<input type="text" name="local" class="form-control">
					</div>
					<div class="text-center">
						<button type="button" id="buttonForm" class="btn btn-default btn-block white text-uppercase medium">Quiero más info</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="bg col-sm-6" style="background-image: url('images/landing/que-incluye.jpg'">
			<div class="pt-5 text-center">
				<h1 class="title text-uppercase light gray pt-5 mt-5">¿Qúe <span class="medium">incluye</span>?</h1>
				<p class="condensed w-50 mx-auto pt-3 size-18">
					Tenemos una solución integral para la seguridad de tu inmueble, una opción 360 para tu tranquilidad.
				</p>
			</div>
		</div>
		<div class="slide-choose col-sm-6">
			<div id="carouselChoose" class="carousel slide carousel-fade w-100" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100 img-fluid" src="<?=base_url('images/landing/slides/control-de-puerta.jpg')?>" alt="Control de Puerta Abierta">
						<div class="carousel-caption d-md-block w-75 mx-auto">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Control de <br> puerta abierta</h3>
							<h4 class="condensed white">Aviso audible inmediato in situ, así como notificación al departamento por medio de APP o email.</h4>
						</div>
					</div>
					<!--<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/slides/barreras.jpg')?>" alt="Barreras">
						<div class="carousel-caption d-md-block w-75 mx-auto pt-5">
							<div class="space-80"></div>
							<h3 class="medium text-uppercase yellow">Barreras <br> elécticas</h3>
							<h4 class="condensed white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam fugiat nulla pariatur.</h4>
						</div>
					</div>-->
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/landing/slides/cerco-electrico.jpg')?>" alt="Cerco eléctrico">
						<div class="carousel-caption d-md-block w-75 mx-auto pt-5">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Cerco <br> eléctrico</h3>
							<h4 class="condensed white">Tanto el Cerco Eléctrico como las Cámaras de Vigilancia son soluciones altamente disuasivas que sirven para proteger el perímetro del edificio</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/landing/slides/video-vigilancia.jpg')?>" alt="Video vigilancia">
						<div class="carousel-caption d-md-block w-75 mx-auto pt-5">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Video <br> vigilancia</h3>
							<h4 class="condensed white">Videoverificación remota por medio de operadores y sistemas de detección físicos e inteligentes.</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/landing/slides/video-grabacion.jpg')?>" alt="Video grabación">
						<div class="carousel-caption d-md-block w-75 mx-auto pt-5">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Video <br> grabación</h3>
							<h4 class="condensed white">Sistema altamente disuasivo con acceso a grabaciones digitales con programación personalizada.</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/landing/slides/control-de-acceso.jpg')?>" alt="Control de acceso">
						<div class="carousel-caption d-md-block w-75 mx-auto pt-5">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Control de <br> acceso</h3>
							<h4 class="condensed white">El sistema registra y controla los accesos del edificio; entrada y salida controlada por medio de tarjetas de control inteligentes. Detecta ingresos no autorizado</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/landing/slides/app-movil.jpg')?>" alt="App movil">
						<div class="carousel-caption d-md-block w-75 mx-auto pt-5">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">App <br> movil</h3>
							<h4 class="condensed white">Aplicacion móvil para teléfonos inteligentes que comunica las alarmas y permite la acceso a las cámaras de vigilancia.</h4>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev carusel-down" href="#carouselChoose" role="button" data-slide="prev">
					<span aria-hidden="true">
						<img src="<?=base_url('images/landing/arrow_left.png')?>">
					</span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next carusel-down" href="#carouselChoose" role="button" data-slide="next">
					<span aria-hidden="true">
						<img src="<?=base_url('images/landing/arrow_right.png')?>">
					</span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="bg col-sm-4 pt-4" style="background-image: url('images/landing/como-funciona.jpg')">
			<h1 class="px-3 py-5 light white w-75 mx-auto title">¿Cómo funciona <span class="condensed">nuestro sistema</span>?</h1>
		</div>
		<div class="bg col-sm-8 pt-5 pb-5" style="background-image: url('images/landing/bg-funciona.jpg')">
			<div class="row">
				<div class="col-sm-4">
					<div class="mt-4 bg-white">
						<img src="<?=base_url('images/landing/disuadimos.jpg')?>" class="w-100 img-fluid" alt="Disuadimos">
						<h3 class="yellow p-3 medium"><b>Disuadimos</b></h3>
						<p class="px-3 pb-4 condensed space-120">La presencia de un sistema AyS  en la propiedad influye severamente en la prevención contra la delincuencia.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="mt-4 bg-white">
						<img src="<?=base_url('images/landing/detectamos.jpg')?>" class="w-100 img-fluid" alt="Detectamos">
						<h3 class="yellow p-3 medium"><b>Detectamos</b></h3>
						<p class="px-3 pb-4 condensed space-120">Los sistemas de detección ubicados estratégicamente buscan contener los posibles ingresos no deseados.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="mt-4 bg-white">
						<img src="<?=base_url('images/landing/respondemos.jpg')?>" class="w-100 img-fluid" alt="Respondemos">
						<h3 class="yellow p-3 medium"><b>Respondemos</b></h3>
						<p class="px-3 pb-4 condensed space-120">Ante la recepción de una señal de alarma, se activa un procedimiento de comunicación inmediata a medida del evento recibido.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?=$footer?>

<!-- JQUERY -->
<script type="text/javascript" src="<?=base_url('js/landing/jquery-3.3.1.min.js')?>"></script>
<!-- BOOTSTRAP -->
<script type="text/javascript" src="<?=base_url('js/landing/bootstrap.min.js')?>"></script>
<!-- SLICK SLIDE -->
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- SMOOTH SCROLL -->
<script type="text/javascript" src="<?=base_url('js/landing/smooth-scroll.polyfills.min.js')?>"></script>
<!-- SCRIPT -->
<script type="text/javascript" src="<?=base_url('js/landing/js.js')?>"></script>
</body>
</html>