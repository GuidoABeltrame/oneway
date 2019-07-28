<footer id="footer" class="container-fluid">
	<div class="row">
		<div class="col-sm-6 bg-yellow dark" id="message">
			<div class="py-3 px-5">
				<h2 class="light">Ayudanos a ayudarte
					<!--, <br><span class="condensed">protección a edificios</span>--></h2>
				<form method="post" action="<?=base_url('home/sendContact')?>" id="sendForm">
					<p class="light white">Deja tus datos</p>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="condensed">Nombre</label>
								<input type="text" id="name" name="name" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="condensed">Apellido</label>
								<input type="text" id="last" name="last" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="condensed">Teléfono</label>
								<input type="tel" id="tel" name="tel" class="form-control">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label class="condensed">E-mail</label>
								<input type="email" id="email" name="mail" class="form-control">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label class="condensed">Localidad</label>
								<input type="text" id="local" name="local" class="form-control">
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<label class="condensed white">De qué te enviamos información:</label><br>
								<ul class="input-list">
									<li><input type="checkbox" name="inputCheck[]" value="Alarmas"><span>Alarmas</span></li>
									<li><input type="checkbox" name="inputCheck[]" value="Cercos eléctricos"><span>Cercos eléctricos</span></li>
									<li><input type="checkbox" name="inputCheck[]" value="Soporte"><span>Soporte</span></li>
									<li><input type="checkbox" name="inputCheck[]" value="Protección a Edificios"><span>Protección a Edificios</span></li>
									<li><input type="checkbox" name="inputCheck[]" value="Camaras"><span>Camaras</span></li>
									<li><button id="buttonForm" class="btn btn-default white medium">Enviar</button></li>
								</ul>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-6 bg-gray">
			<div class="w-75 mx-auto pt-5">
				<h2 class="light white"><span class="condensed">Comunicate</span> con nosotros</h2>
				<p class="yellow condensed">En cualquier medio que vos prefieras, estamos ahí.</p>
				<div class="row">
					<div class="col-sm-6">
						<div class="box-f">
							<h4 class="white medium">Email</h4>
							<p class="condensed"><a href="mailto:soluciones@aysalarmas.com.ar" class="yellow">soluciones@aysalarmas.com.ar</a></p>
						</div>
						<div class="box-f">
							<h4 class="white medium">Oficinas</h4>
							<p class="condensed yellow">Av. Santa Fé 1191<br> Martínez<br> Buenos Aires, Arg.</p>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="box-f">
							<h4 class="white medium">Atención por Teléfono</h4>
							<p class="condensed yellow"><a href="tel:541147931111" class="yellow">(54 11) 4793-1111</a></p>
						</div>
						<div class="box-f">
							<h3 class="white light pt-2">¡Seguínos!</h3>
							<ul class="w-100 social mb-2">
								<li><a href="https://www.facebook.com/aysalarmas/" target="_blank" class="yellow d-block px-2"><i class="fab fa-facebook-square"></i></a></li>
								<li><a href="https://www.instagram.com/aysalarmas/" target="_blank" class="yellow d-block px-2"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/company/a&s-alarmas-y-soluciones/" target="_blank" class="yellow d-block px-2"><i class="fab fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
					<!---->
					<div class="col-sm-12">
						<img src="<?=base_url('images/gobierno_argentino.png')?>" alt="Gobierno Argentino" class="w-75 img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>