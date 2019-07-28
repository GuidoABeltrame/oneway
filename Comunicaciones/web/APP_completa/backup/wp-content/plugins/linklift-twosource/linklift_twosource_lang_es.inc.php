<?php

/** ******************************************************
 *  @version 1.5                                         *
 *  @author  Andreas Rayo Kniep (www.linklift.de)        *
 *  @date    2007-05-04,2007-06-10,2007-06-26            *
 *                                                       *
 *  spanish language file  (no special signs used)       *
 ** **************************************************** */


// LinkLift's own configuration page
// -------------------------------------
@define( 'LINKLIFT_CONFIG_TAB_TITLE'					, 'Configuraci&oacute;n LinkLift' );
@define( 'LINKLIFT_CONFIG_TITLE'						, 'Configuraci&oacute;n del plugin de LinkLift' );

@define( 'LINKLIFT_PLUGIN_DESCRIPTION_1'				, 'LinkLift es un mercado para los anuncios de texto. Por cada enlace de texto vendido en su blog ganar&aacute; mensualmente una cantidad fija de dinero - independientemente de impresiones y porcentajes de clics. %sReg&iacute;strese ahora%s.' );
@define( 'LINKLIFT_PLUGIN_DESCRIPTION_2'				, 'Funcionalidad del plugin de LinkLift:' );
@define( 'LINKLIFT_PLUGIN_DESCRIPTION_3'				, 'El plugin de LinkLift se conecta autom&aacute;ticamente al servidor de LinkLift, descarga los enlaces que ha vendido y los guarda en la tabla de opciones de la base de datos de Wordpress (&#039;wp_options&#039;).' );


@define( 'LINKLIFT_INSTALLATION_INSTRUCTIONS_1'			, 'Hay 2 maneras de insertar el plugin de LinkLift en su sitio web:' );
@define( 'LINKLIFT_INSTALLATION_INSTRUCTIONS_2'			, 'Dir&iacute;jase al men&uacute; %s, arrastre y suelte el widget %s en la barra lateral y haga clic en el bot&oacute;n &quot;Guardar cambios&quot;.  (Para versiones anteriores a Wordpress 2.1 se requiere el Widgets-plugin. Adem&aacute;s, su tema debe soportar widgets.)' );
@define( 'LINKLIFT_INSTALLATION_INSTRUCTIONS_3'			, 'Dir&iacute;jase al men&uacute; %s, haga clic con el bot&oacute;n derecho en &quot;Barra Lateral&quot; e introduzca el siguiente c&oacute;digo en la posici&oacute;n exacta en d&oacute;nde quiere que aparezcan sus enlaces de texto:' );
@define( 'LINKLIFT_INSTALLATION_INSTRUCTIONS_4'			, 'Tenga en cuenta que el archivo de la barra lateral tiene que tener permisos de escritura. Adem&aacute;s, aseg&uacute;rese de que no inserta nuestro c&oacute;digo en un bloque condicional.' );
@define( 'LINKLIFT_INSTALLATION_INSTRUCTIONS_5'			, 'En general, recomendamos una integraci&oacute;n completa con su contenido.' );

@define( 'LINKLIFT_CONFIG_TEXT_OPTIONAL_VALUES'			, 'Utilizando las siguientes opciones puede modificar la apariencia de los enlaces. LinkLift le recomienda utilizar el formato CSS del tema del blog para que los enlaces se ajusten a la apariencia de su web.' );
// -------------------------------------


@define( 'LINKLIFT_INTERNAL_NOTE_NO_CSS'				, 'Esta opci&oacute;n no es v&aacute;lida si eligi&oacute; usar el formato CSS de su tema.' );
@define( 'LINKLIFT_INTERNAL_NOTE_NO_HTML'				, 'Esta opci&oacute;n no es v&aacute;lida si eligi&oacute; no usar etiquetas HTML.' );
@define( 'LINKLIFT_INTERNAL_NOTE_NO_CSS_OR_HTML'		, 'Esta opci&oacute;n no es v&aacute;lida si eligi&oacute; usar el formato CSS de su tema o si eligi&oacute; no usar etiquetas HTML.' );




// actual configuration titles and description-texts
// -------------------------------------
@define( 'LINKLIFT_CONFIG_HEADLINE_GENERAL'				, 'Configuraci&oacute;n general' );
@define( 'LINKLIFT_CONFIG_HEADLINE_OPTIONAL'			, 'Configuraci&oacute;n opcional' );

@define( 'LINKLIFT_CONFIG_TITLE_WEBSITE_KEY'			, 'Clave del sitio (LinkLift-Website-Key)' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_WEBSITE_KEY'		, 'La clave del sitio (LinkLift-Website-Key) identifica su sitio web en el mercado de LinkLift. Si ha descargado el plugin de la web de LinkLift este valor ya ha sido configurado.' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_WEBSITE_KEY_2'	, '%sReg&iacute;strese en LinkLift%s si a&uacute;n no lo ha hecho.' );
@define( 'LINKLIFT_WEBSITE_KEY_EXPLANATION_LINK'		, '&iquest;Qu&eacute; es esto?' );

