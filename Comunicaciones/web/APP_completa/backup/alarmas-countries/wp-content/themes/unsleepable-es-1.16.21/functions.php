<?php

/*agregando soporte para widgets*/
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

/* blast you red baron! */
require_once (ABSPATH . WPINC . '/class-snoopy.php');

$current = 'r167';
function k2info($show='') {
global $current;
	switch($show) {
	case 'version' :
    	$info = 'Beta Two '. $current;
    	break;
    case 'scheme' :
    	$info = bloginfo('template_url') . '/styles/' . get_option('k2scheme');
    	break;
    }
    echo $info;
}

function k2update() {
	if ( !empty($_POST) ) {
		if ( isset($_POST['k2scheme_file']) ) {
			$k2scheme_file = $_POST['k2scheme_file'];
			update_option('k2scheme', $k2scheme_file, '','');
		}
		if ( isset($_POST['livesearch']) ) {
			$search = $_POST['livesearch'];
			update_option('k2livesearch', $search, '','');
		}
		if ( isset($_POST['livecommenting']) ) {
			$commenting = $_POST['livecommenting'];
			update_option('k2livecommenting', $commenting, '','');
		}
		if ( isset($_POST['widthtype']) ) {
			$widthtype = $_POST['widthtype'];
			update_option('k2widthtype', $widthtype, '','');
		}
		if ( isset($_POST['asides_text']) ) {
			$asides_text = $_POST['asides_text'];
			update_option('k2asidescategory', $asides_text, '','');
		}
		if ( isset($_POST['asidesposition']) ) {
			$asidesposition = $_POST['asidesposition'];
			update_option('k2asidesposition', $asidesposition, '','');
		}
		if ( isset($_POST['asidesnumber']) ) {
			$asidesnumber = $_POST['asidesnumber'];
			update_option('k2asidesnumber', $asidesnumber, '','');
		}
		if ( isset($_POST['about_text']) ) {
			$about = $_POST['about_text'];
			update_option('k2aboutblurp', $about, '','');
		}
		if ( isset($_POST['deliciousname']) ) {
			$name = $_POST['deliciousname'];
			update_option('k2deliciousname', $name, '','');
		}
		if ( isset($_POST['archives']) ) {
			$add = $_POST['archives'];
			update_option('k2archives', $add, '','');
			create_archive();
		} else {
		// thanks to Michael Hampton, http://www.ioerror.us/ for the assist
			$remove = '';
			update_option('k2archives', $remove, '','');
			delete_archive();
		}

		if ( isset($_POST['configela']) ) {
			if (!setup_archive()) unset($_POST['configela']);
		}
	}
}

function create_archive() {
global $wpdb, $user_ID;
get_currentuserinfo();
	$check = $wpdb->query("SELECT * from $wpdb->posts WHERE post_title = 'Archives'");
		if(!$check) {
	$message = "No editar esta p&aacute;gina";
	$title_message = 'Archivos';
	$content = apply_filters('content_save_pre', $message);
	$post_title = apply_filters('title_save_pre', $title_message);
	$now = current_time('mysql');
	$now_gmt = current_time('mysql', 1);
	$post_author = $user_ID;
	$id_result = $wpdb->get_row("SHOW TABLE STATUS LIKE '$wpdb->posts'");
	$post_ID = $id_result->Auto_increment;
	$post_name = sanitize_title($post_title, $post_ID);
	$ping_status = get_option('default_ping_status');
	$comment_status = get_option('default_comment_status');
	
	$postquery ="INSERT INTO $wpdb->posts
			(ID, post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt,  post_status, comment_status, ping_status, post_password, post_name, to_ping, post_modified, post_modified_gmt, post_parent, menu_order)
			VALUES
			('$post_ID', '$post_author', '$now', '$now_gmt', '$content', '$post_title', '', 'static', '$comment_status', '$ping_status', '', '$post_name', '', '$now', '$now_gmt', '', '')";
	$result = $wpdb->query($postquery);
	$metaquery = "INSERT INTO $wpdb->postmeta(meta_id, post_id, meta_key, meta_value) VALUES('', '$post_ID', '_wp_page_template', 'page-archives.php')";
	$result2 = $wpdb->query($metaquery);
	}
}

