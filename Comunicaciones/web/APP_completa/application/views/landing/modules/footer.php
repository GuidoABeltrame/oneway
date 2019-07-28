<footer id="footer" class="container-fluid">
	<div class="row">
		<div class="col-sm-5 bg bg-footer dark" id="message">
			<div class="white w-75 mx-auto py-5">
				<h1 class="title white light text-uppercase shadow">Ayudanos a ayudarte, <br><span class="medium">completa tus datos</span></h1>
				<p class="condensed size-18 shadow">Completa el formulario y la brevedad un asesor se comunicará con vos.</p>
			</div>
		</div>
		<div class="col-sm-7 bg bg-form-footer">
			<div class="row">
				<div class="col-sm-7"  id="message">
					<div class="px-5">
						<div class="space-80"></div>
						<form method="post" action="<?=base_url('landing/sendContact')?>" id="sendForm">
							<div class="form-group">
								<label class="condensed">Nombre</label>
								<input type="text" id="name" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label class="condensed">Apellido</label>
								<input type="text" id="last" name="last" class="form-control">
							</div>
							<div class="form-group">
								<label class="condensed">Teléfono</label>
								<input type="tel" id="tel" name="tel" class="form-control">
							</div>
							<div class="form-group">
								<label class="condensed">E-mail</label>
								<input type="email" id="email" name="mail" class="form-control">
							</div>
							<div class="form-group">
								<label class="medium">Localidad</label>
								<input type="text" name="local" class="form-control">
							</div>
							<div class="form-group">
								<button type="button" id="buttonForm" class="btn btn-default white medium text-uppercase">Quiero más info</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="space-120"></div>
					<h2 class="title white medium text-uppercase shadow">¡O si<br> preferis llamanos!</h2>
					<h3 class="gray condensed">(54 11) 4793-1111</h3>
				</div>
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