@define( 'LINKLIFT_CONFIG_TITLE_PLUGIN_HEADLINE'		, 'Cabecera del plugin' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_PLUGIN_HEADLINE'	, 'La cabecera del plugin es el t&iacute;tulo del bloque de enlaces de LinkLift, justo encima de los enlaces de texto.' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_PLUGIN_HEADLINE_2', 'Si marca los enlaces de texto como publicidad o contenido se mostrar&aacute; de esta manera en el mercado de LinkLift - consulte m&aacute;s informaci&oacute;n sobre %scomo se&ntilde;alizar los enlaces de texto%s.' );



@define( 'LINKLIFT_CONFIG_TITLE_NO_CSS'					, 'Usar formato del tema' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_NO_CSS'			, 'Si activa esta opci&oacute;n, el m&oacute;dulo LinkLift utilizar&aacute; el estilo del CSS de su tema. En caso contrario, el m&oacute;dulo LinkLift utilizar&aacute; su propio CSS.' );

@define( 'LINKLIFT_CONFIG_TITLE_NO_HTML'				, 'Limpiar los enlaces (sin HTML)' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_NO_HTML'			, 'Si activa esta opci&oacute;n, el m&oacute;dulo LinkLift generar&aacute; enlaces de texto sin etiquetas HTML que los envuelvan (P, UL, LI). En caso contrario, se a&ntilde;adir&aacute;n etiquetas HTML.' );

@define( 'LINKLIFT_CONFIG_TITLE_LINKS_PER_ROW'			, 'Enlaces por fila' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_LINKS_PER_ROW'	, 'N&uacute;mero de columnas en las que se mostrar&aacute;n los enlaces de texto. Si desea que los enlaces se muestren horizontalmente deber&iacute;a usar el mayor n&uacute;mero de columnas posibles.' . ' ' . LINKLIFT_INTERNAL_NOTE_NO_HTML);

@define( 'LINKLIFT_CONFIG_TITLE_FONT_SIZE'				, 'Tama&ntilde;o de la fuente' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_FONT_SIZE'		, 'El tama&ntilde;o de la fuente de sus enlaces de texto.' . ' ' . LINKLIFT_INTERNAL_NOTE_NO_CSS);

@define( 'LINKLIFT_CONFIG_TITLE_LINK_COLOR'				, 'Color de los enlaces' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_LINK_COLOR'		, 'El color de sus enlaces de texto. Puede usar valores CSS para los colores del formato #XXX o #XXXXXX o puede usar los nombres en ingl&eacute;s (por ejemplo: Red, DarkGreen, RoyalBlue, Magenta, ...). Deje este campo vac&iacute;o para usar el color de los enlaces de su tema.' . ' ' . LINKLIFT_INTERNAL_NOTE_NO_CSS);

@define( 'LINKLIFT_CONFIG_TITLE_BG_COLOR'				, 'Color de fondo' );
@define( 'LINKLIFT_CONFIG_DESCRIPTION_BG_COLOR'			, 'El color de fondo del bloque de enlaces de LinkLift. Puede usar valores CSS para los colores del formato #XXX o #XXXXXX o puede usar los nombres en ingl&eacute;s (por ejemplo: Red, DarkGreen, RoyalBlue, Magenta, ...). Deje este campo vac&iacute;o para usar un fondo transparente.' . ' ' . LINKLIFT_INTERNAL_NOTE_NO_CSS_OR_HTML);



// Version- and Update-messages
// -------------------------------------
@define( 'LINKLIFT_PLUGIN_OUT_OF_DATE'					, 'Hay una nueva versi&oacute;n del plugin disponible en la web de LinkLift.' );
@define( 'LINKLIFT_PLUGIN_OUT_OF_DATE_DOWNLOAD'			, 'Actualice el plugin ahora.' );
@define( 'LINKLIFT_PLUGIN_OUT_OF_DATE_INFORM'			, 'Notifique al administrador del sitio.' );
@define( 'LINKLIFT_PLUGIN_OUT_OF_DATE_COMPLETE_ADMIN'	, LINKLIFT_PLUGIN_OUT_OF_DATE . ' ' . '%s' . LINKLIFT_PLUGIN_OUT_OF_DATE_DOWNLOAD . '%s' );
@define( 'LINKLIFT_PLUGIN_OUT_OF_DATE_COMPLETE_USER'	, LINKLIFT_PLUGIN_OUT_OF_DATE . ' ' . '%s' . LINKLIFT_PLUGIN_OUT_OF_DATE_INFORM   . '%s' );

@define( 'LINKLIFT_PLUGIN_UP_TO_DATE'					, 'Tiene la &uacute;ltima versi&oacute;n del plugin.' );


// Widgets-page
// -------------------------------------
@define( 'LINKLIFT_WIDGETS_CONFIG_REMARK'				, 'Para configurar el plugin de LinkLift dir&iacute;jase al submen&uacute; de configuraci&oacute;n %s en el men&uacute; plugins.' );


// Other
// -------------------------------------
@define( 'LINKLIFT_WEBSITE_KEY'							, '---' );

// -------------------------------------


?>