function delete_archive() {
global $wpdb;
	$check = $wpdb->query("SELECT * from $wpdb->posts WHERE post_title = 'Archives'");
		if($check) {
	$burninate = $wpdb->query("DELETE from $wpdb->posts WHERE post_title = 'Archives' and post_status = 'static'");
	$result = $wpdb->query($burninate);
	}
}

function setup_archive() {
	global $wpdb;

	if (file_exists(ABSPATH . 'wp-content/plugins/UltimateTagWarrior/ultimate-tag-warrior-core.php') && in_array('UltimateTagWarrior/ultimate-tag-warrior.php', get_option('active_plugins'))) {
		$menu_order="chrono,tags,cats";
	} else {
		$menu_order="chrono,cats";
	}

	$initSettings = array(

	// we always set the character set from the blog settings
		'newest_first' => 0,
		'num_entries' => 1,
		'num_entries_tagged' => 0,
		'num_comments' => 1,
		'fade' => 1,
		'hide_pingbacks_and_trackbacks' => 1,
		'use_default_style' => 1,
		'paged_posts' => 1,
		'selected_text' => '',
		'selected_class' => 'selected',
		'comment_text' => '<span>%</span>',
		'number_text' => '<span>%</span>',
		'number_text_tagged' => '(%)',
		'closed_comment_text' => '<span>%</span>',
		'day_format' => 'jS',
		'error_class' => 'alert',
	// allow truncating of titles
		'truncate_title_length' => 0,
		'truncate_cat_length' => 25,
		'truncate_title_text' => '&#8230;',
		'truncate_title_at_space' => 1,
		'abbreviated_month' => 1,
		'tag_soup_cut' => 0,
		'tag_soup_X' => 0,
	// paged posts related stuff
		'paged_post_num' => 15,
		'paged_post_next' => '&laquo; 15 art&iacute;culos anteriores',
		'paged_post_prev' => '15 art&iacute;culos siguientes &raquo;',
	// default text for the tab buttons
		'menu_order' => $menu_order,
		'menu_month' => 'Cronolog&iacute;a',
		'menu_cat' => 'Taxonom&iacute;a',
		'menu_tag' => 'Folksonom&iacute;a',
		'before_child' => '&nbsp;&nbsp;&nbsp;',
		'after_child' => '',
		'loading_content' => '<img src="'.get_bloginfo('template_url').'/images/spinner.gif" class="elaload" alt="Spinner" />',
		'idle_content' => '',
		'excluded_categories' => '0');

	if (function_exists('af_ela_set_config')) {
		$ret = af_ela_set_config($initSettings);
	}

	return $ret;
}

// if we can't find k2 installed lets go ahead and install all the options that run K2.  This should run only one more time for all our existing users, then they will just be getting the upgrade function if it exists.

