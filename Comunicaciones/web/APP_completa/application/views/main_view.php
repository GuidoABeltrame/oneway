<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="es-mx">

<?=$head?>

<body>

<nav class="navbar fixed-top navbar-expand-lg">
	<a class="navbar-brand" href="<?=base_url()?>">
		<img src="<?=base_url('images/ays.png')?>" alt="AyS" id="logo">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
			<li class="nav-item"><a class="nav-link" href="#clientes">Nuestro Orgullo</a></li>
			<li class="nav-item"><a class="nav-link" href="#footer">Contacto</a></li>
		</ul>
	</div>
</nav>

<div id="home" class="container-fluid">
	<div class="row">
		<div id="carouselExampleFade" class="carousel slide carousel-fade w-100" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100 img-fluid" src="<?=base_url('images/tecnologia-al-servicio.jpg')?>" alt="Tecnología al servicio">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100 img-fluid" src="<?=base_url('images/proteccion-integral.jpg')?>" alt="Protección Integral">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100 img-fluid" src="<?=base_url('images/estamos-para-cuidarte.jpg')?>" alt="Estamos para cuidarte">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="bg-choose col-sm-7">
			<div class="row">
				<div class="col-sm-7 pt-5">
					<h1 class="w-75 mx-auto pt-5 align-middle title">
						<span class="light">¿Por qué</span> <br> <span class="medium">elegirnos?</span>
					</h1>
				</div>
				<div class="col-sm-5 pt-5">
					<div class="space-80"></div>
					<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/wifi.png')?>" alt="Wifi">
					<p class="p-3 condensed">En una actividad sensible para la comunidad agregamos valor constantemente, aumentando la seguridad con una sinergia que combina capacidad humana con tecnología.</p>	
				</div>
			</div>
		</div>
		<div class="slide-choose col-sm-5">
			<div id="carouselChoose" class="carousel slide carousel-fade w-100" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100 img-fluid" src="<?=base_url('images/slides/slide_01.jpg')?>" alt="Protección Integral">
						<div class="carousel-caption d-md-block col-sm-6">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Experiencia y confianza</h3>
							<h4 class="condensed white">Desde 1989 creciendo gracias a sus clientes</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/slides/slide_02.jpg')?>" alt="Estamos para cuidarte">
						<div class="carousel-caption d-md-block col-sm-6">
							<div class="space-80"></div>
							<h3 class="medium text-uppercase yellow">ÚNICOS en <br> el mercado</h3>
							<h4 class="condensed white">Por la estética, la relación y el nivel de seguridad brindado</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/slides/slide_03.jpg')?>" alt="Protegemos tu descanso">
						<div class="carousel-caption d-md-block col-sm-6">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Cercania</h3>
							<h4 class="condensed white">Una FAMILIA de profesionales cuidando a tu familia y tu negocio</h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?=base_url('images/slides/slide_04.jpg')?>" alt="Protegemos tu descanso">
						<div class="carousel-caption d-md-block col-sm-6">
							<div class="space-80"></div>
							<h3 class="medium yellow text-uppercase">Personal propio homologado</h3>
							<h4 class="condensed white">Porque nos abres tus puertas y mereces la mayor de la confianza.</h4>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev carusel-down" href="#carouselChoose" role="button" data-slide="prev">
					<span aria-hidden="true">
						<img src="<?=base_url('images/arrow-left.png')?>">
					</span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next carusel-down" href="#carouselChoose" role="button" data-slide="next">
					<span aria-hidden="true">
						<img src="<?=base_url('images/arrow-right.png')?>">
					</span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>

<!--<div class="container py-5">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="text-center light py-3">Cubrimos cualquier <span class="medium"><b>Necesidad</b></span></h1>
		</div>
		<div class="col-sm-4">
			<div class="p-5">
				<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/casa.png')?>" alt="Wifi">
				<h5 class="text-center red mt-4">Tu familia, tu casa</h5>
				<p>Protegé lo que más querés con nuestro Sistema de Monitoreo de Alarmas especial para seguridad de tu residencia.</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="p-5">
				<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/negocio.png')?>" alt="Wifi">
				<h5 class="text-center red mt-4">Tu patrimonio, tu comercio</h5>
				<p>Tu negocio necesita un sistema de plena confianza que te permita desarrollarte a diario con tranquilidad.</p>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="p-5">
				<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/empresa.png')?>" alt="Wifi">
				<h5 class="text-center red mt-4">Tu trabajo, tu empresa</h5>
				<p>La seguridad es un pilar que protege tu inversión, controlando las vulnerabilidades propias del entorno u organización.</p>
			</div>
		</div>
	</div>
</div>-->

