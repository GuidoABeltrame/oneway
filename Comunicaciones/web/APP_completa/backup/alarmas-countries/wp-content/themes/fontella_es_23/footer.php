<?php get_sidebar(); ?>

<!-- Inicio del footer -->

<div id="footermax"> <!--Esta capa es para el dise&ntilde;o elastico-->

<div id="footer">

	<div class="search">Buscar: 

		<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
			<input type="text" name="s" id="s" size="20" />

		</form></div>
			
	<div class="textfooter">

		<?php bloginfo('name'); ?> funciona con <a href="http://wordpress.org">WordPress</a><br/>
		Theme <a href="http://granimpetu.com/fontella">Fontella</a> por <a href="http://granimpetu.com">Horacio Bella</a> / 
		<a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo get_settings('home'); ?>">CSS</a> Valido / <a href="http://validator.w3.org/check?uri=referer">XHTML</a> Valido<br/>
		Patrocinado por <a href="http://www.bosmm.com">BOS Multimedios</a> y <a href="http://www.techtear.com">Techtear.com</a><br />
		Distribuido por <a href="http://wordpress-es.org" title="Versiones de Wordpress en espa&ntilde;ol">Wordpress en espa&ntilde;ol</a>
		<!--No borres mi nombre ni los patrocinadores por favor :( -->
	</div>

</div>

</div>

<?php do_action('wp_footer'); ?>

</body>

</html>