if (!get_option('k2installed')) {
add_option('k2installed', $current, 'Esta opci&oacute;n simplemente indica si K2 ha sido instalado antes', $autoload);
add_option('k2aboutblurp', 'Este es el texto Acerca de', 'Te permite escribir una peque&ntilde;a rese&ntilde;a sobre t&iacute; y tu bit&aacute;cora, la que ser&aacute; puesta en la p&aacute;gina principal', $autoload);
add_option('k2asidescategory', '0', 'Una categor&iacute;a que ser&aacute; tratada de modo distinto que las dem&aacute;s categor&iacute;as', $autoload);
add_option('k2asidesposition', '0', 'Escoge si quieres usar Asides en l&iacute;nea o en la barra lateral', $autoload);
add_option('k2livesearch', 'live', "Si no conf&iacute;as en JavaScript y Ajax, puedes apagar LiveSearch. De otra manera, te sugiero que la dejes activada", $autoload); // (live & classic)
add_option('k2asidesnumber', '3', 'El n&uacute;mero de Asides que mostrar&aacute;s en la barra lateral. Lo predeterminado es 3.', $autoload);
add_option('k2widthtype', 'flexible', "Determina si quiers ocupar ancho flexible o fijo.", $autoload); // (flexible & fixed)
add_option('k2deliciousname', '', 'Utiliza el plugin de Alexander Malovs para Delicious para mostrar los enlaces en la barra lateral.', $autoload);
add_option('k2archives', '', 'Elige si K2 tendr&aacute; una p&aacute;gina de Live Archive', $autoload);
add_option('k2scheme', '', 'Elige el esquema de K2 que quieres utilizar', $autoload);
add_option('k2livecomments', '0', "Si no conf&iacute;as en JavaScript y Ajax, puedes desactivar los comentarios en vivo. De otra manera, te sugiero que lo dejes activado", $autoload);
}

// Here we handle upgrading our users with new options and such.  If k2installed is in the DB but the version they are running is lower than our current version, trigger this event.

	elseif (get_option('k2installed') < $current) {
	/* Do something! */
	//add_option('k2upgrade-test', 'this is the text', 'Just testing', $autoload);
}

// Let's add the options page.
add_action ('admin_menu', 'k2menu');

$k2loc = '../themes/' . basename(dirname($file)); 

function k2menu() {
	add_submenu_page('themes.php', 'K2 Options', 'K2 Options', 5, $k2loc . 'functions.php', 'menu');
}

