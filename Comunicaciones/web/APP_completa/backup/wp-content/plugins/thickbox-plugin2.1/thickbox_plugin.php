<?php
/*
Plugin Name: ThickBox Plugin 2.1
Plugin URI: http://www.anieto2k.com
Description: Muestra mediante ajax una URL desde tu web.
Version: 1.0
Author: Andres Nieto
Author URI: http://www.anieto2k.com
*/

//Funcion que carga los fichero necesarios
function ThickBox_init() {
?>
<style type="text/css" media="all">
@import "<?=get_settings('siteurl')?>/wp-content/plugins/thickbox/thickbox.css";
</style>
<script src="<?=get_settings('siteurl')?>/wp-content/plugins/thickbox/jquery.js" type="text/javascript"></script>
<script src="<?=get_settings('siteurl')?>/wp-content/plugins/thickbox/thickbox.js" type="text/javascript"></script>
<script type="text/javascript">var imgURL = "<?=get_settings('siteurl')?>/wp-content/plugins/thickbox/loadingAnimation.gif";</script>
<?php
}

add_action('wp_head', 'ThickBox_init');
?>