<div class="container-fluid">
	<div class="row">
		<div class="bg-funciona col-sm-5 pt-4">
			<h1 class="px-3 py-5 light white f-6 w-75 mx-auto">¿Cómo lo <span class="condensed">logramos</span>?</h1>
		</div>
		<div class="bg-function col-sm-7 pt-5 pb-5">
			<div class="row">
				<div class="col-sm-4">
					<div class="mt-4 bg-white">
						<img src="<?=base_url('images/disuadimos.jpg')?>" class="w-100 img-fluid" alt="Disuadimos">
						<h3 class="yellow p-3 medium"><b>Disuadimos</b></h3>
						<p class="px-3 pb-4 condensed space-120">La presencia de un sistema AyS en la propiedad influye severamente en la prevención contra la delincuencia.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="mt-4 bg-white">
						<img src="<?=base_url('images/detectamos.jpg')?>" class="w-100 img-fluid" alt="Detectamos">
						<h3 class="yellow p-3 medium"><b>Detectamos</b></h3>
						<p class="px-3 pb-4 condensed space-120">Los sistemas de detección ubicados estratégicamente buscan contener los posibles ingresos no deseados.</p>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="mt-4 bg-white">
						<img src="<?=base_url('images/respondemos.jpg')?>" class="w-100 img-fluid" alt="Respondemos">
						<h3 class="yellow p-3 medium"><b>Respondemos</b></h3>
						<p class="px-3 pb-4 condensed space-120">Ante la recepción de una señal de alarma, se activa un procedimiento de comunicación inmediata a medida del evento recibido.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="servicios" class="container-fluid py-5">
	<div class="row">
		<div class="col-sm-12">
			<h1 class="text-center dark condensed py-3">Nuestros <span class="medium"><b>Servicios</b></span></h1>
		</div>
		<div class="col-sm-2 offset-sm-1">
			<div class="py-5">
				<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/alarmas.png')?>" alt="Wifi">
				<p class="text-center condensed pt-3 size-18 dark">Alarmas</p>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="py-5">
				<a href="<?=base_url('camaras')?>" class="dark">
					<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/cctv.png')?>" alt="Wifi">
					<p class="text-center condensed pt-3 size-18 dark">Camaras</p>
				</a>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="py-5">
				<a href="<?=base_url('cercos')?>" class="dark">
					<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/cercos.png')?>" alt="Wifi">
					<p class="text-center condensed pt-3 size-18 dark">Cercos Eléctricos</p>
				</a>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="py-5">
				<a href="<?=base_url('edificios')?>" class="dark">
					<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/acceso.png')?>" alt="Wifi">
					<p class="text-center condensed pt-3 size-18 dark">Protección a edificios</p>
				</a>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="py-5">
				<img class="img-fluid d-block mx-auto" src="<?=base_url('images/icons/soporte.png')?>" alt="Wifi">
				<p class="text-center condensed pt-3 size-18 dark">Soporte</p>
			</div>
		</div>
	</div>
</div>

<div id="clientes" class="container-fluid py-5">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 class="py-5 light">Nuestro <span class="medium">orgullo</span></h1>
		</div>
		<div class="center col-sm-12 pb-5">
			<div>
				<img src="<?=base_url('images/clientes/ambasciata-d-italia.jpg');?>" alt="Ambasciata D'italia" class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/centro-cultural-italiano.jpg');?>" alt='Centro cultural italiano' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/familia-de-juan.jpg');?>" alt='Familia de Juan' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/ch.jpg');?>" alt='CH' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/club-nautico.jpg');?>" alt='Club Nautico' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/colonial.jpg');?>" alt='Colonia' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/dieteticas-tomy.jpg');?>" alt='Diéteticas Tomy' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/direct-tv.jpg');?>" alt='Direct TV' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/essen.jpg');?>" alt='Essen' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/f.jpg');?>" alt='F' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/familia-de-mariana.jpg');?>" alt='Famili de Mariana' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/fuerza-aerea-argentina.jpg');?>" alt='Fuerza Aérea Argentina' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/grido.jpg');?>" alt='Grido' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/jockey-club.jpg');?>" alt='Jockey Club' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/procer.jpg');?>" alt='Procer' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/remax.jpg');?>" alt='Remax' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/familia-de-pedro.jpg');?>" alt='Familia de Pedro' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/santa-claus.jpg');?>" alt='Santa Claus' class="img-responsive">
			</div>
			<div>
				<img src="<?=base_url('images/clientes/sauma-motos.jpg');?>" alt='Sauma Motos' class="img-responsive">
			</div>
		</div>
	</div>
</div>

<?=$footer?>

<!-- JQUERY -->
<script type="text/javascript" src="<?=base_url('js/jquery-3.3.1.min.js')?>"></script>
<!-- BOOTSTRAP -->
<script type="text/javascript" src="<?=base_url('js/bootstrap.min.js')?>"></script>
<!-- SLICK SLIDE -->
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- SMOOTH SCROLL -->
<script type="text/javascript" src="<?=base_url('js/smooth-scroll.polyfills.min.js')?>"></script>
<!-- SCRIPT -->
<script type="text/javascript" src="<?=base_url('js/js.js')?>"></script>
</body>
</html>