function menu() {
	load_plugin_textdomain('k2options');
	//this begins the admin page
?>


<?php if (isset($_POST['configela'])) : ?>
	<div class="updated">
		<p><?php _e('Las opciones de ELA para K2 han sido guardadas'); ?></p>
	</div>
<?php endif; ?>


<?php if (isset($_POST['Enviar'])) : ?>
	<div class="updated">
		<p><?php _e('Las opciones de K2 han sido actualizadas'); ?></p>
	</div>
<?php endif; ?>


<div class="wrap">


<h2><?php _e('Opciones de K2'); ?></h2>
<form name="dofollow" action="" method="post">
  <input type="hidden" name="action" value="<?php k2update(); ?>" />
  <input type="hidden" name="page_options" value="'dofollow_timeout'" />
  <table width="700px" cellspacing="2" cellpadding="5" class="editform">
  <tr valign="top">
		<th scope="row"><?php echo __('Esquema para K2'); ?></th>
		<td>
			<label for="k2scheme_file">

			<?php
			global $wpdb;
			$name = get_option('k2scheme');
			if ($name != '') {
				$scheme_title = $name;
			} else {
				$scheme_title ='Ninguno';
			}
			?>

			<select name="k2scheme_file" id="k2scheme_file" style="width: 300px;">
			<option value="<?php echo get_option('k2scheme'); ?>"><?php echo$scheme_title; ?></option>
			<option value="-----">----</option>
			<option value="">Ning&uacute;n esquema</option>

			<?php
			$scheme_dir = @ dir(ABSPATH . '/wp-content/themes/' . get_template() . '/styles');

			if ($scheme_dir) {
				while(($file = $scheme_dir->read()) !== false) {
			  		if (!preg_match('|^\.+$|', $file) && preg_match('|\.css$|', $file)) 
						$scheme_files[] = $file;
					}
				}
				if ($scheme_dir || $scheme_files) {
					foreach($scheme_files as $scheme_file) {
				 	echo '<option value="' . $scheme_file . '">' . $scheme_file . '</option>';
				}
				echo '</select>';
			} 
			?>
			
			<p><small>Elige el esquema que te gustar&iacute;a utilizar en este sitio.</small></p>
		</td>
		</tr>
 		<tr valign="top">
		<th scope="row" width="20%"><?php echo __('Live Search'); ?></th>
		<td>
			<input name="livesearch" id="classic-search" type="radio" value="0" <?php checked('0', get_option('k2livesearch')); ?> /> 
			<label for="classic"><?php _e('Habilitar Livesearch (predeterminado)') ?></label><br />
			<input name="livesearch" id="live-search" type="radio" value="1" <?php checked('1', get_option('k2livesearch')); ?> /> 
			<label for="live"><?php _e('Deshabilitar Livesearch') ?></label>
			<p><small>Livesearch es una soluci&oacute;n javascript para buscar-mientras-escribes. <a href="http://blog.bitflux.ch/wiki/LiveSearch">&iquest;Te gustar&iacute;a saber m&aacute;s?</a>.</small></p>
		</td>
		</tr>
<tr valign="top">
		<th scope="row" width="20%"><?php echo __('Comentarios con AJAX'); ?></th>
		<td>
			<input name="livecommenting" id="classic-commenting" type="radio" value="0" <?php checked('0', get_option('k2livecommenting')); ?> /> 
			<label for="classic-commenting"><?php _e('Activar comentarios con AJAX (predeterminado)') ?></label><br />
			<input name="livecommenting" id="live-commenting" type="radio" value="1" <?php checked('1', get_option('k2livecommenting')); ?> /> 
			<label for="live-commenting"><?php _e('Desactivar comentarios con AJAX') ?></label>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php echo __('Tipo de ancho'); ?></th>
		<td>
			<input name="widthtype" id="fixed" type="radio" value="1" <?php checked('1', get_option('k2widthtype')); ?> /> 
			<label for="fixed"><?php _e('Ancho fijo (predeterminado)') ?></label><br />
			<input name="widthtype" id="flexible" type="radio" value="0" <?php checked('0', get_option('k2widthtype')); ?> /> 
			<label for="flexible"><?php _e('Ancho flexible') ?></label>
			<p>
			<small>El Ancho Flexible hace que las p&aacute;ginas de K2 se ajusten de acuerdo al ancho del navegador, dentro de un ancho m&aacute;ximo y m&iacute;nimo, para no estropear totalmente la legibilidad en resoluciones muy altas. El Ancho Fijo establece el ancho de las p&aacute;ginas de K2 a 780px.<br /><em><strong> Nota de la Beta:</strong> Hasta donde yo sepa, no funciona en Internet Explorer. Se reciben sugerencias.</em></small>
			</p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php echo __('Asides'); ?></th>
		<td>
			<input name="asidesposition" id="primary-asides" type="radio" value="0" <?php checked('0', get_option('k2asidesposition')); ?> /> 
			<label for="primary-asides"><?php _e('Asides en l&iacute;nea') ?></label><br />
			<input name="asidesposition" id="secondary-asides" type="radio" value="1" <?php checked('1', get_option('k2asidesposition')); ?> /> 
			<label for="secondary-asides"><?php _e('Asides en la barra lateral') ?></label>
			<p><small>Determina si los Asides se muestran 'en l&iacute;nea' o en la barra lateral (si es que est&aacute;n activos).</small></p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php echo __('Categor&iacute;a de los Asides'); ?></th>
		<td>
			<label for="asides_text">
			<?php
			global $wpdb;
			$id = get_option('k2asidescategory');
			if ($id != 0) {
			$asides_title = $wpdb->get_var("SELECT cat_name from $wpdb->categories WHERE cat_ID = $id");
			} else {
				$asides_title='Sin Asides';
				}
			$asides_cats = $wpdb->get_results("SELECT * from $wpdb->categories");
			?>
			<select name="asides_text" id="asides_text" style="width: 300px;">
			<option value="<?php echo get_option('k2asidescategory'); ?>"><?php echo $asides_title; ?></option>
			<option value="-----">----</option>
			<option value="0">Sin Asides</option>
			<?php
			foreach ($asides_cats as $cat) {
			echo '<option value="' . $cat->cat_ID . '">' . $cat->cat_name . '</option>';
            }
            ?>
			</select>
			<p><small>Selecciona una categor&iacute;a y ser&aacute; mostrada usando <a href="http://photomatt.net/2004/05/19/asides/">la t&eacute;cnica de Asides de Matt</a></small></p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php echo __('Asides Number'); ?></th>
		<td>
			<input name="asidesnumber" id="asidesnumber" type="text" value="<?php echo get_option('k2asidesnumber'); ?>" size="2" /> 
			<p><small>Selecciona el n&uacute;mero de Asides a mostrar en la barra lateral. El valor predeterminado es 3.</small></p>
		</td>
		</tr>
		<tr valign="top">
		<th scope="row"><?php echo __('About Text'); ?></th>
		<td>
			<label for="about_text">
			<textarea name="about_text" style="width: 98%;" rows="5" id="about_text"><?php echo stripslashes(get_option('k2aboutblurp')); ?></textarea>
			<p><small>Ingresa una rese&ntilde;a sobre t&iacute; en este espacio, y ser&aacute; mostrada en la p&aacute;gina principal. Borrar este texto desactiva el espacio de la rese&ntilde;a.</small></p>
		</td>
		</tr>
		<?php if (function_exists('delicious')) { ?> 
		<tr valign="top">
		<th scope="row"><?php echo __('Nombre de usuario de del.icio.us'); ?></th>
		<td>
			<label for="deliciousname"><?php echo __('Nombre de usuario de del.icio.us'); ?></label>
			<input name="deliciousname" style="width: 300px;" id="deliciousname" value="<?php echo get_option('k2deliciousname'); ?>">
			<p><small>Ingresa tu nombre de usuario de del.icio.us para usar el <a href="http://www.w-a-s-a-b-i.com/archives/2004/10/15/delisious-cached/">plugin para del.icio.us de Alexander Malov </a></small></p>
		</td>
		</tr>
		<?php } ?>
		<tr valign="top">
		<th scope="row"><?php echo __('P&aacute;gina de Archivos'); ?></th>
		<td>
			<input name="archives" id="add-archive" type="checkbox" value="add_archive" <?php checked('add_archive', get_option('k2archives')); ?> />
			<label for="add-archives"><?php _e('Habilitar la p&aacute;gina de archivos de K2') ?></label>
			<p><small>Habilitar esta opci&oacute;n crear&aacute; una p&aacute;gina de Archivos, la que ser&aacute; mostrada en la p&aacute;gina principal de tu blog.</small></p>
		</td>
		</tr>

		<?php if (function_exists('af_ela_set_config')) { ?>
		<tr valign="top">
			<th scope="row"><?php echo __('Habilitar Extended Live Archives'); ?></th>
			
			<td>
				<input name="configela" id="configela" type="submit" value="<?php _e('Configurar la p&aacute;gina de ELA para K2') ?>" />
				<p><small>Fijar las opciones para <a href="http://www.sonsofskadi.net/index.php/extended-live-archive/" title="Find out more about ELA">Extended Live Archives</a> de Arnaud para K2.</small></p>
			</td>
		</tr>	
		<?php } ?>

		</table>

	
	<p class="submit"><input type="submit" name="Submit" value="<?php _e('Actualizar Opciones') ?> &raquo;" /></p>

</form>
</div>

<div class="wrap">
	<p style="text-align: center;">&iquest;Necesitas ayuda? Busca en los <a href="http://www.flickr.com/groups/binarybonsai/discuss/" title="K2 support forums">Foros de soporte de K2</a> o en la <a href="http://binarybonsai.com/wordpress/k2/features-and-plugins/" title="Documentation">Documentaci&oacute;n de K2</a>.</p>
</div>

<?php } // this ends the admin page ?>