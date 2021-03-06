<?php
/*
Plugin Name: LinkLift (Widgets)
Plugin URI: http://www.linklift.es/mis-sitios/
Description: LinkLift-Textlinks-Plugin  &nbsp;||&nbsp;  Venda enlaces de texto en su blog por una cantidad fija de dinero al mes. Reg&iacute;strese en <a href="http://www.linklift.es/?ref=518fcf64240" target="_self">http://www.linklift.es/</a>  &nbsp;||&nbsp;  El plugin de LinkLift se conecta autom&aacute;ticamente al servidor de LinkLift, descarga los enlaces que ha vendido y los guarda en la tabla de opciones de la base de datos de Wordpress (&#039;wp_options&#039;). <a href="options-general.php?page=linklift-configuration&" target="_self"><b>Configuraci&oacute;n</b></a>.
Author: Andreas Rayo Kniep
Version: 1.5
Author URI: http://www.linklift.es/
*/
// tab-size within this source: 4 spaces



/**	This is the plug-in's name that is used by Wordpress
 *    to identify the LinkLift-textlinks-plug-in internally.
 *  You may change this constant in order to change the plug-in's name
 *    as shown in the Wordpress-Widgets-panel.
 *  Names are usually randomised iff they will appear in the generated source-code of the CMS.
 *    Constant names that appear in the source-code increase the detectability of the plug-in!
 */
@define( "LL_PLUGIN_NAME"						, "side" );

@define( "LL_PLUGIN_MENU_FILENAME"				, "linklift-configuration" );
@define( "LL_PLUGIN_REGISTER_LINK_URL"			, "http://www.linklift.es/?ref=518fcf64240" );


// variable names of Wordpress-options-keys
@define( "LL_OPTION_SERVER_VERSION"				, "linklift_plugin_wordpress_server_version" );
@define( "LL_OPTION_SERVER_DATE"				, "linklift_plugin_wordpress_server_date" );
@define( "LL_OPTION_SERVER_LANGUAGE"			, "linklift_plugin_wordpress_server_language" );

@define( "LL_OPTION_SERVER_VERSION_CHECK_DATE"	, "linklift_plugin_wordpress_server_version_check_date" );


/**	The following constants contain Wordpress-specific-filenames
 *    that are used within the plug-in in order to generate links between Wordpress-admin-pages.
 */
@define( "LL_WORDPRESS_FILE_PLUGINS"			, "plugins.php" );
@define( "LL_WORDPRESS_FILE_OPTIONS_GENERAL"	, "options-general.php" );
@define( "LL_WORDPRESS_FILE_THEME_EDITOR"		, "theme-editor.php" );
@define( "LL_WORDPRESS_FILE_ADMIN_FUNCTIONS"	, "admin-functions.php" );

if (file_exists(LL_WORDPRESS_FILE_OPTIONS_GENERAL))
	@define( "LL_LINKLIFT_CONFIGURATION_PAGE"	, LL_WORDPRESS_FILE_OPTIONS_GENERAL . "?page=" . LL_PLUGIN_MENU_FILENAME . "&" );
elseif (file_exists(LL_WORDPRESS_FILE_PLUGINS))
	@define( "LL_LINKLIFT_CONFIGURATION_PAGE"	, LL_WORDPRESS_FILE_PLUGINS . "?page=" . LL_PLUGIN_MENU_FILENAME . "&" );
else
	@define( "LL_LINKLIFT_CONFIGURATION_PAGE"	, false );


/**	Checking for Wordpress-widgets-plug-in ...
 * - If pre-installed an admin-file "widgets.php" exists.
 * - If installed as Wordpress-plug-in a respective plug-in exists.
 */
if (file_exists("widgets.php"))
{
	@define( "LL_WORDPRESS_WIDGETS_INSTALLED"	, true );
	@define( "LL_WORDPRESS_FILE_WIDGETS"		, "widgets.php?" );
	
} else {
	// the method get_plugins is only accessible if the file admin-functions.php has been included
		// if it has not yet been included we will try so, now:
	if (file_exists(LL_WORDPRESS_FILE_ADMIN_FUNCTIONS))
		@include_once(LL_WORDPRESS_FILE_ADMIN_FUNCTIONS);
	
	if (function_exists("get_plugins"))
		$installed_plugins = get_plugins();
	else
		$installed_plugins = array();
	
	
	if (isset($installed_plugins["widgets/widgets.php"]))
	{
		@define("LL_WORDPRESS_WIDGETS_INSTALLED", true );
		@define("LL_WORDPRESS_FILE_WIDGETS"		, "themes.php?page=widgets/widgets.php&" );
		
	} else {
		// no Wordpress-widgets-plug-in installed!
		@define("LL_WORDPRESS_WIDGETS_INSTALLED", false );
	} //if-else
} //if-else




// default language: english
$plugin_default_lang     = "en";

// trying to extract the installed language out of the Wordpress-constant 'WPLANG':
if (defined("WPLANG"))
	$wordpress_language      = strtolower( substr( WPLANG, 0, 2 ) );
else
	$wordpress_language      = $plugin_default_lang;

// language-specific texts
$language_file_wordpress = dirname(__FILE__) . "/linklift_twosource_lang_" . $wordpress_language  . ".inc.php";
$language_file_default   = dirname(__FILE__) . "/linklift_twosource_lang_" . $plugin_default_lang . ".inc.php";

// all not-translated texts will be taken from the english text-file (if existing) ...
if (file_exists($language_file_wordpress))
    @include_once( $language_file_wordpress );
if (file_exists($language_file_default))
    @include_once( $language_file_default );




/* ****************************************************************
 * adspace:        http://nocaduca.com/wordpress                  *
 * creation date:  2008-04-15                                     *
 * contact:        soporte@linklift.es                            *
 * script-version: 1.5    (2008-02-20)                            *
 * ****************************************************************/
// this PHP-script runs on PHP-engines >= v4.0.6
// tab-size of this document:  4 spaces



/**	Disabling all error- (, warning-, and notice-) messages...
 *	You may want to un-comment the following lines when testing or debugging this plugin.
 *  At the end of the plugin you may restore the original reporting-level using the following call:
 *  error_reporting( $linklift_saved_reporting_level );
 *  
 *  Note: there is another call of error_reporting() in this plugin's method execute()!
 * 
 * default:			E_ERROR | E_WARNING | E_PARSE
 * all messages:	E_ALL
 * only errors:		E_ERROR
 * no messages:		0
 * 
 */
$linklift_saved_reporting_level = error_reporting();
// error_reporting( E_ALL );





/**	
 *	The LinkLift-website-key identifies your website on the LinkLift-marketplace.
 */
@define( "LL_WEBSITE_KEY"						, "" );




/**	The script-version-constants are used for a check
 *	if a newer version of your plug-in is available on the LinkLift-server.
 *  Note: the plug-in will not update itself, at this time.
 */
@define( "LL_PLUGIN_LANGUAGE"					, "wordpress" );
@define( "LL_PLUGIN_VERSION"					, "1.5" );
@define( "LL_PLUGIN_DATE"						, "2008-02-20" );
@define( "LL_PLUGIN_CREATION_DATE"				, "20080415164102" );

@define( "LL_UPDATE_CHECK_TIMEFRAME"			, "-1 week" );

@define( "LL_PLUGIN_SECRET"						, "WNtKBtiyIP" );


/**	In order to not block the page-load-progrss
 *	a time-limit (in seconds) is set when receiving new data from the LinkLift-server.
 */
@define( "LL_DATA_TIMEOUT"						, 7 );


/**	
 *	The server-host to connect to in order to download data from LinkLift-server.
 */
@define( "LL_SERVER_HOST"						, "external.linklift.net" );
@define( "LL_SERVER_URL"						, "http://" . LL_SERVER_HOST . "/" );




// if the plugin's individual "secret" is delivered the plugin's so-called SECRET-MODE is entered. Necessary for entering the plugin's DEBUG_MODE.
if (   (   (! empty($_REQUEST["ls"]))
		&& (LL_PLUGIN_SECRET === $_REQUEST["ls"])
		)
	|| (   (! empty($_SERVER["REQUEST_URI"]))
		&& (preg_match('@ls.' . LL_PLUGIN_SECRET . '@', $_SERVER["REQUEST_URI"]))
		)
	)
{
	@define( "LL_SECRET_MODE"					, true );
} else {
	@define( "LL_SECRET_MODE"					, false );
} //if-else


/** a possible debug-mode helping to analyse problems and functionality of the plugin
 * existing LL_DEBUG_MODEs:
 *   1:  Display internal testlink with maximum length and umlauts
 *   2:  Display the object's / plugin's current data / state
 *   3:  Display the current XML-cache
 *   4:  Displays some "external values" like values of LinkLift-constants or the surrounding CMS' resolved language.
 *   5:  Update the XML-cache (externally forced update)
 *  10:  Displays the running script's filename
 *  99:  Known debug-modes
 */
if (   (LL_SECRET_MODE)
	&&
		(  (   (! empty($_REQUEST["ld"]))
			&& (is_numeric($_REQUEST["ld"]))
			)
		|| (   (! empty($_SERVER["REQUEST_URI"]))
			&& (preg_match('@ld.(\d\d?)@', $_SERVER["REQUEST_URI"], $debug_mode_matches))
			)
		)
	)
{
	if (isset($debug_mode_matches[1]))
		@define( "LL_DEBUG_MODE"				, $debug_mode_matches[1] );
	else
		@define( "LL_DEBUG_MODE"				, $_REQUEST["ld"] );
	
} else {
	@define( "LL_DEBUG_MODE"					, false );
} //if-else
	





if (! class_exists("LinkLiftPlugin"))
{

class LinkLiftPlugin
{





// A LinkLift-website-key other than the class' constant LL_WEBSITE_KEY that should be used for updating the locally cached XML-data. 
var $linklift_website_key;
// A XML-filename other then the class' constant above. This property will have no effect if your plugin uses a local database for caching.
var $xml_filename = "";
// An array of integers representing the textlinks of the current textlink-data-array that should be generated and printed. You may want to use this property in order to distribute your textlinks on different locations of your website, to give an example. E.g: $links_to_show = array(1,3,5,7,9).
var $links_to_show;

// the current XML-cache
var $xml_cache;
// the last time the XML-cache has been updated
var $xml_cache_time;

// other variables, mainly copying linklift-constants
var $data_timeout			= LL_DATA_TIMEOUT;
var $plugin_language		= LL_PLUGIN_LANGUAGE;
var $plugin_version			= LL_PLUGIN_VERSION;
var $plugin_date			= LL_PLUGIN_DATE;
var $plugin_creation_date	= LL_PLUGIN_CREATION_DATE;





/**
 * Usually, instances of the LinkLift-plugin's class do not need an (individual) state.
 * Thus, in general, we will need at most one instance of the plugin-class in order to generate HTML-output out of external data (XML-textlink-data).
 * 
 * The class-method will always return the same object (singleton) or create a new one for you if none exists.
 * 
 * Note: Since the method returns a reference you have to de-reference the result; e.g.:
 * $new_instance =& LinkLiftPlugin::getInstance(); 
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-10-26
 * @return instance-reference on the class's singleton
 */
function &getInstance()
{
	static $singleton;
	
	if (   (! is_object($singleton))
		|| (null == $singleton)
		|| (empty($singleton->linklift_website_key))   )
	{
		$singleton = new LinkLiftPlugin();
	} //if
	
	return $singleton;
} //getInstance()

/**
 * Using the class' constructor you can obtain an instances of the LinkLift-plugin's having an individual state.
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-10-26, 2007-12-10
 * @param $linklift_website_key string The LinkLift-website-key that should be used for updating the locally cached XML-data. If empty the method will use the default website-key that you can either find as a constant above or as value in your local database. Usually, this parameter is unused and empty!
 * @param $xml_filename string The filename of the local XML-file that should be used for caching textlink-data iff your plugin does not use a local database for caching. If empty the method will use the default XML-filename that you can find as constant above. Usually, this parameter is unused and empty!
 * @param $links_to_show array of integers representing the textlinks of the current textlink-data-array that should be generated and printed by this instance. You may want to use this parameter in order to distribute your textlinks on different locations of your website, to give an example. E.g.: $links_to_show = array(0,2,4,6,8). Usually, this parameter is unused and empty!
 * @return new instance of the LinkLift-plugin-class LinkLiftPlugin
 */
function LinkLiftPlugin( $linklift_website_key = "", $xml_filename = "", $links_to_show = array() )
{
	if (empty($linklift_website_key))
	{
		// plugin-specific saving and loading
		$linklift_website_key = LinkLiftPlugin::ll_get_option("linklift_website_key", "");
		if (empty($linklift_website_key))
			$linklift_website_key = LinkLiftPlugin::ll_translate( "LINKLIFT_WEBSITE_KEY" );
		
	} //if
	
	$instance_linklift_website_key	= ( (! empty($linklift_website_key)) ? ($linklift_website_key) : (LL_WEBSITE_KEY) );
	
	
	
	if (   (empty($xml_filename))
		&& (defined("LL_TEXTLINK_DATAFILE"))   )
	{
		$xml_filename		= LL_TEXTLINK_DATAFILE;
	} //if-else
	
	
	
	// saving instance-properties
	$this->setWebsiteKey(  $instance_linklift_website_key );
	$this->setXmlFilename( $xml_filename );
	$this->setLinksToShow( $links_to_show );
	
	
	
	if (file_exists( $this->getXmlFilename() ))
		$this->setXmlCacheTime( filemtime($this->getXmlFilename()) );
} //__construct()


/**
 * This method creates an instance of class LinkLiftPlugin and invokes its main-function ll_textlink_code
 *   in order to generate and output HTML-code with your textlinks (to standard-out) using the default linklift-website-key.
 * 
 * This method wraps the calls of getInstance() and ll_textlink_code() and contains no further logic.
 * 
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @param $return boolean, Indicating whether the generated HTML-code should be returned ($return == true), or written to standard-out (echo); default: false.
 * @return void
 */
function execute( $return = false )
{
	// not displaying error-messages while executing the LinkLift-plugin
	$linklift_saved_reporting_level = error_reporting();
	error_reporting( 0 );
	
	
	$linklift_plugin_instance	=& LinkLiftPlugin::getInstance();
	$textlink_code				=& $linklift_plugin_instance->ll_textlink_code( $return );
	
	
	// restoring original error-reporting-level
	error_reporting( $linklift_saved_reporting_level );
	
	
	return $textlink_code;
} //execute()


/**
 * Detects and returns the given string's encoding using mb_detect_encoding.
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-10
 * @param $string string, the encoding of which should be deteceted.
 * @return string the detected encoding or an empty string of no encoding could have been detected.
 */
function ll_mb_detect_encoding( $string ) 
{
	if (function_exists("mb_detect_encoding"))
		return mb_detect_encoding(	  $string
									, $encoding_list = array( "UTF-8", "ISO-8859-1", "ISO-8859-15", "ASCII" )
									);
	else
		return "";
} //ll_mb_detect_encoding()

/**
 * Calls a given string-function with the given 
 * Unlike strtolower, this method tries to detect the given string's encoding (calling ll_mb_detect_encoding())
 *   and convert using mb_strtolower protecting special characters (e.g. umlauts).
 * 
 * If the needed functions for detection and conversion are not available
 *   strtolower is used in order to convert the given string.
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-10
 * @param $string_function string, (not callback!) the string-function to be either called directly or after prepending the "mb_"-prefix
 * @param $param_arr array, of parameters being passed to the $string_function, the first parameter is assumed to be the string to apply the $string_function to
 * @return mixed the result of the called $string_function or false if a faulty array of parameters was delivered
 */
function ll_call_str_function_encoding_dependent( $string_function, $param_arr ) 
{
	if (   (empty($param_arr))
		|| (! is_array($param_arr))   )
	{
		return false;
	} //if
	
	
	if (function_exists("mb_" . $string_function))
	{
		// the first given parameter is assumed to be the string to apply the $string_function to
		$string				= $param_arr[0];
		$string_encoding	= LinkLiftPlugin::ll_mb_detect_encoding( $string );
		
		if (! empty($string_encoding))
		{
			$param_arr[] = $string_encoding;
			
			// calling the corresponding multibyte PHP-function
			return call_user_func_array("mb_" . $string_function, $param_arr);
		} //if
	} //if
	
	// calling the original PHP-function working with strings in ASCII-format
	return call_user_func_array($string_function, $param_arr);
} //ll_call_str_function_encoding_dependent()


/**
 * The method tries to connect to a given $server_host in order to open a server-socket-connection on port 80
 *   and write the given $request-string to it.
 * The given $request is expected to be a valid HTTP-request like typical GET- or POST-requests.
 * The data returned from the $server_host and received within a fixed timeframe will be returned.
 * The method is invoked by get_404_page() and ll_retrieve_xml_from_ll_server() or ll_send_ping_signal(), respectively (depending on your plugin-type).
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2006-09-18, 2007-03-12, 2007-12-17
 * @return $server_host string the host of the server to connect to and send the given $request to.
 * @return $request string the HTTP-request to be written to the server-socket-connection that is tried to be established with the given $server_host.
 * @return string the data received from the $server_host after writing the given $request to the opened server-socket-connection, or false if an error occurred.
 */
function get_page_content( $server_host, $request, $data_timeout = LL_DATA_TIMEOUT )
{
	if (   ($server = fsockopen($server_host, 80, $errno, $errstr, $data_timeout))
		&& (is_resource( $server ))   )
	{
		if (function_exists("stream_set_blocking"))
			stream_set_blocking($server, false);
		
		if (function_exists("stream_set_timeout"))
			stream_set_timeout( $server, $data_timeout );
		else
			socket_set_timeout( $server, $data_timeout );
		
		
		$connection_start_time = time();
		
		
		$write_result = fwrite( $server, $request );
		
		// unable to write to open socket.
		if (! $write_result)
			return false;
		
		
		
		$data = "";
		
		while (! feof($server))
		{
			$data_before = $data;
			$data       .= fread($server, 10000); 
			
			// if no data was received (yet) ...
			if ($data_before == $data)
			{
				// if no data was received and the the data-timout was reached
					// the download-process will be stopped.
				if ($data_timeout < time() - $connection_start_time)
				{
					$data = "";
					break;
				} //if
				
				// ... go to sleep for 10 ms, waiting for data.
					// usleep() works on Linux-like servers!
					// On other systems usleep may have no effect
					// PHP 5.0.0 claims that usleep works on Windows-systems, as well ...
					// ... the effect on the system's processor, however, is not known to the writer.
				if (function_exists("usleep"))
					usleep($micro_seconds = 10 * 1000);		// 10 * 1000 micro seconds  =  10 milli seconds  =  0.01 seconds
			} //if
		} //while
		
		
		fclose($server);
		
		
		return $data;
		
		
	} else {
		return false;
	} //if-else
} //get_page_content()

/**
 * Downloads the current-plugin-info for the installed plugin from the LinkLift-server.
 * The method will return an associative array of plugin_data containing (at least) the following fields:
 * - plugin-version:	the current plugin-version of the delivered plugin-language on the LinkLift-server
 * - plugin-date:		the rlease-date of the current plugin-version
 * - plugin-language:	the plugin-language of the plugin-version
 * 
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-02-16
 * @return $cms_info string additional CMS-info to be sent to the LinkLift-server; usually this contains the version of the CMS this plugin is used in; default: "".
 * @return array, associative array of plugin-data, see above for more information  <OR>  false if an error occurred.
 */
function ll_get_current_plugin_info( $cms_info = "" )
{
	$server_host = LL_SERVER_HOST;
	
	
	$linklift_website_key	= urlencode(LL_WEBSITE_KEY);
	$linklift_secret		= urlencode(LL_PLUGIN_SECRET);
	$linklift_method		= urlencode("current_plugin_version");
	$cms_info_encoded		= urlencode($cms_info);
	
	$request =   "GET /external/external_info.php5"
				. "?website_key"				. "=" . $linklift_website_key
				. "&linklift_secret"			. "=" . $linklift_secret
				. "&method"					. "=" . $linklift_method
				. "&plugin_language"			. "=" . urlencode(LL_PLUGIN_LANGUAGE)
				. "&plugin_version"			. "=" . urlencode(LL_PLUGIN_VERSION)
				. "&plugin_date"				. "=" . urlencode(LL_PLUGIN_DATE)
				. "&cms_info"					. "=" . $cms_info_encoded
				. " "
				
				. "HTTP/1.0\n"
				. "Host: " . $server_host . "\n"
				. "Connection: Close\n"
				. "\n"
				
				. "";
	
	
	$plugin_info_raw = LinkLiftPlugin::get_page_content( $server_host, $request );
	
	
	if (empty($plugin_info_raw))
		return false;
	
	
	
	
	// splits the received page in header and content
	$file_parts			= preg_split( $pattern = '@\r?\n\r?\n@', $subject = $plugin_info_raw, $limit = 2 );
	
	$body				=& $file_parts[1];
	
	// every line of the page's body is expected to contain one information
	$plugin_info_lines	= preg_split( $pattern = '@\r?\n@', $subject = $body );
	
	// every valid information is put into an associative array $plugin_info
	$plug_info 			= array();
	foreach ($plugin_info_lines as $line)
	{
		$line_parts		= explode( ":", $line, $limit = 2 );
		
		if (2 === count($line_parts))
			$plug_info[ $line_parts[0] ] = $line_parts[1];
	} //foreach($line)
	
	
	
	return $plug_info;
} //ll_get_current_plugin_info()

/**
 * Returns a URL that this plugin can be updated with.
 * 
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-02-16
 * @return string the URL to call in order to update this plugin
 */
function ll_get_update_plugin_url()
{
	$linklift_website_key	= urlencode(LL_WEBSITE_KEY);
	$linklift_secret		= urlencode(LL_PLUGIN_SECRET);
	$linklift_method		= urlencode("current_plugin_download");
	
	$request =    LL_SERVER_URL
				. "/external/external_info.php5"
				. "?website_key"				. "=" . $linklift_website_key
				. "&linklift_secret"			. "=" . $linklift_secret
				. "&method"					. "=" . $linklift_method
				. "&plugin_language"			. "=" . urlencode(LL_PLUGIN_LANGUAGE)
				. "&plugin_version"			. "=" . urlencode(LL_PLUGIN_VERSION)
				
				. "";
	
	
	return $request;
} //ll_get_update_plugin_url()

/**
 * The method returns the server's very own 404-page including the page's headers as string!
 * Therefor, a not-existing page is requested from the local server using the same accapt-language as the one delivered to this request.
 * The method is invoked by return_error().
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @return string the server's very own 404-page including the page's headers
 */
function get_404_page()
{
	$server_host = $_SERVER["SERVER_NAME"];
	
	
	$language = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
	
	// asking for the same language that was delivered to this request
	if (! empty($language))
		$acceptLanguage = "Accept-Language: " . $language . "\r\n";
	else
		$acceptLanguage = "";
	
	// using carriage returns since Windows-servers may not understand simple newlines (while Linux-servers do not seem to have problems with carriage returns)
	$request =	  "GET /this_file_does_not_exist.php "
				
				. "HTTP/1.0\r\n"
				. "Host: " . $server_host . "\r\n"
				. $acceptLanguage
				. "Connection: Close\r\n"
				. "\r\n"
				
				. "";
	
	// possible errors ignored!
	$page404 = LinkLiftPlugin::get_page_content( $server_host, $request );
	
	
	return $page404;
} //get_404_page()

/**
 * The method returns an error-page to a faulty or malicious request.
 * For $errorCode 404 the local server's very own 404-page is requested and returned.
 * The method does not return any value, but set headers and print the generated page's body to standard-out, automatically.
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @param $error_code int The HTTP-Code to be returned and set as page-header; default: 404.
 * @param $error_message string The main error-message to be returned as the page's body; default: "Illegal Request".
 * @param $headers_to_set array, associative array of strings containing headers to be set when exiting
 * @return void
 */
function return_error( $error_code = 404, $error_message = "Illegal Request", $headers_to_set = array() )
{
	$error_strings = array	(
							  400 => "Bad Request"
							, 401 => "Unauthorized"
							, 404 => "Not Found"
							, 405 => "Method Not Allowed"
							, 406 => "Not Acceptable"
							, 409 => "Conflict"
							, 500 => "Internal Server Error"
							);
	
	
	if (404 == $error_code)
	{
		$page404		= LinkLiftPlugin::get_404_page();
		
		// splits the received 404-page in header and content
		$file_parts		= preg_split( $pattern = '@\r?\n\r?\n@', $subject = $page404, $limit = 2 );
		
		$headers		= $file_parts[0];
		$body			= $file_parts[1];
		
		
		// setting HTTP-headers individually
		$headers_array	= explode("\n", $headers);
		foreach ($headers_array as $header)
			header( $header );
		
		
		// writing the page's body
		die( $body );
	} //if
	
	
	
	$error_string = ( (isset($error_strings[$error_code])) ? (" " . $error_strings[$error_code]) : ("") );
	
	header("HTTP/1.x " . $error_code . $error_string );
	
	
	foreach ($headers_to_set as $header => $value)
		header( $header . ": " . $value );
	
	
	
	die( $error_message );
} //return_error()

/**
 * This plugin is not supposed to be called directly, but to be used as inclusion or part of a surrounding CMS.
 * Direct requests will be responded to with an error, protecting this plugin from prying eyes.
 * The method does not return any value, but set headers and print the generated page's body to standard-out, automatically.
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @param $check_this_file boolean Set this flag if the check-routine should also disallow direct request to the file this script is a part of (if you have included the LinkLift-plugin in a bigger PHP-script set this parameter to false, for usage within a CSS you can set this flag to true); default: false.
 * @return void
 */
function check_request( $check_this_file = false )
{
	// direct access to the LinkLift-plugin-file is not wanted!
	if (   (   (false !== strpos( strtolower($_SERVER["SCRIPT_FILENAME"])	, strtolower("linklift_twosource.php") ))
			|| (false !== strpos( strtolower(getenv("SCRIPT_NAME"))			, strtolower("linklift_twosource.php") ))
			)
		&& (! LL_SECRET_MODE)
		)
	{
		LinkLiftPlugin::return_error( $errorCode = 404 );
	} //if
	
	if ($check_this_file)
	{
		// direct access to the LinkLift-plugin-file is not wanted!
		if (   (   (false !== strpos( strtolower($_SERVER["SCRIPT_FILENAME"])	, strtolower( basename(__FILE__) ) ))
				|| (false !== strpos( strtolower(getenv("SCRIPT_NAME"))			, strtolower( basename(__FILE__) ) ))
				)
			&& (! LL_SECRET_MODE)
			)
		{
			LinkLiftPlugin::return_error( $errorCode = 404 );
		} //if
	} //if
} //check_request()





/**
 * Setter-method for property "linklift_website_key".
 * The class'-properties are private in PHP5.
 * 
 * The method is invoked by the class' constructor.
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-02
 * @param $instance_linklift_website_key string The new linklift-website-key for this instance.
 * @return string The former value of the property "linklift_website_key".
 */
function setWebsiteKey( $instance_linklift_website_key )
{
	$current_linklift_website_key	= $this->getWebsiteKey();
	
	$this->linklift_website_key		= $instance_linklift_website_key;
	
	return $current_linklift_website_key;
} //setWebsiteKey()

/**
 * Getter-method for property "linklift_website_key".
 * The class'-properties are private in PHP5.
 * 
 * Usually, the property is set once by the constructor and remains unchanged afterwards.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-10
 * @return string The current value of the linklift_website_key-property.
 */
function getWebsiteKey()
{
	return $this->linklift_website_key;
} //getWebsiteKey()

/**
 * Setter-method for property "xml_filename".
 * The class'-properties are private in PHP5.
 * 
 * The method checks wether a linklift-website-key is defined for this instance
 *   and extends the given filename by adding the current linklift-website-key as postfix.
 * Thus, one plugin may work with and cache textlink-data belonging to different linklift-website-keys.
 * 
 * The method is invoked by the class' constructor.
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-02
 * @param $instance_xml_filename string The new XML-filename that is used when textlink-data that has been downloaded from the LinkLift-server is cached.
 * @return string The former value of the property "xml_filename".
 */
function setXmlFilename( $instance_xml_filename = "" )
{
	$current_xml_filename			= $this->getXmlFilename();
	
	$instance_linklift_website_key	= $this->getWebsiteKey();
	
	if (! empty($instance_linklift_website_key))
	{
		$xml_filename_length	= LinkLiftPlugin::ll_call_str_function_encoding_dependent("strlen", array($instance_xml_filename));
		
		if (   ( 0 >= $xml_filename_length)
			|| ( false === ($file_format_start = LinkLiftPlugin::ll_call_str_function_encoding_dependent("strrpos", array($instance_xml_filename, ".") )) )
			)
		{
			$file_format_start	= $xml_filename_length;
		} //if
			
		$instance_xml_filename	=	  LinkLiftPlugin::ll_call_str_function_encoding_dependent("substr", array($instance_xml_filename, 0, $file_format_start))
									. ( (0 < $file_format_start) ? ("_") : ("") )
									. $instance_linklift_website_key
									. LinkLiftPlugin::ll_call_str_function_encoding_dependent("substr", array($instance_xml_filename, $file_format_start, $xml_filename_length))
									. "";
	} //if
	
	$this->xml_filename = $instance_xml_filename;
	
	return $current_xml_filename;
} //setXmlFilename()

/**
 * Getter-method for property "xml_filename".
 * The class'-properties are private in PHP5.
 * 
 * Usually, the property is set once by the constructor and remains unchanged afterwards.
 * Some CMS-plugins, though, will set the XML-filename later when having access to the CMS'-database.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-02
 * @return string The current value of the xml_filename-property.
 */
function getXmlFilename()
{
	return $this->xml_filename;
} //getXmlFilename()

/**
 * Setter-method for property "links_to_show".
 * The class'-properties are private in PHP5.
 * 
 * The method checks wether the given value is an array. If not an empty array is used as new value.
 * 
 * The method is invoked by the class' constructor.
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-02
 * @param $instance_links_to_show array Array of integers, holding the new value of links to be shown by this instance.
 * @return array The former value of the property "links_to_show".
 */
function setLinksToShow( $instance_links_to_show = "" )
{
	$current_instance_links_to_show	= $this->getLinksToShow();
	
	$this->links_to_show			= ( (is_array($instance_links_to_show)) ? ($instance_links_to_show) : (array()) );
	
	return $current_instance_links_to_show;
} //setLinksToShow()

/**
 * Getter-method for property "links_to_show".
 * The class'-properties are private in PHP5.
 * 
 * Usually, the property is set once by the constructor and remains unchanged afterwards.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-02
 * @return string The current value of the links_to_show-property.
 */
function getLinksToShow()
{
	return $this->links_to_show;
} //getLinksToShow()

/**
 * Setter-method for property "xml_cache_time".
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @param $xml_cache_time int The time the cached XML has been updated for the last time; default: NOW / time().
 * @return void
 */
function setXmlCacheTime( $xml_cache_time = -1 )
{
	if (0 > $xml_cache_time)
		$xml_cache_time = time();
	
	$this->xml_cache_time = $xml_cache_time;
} //setXmlCacheTime()

/**
 * Getter-method for property "xml_cache_time".
 * Note: in LL_DEBUG_MODE = 3 this method will always return 0 in order to force an update of the XML-cache.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @return int The time the cached XML has been updated for the last time.
 */
function getXmlCacheTime()
{
	if (5 == LL_DEBUG_MODE)
		return 0;
	else
		return $this->xml_cache_time;
} //getXmlCacheTime()

/**
 * Setter-method for property "xml_cache".
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @param $xml_cache string The XML-string to be cached / that is cached.
 * @param $update_time boolean Set this flag in order to let the method update the xml_cache_time to NOW / time(); default: false.
 * @return void
 */
function setXmlCache( $xml_cache, $update_time = false )
{
	$this->xml_cache = $xml_cache;
	
	if ($update_time)
		$this->setXmlCacheTime();
} //setXmlCache()

/**
 * Getter-method for property "xml_cache".
 * Note: in LL_DEBUG_MODE = 3 this method will always return 0 in order to force an update of the XML-cache.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @return string The currently cached XML.
 */
function getXmlCache()
{
	return $this->xml_cache;
} //getXmlCache()


/**
 * This method outputs an instance's current state by returning the values of its fields and constants.
 * Use it for debugging-information.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @return string, the object's current state as string
 */
function __toString()
{
	$seperator		= " / ";
	
	$return_array	= array();
	
	$return_array[]	= "LinkLift Plugin";
	$return_array[]	= "Linklift-Website-Key: "	. $this->getWebsiteKey();
	$return_array[]	= "XML-Filename: "			. $this->getXmlFilename();
	$return_array[]	= "Links to show: "			. implode(",", $this->getLinksToShow());
	$return_array[]	= "XML-cache update time: "	. $this->getXmlCacheTime() . " (" . date("Y-m-d H:i:s", $this->getXmlCacheTime()). ")";
	$return_array[]	= "Data Timeout: "			. $this->data_timeout;
	$return_array[]	= "Plugin Language: "		. $this->plugin_language;
	$return_array[]	= "Plugin Version: "		. $this->plugin_version;
	$return_array[]	= "Plugin Date: "			. $this->plugin_date;
	
	$return_str		= implode($seperator, $return_array);
	
	return $return_str;
} //__toString()


/**
 * The method retrieves textlink-data to your adspace from the LinkLift-server.
 * The data is received in XML-format and contains information about all textlinks currently booked on your adspace.
 * The received XML is saved as instance-property xml_cache.
 * The method is invoked by ll_textlink_code() if the local XML-file is not existent or out-of-date.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2006-09-18
 * @return void
 */
function ll_retrieve_xml_from_ll_server()
{
	$server_host = LL_SERVER_HOST;
	
	
	$linklift_website_key	= urlencode($this->getWebsiteKey());
	$linklift_secret		= urlencode(LL_PLUGIN_SECRET);
	
	$request =   "GET /external/textlink_data.php5"
				. "?website_key"				. "=" . $linklift_website_key
				. "&linklift_secret"			. "=" . $linklift_secret
				. "&plugin_language"			. "=" . urlencode($this->plugin_language)
				. "&plugin_version"			. "=" . urlencode($this->plugin_version)
				. "&plugin_date"				. "=" . urlencode($this->plugin_date)
				. "&plugin_creation_date"		. "=" . urlencode($this->plugin_creation_date)
				. "&http_request_uri"			. "=" . ( (isset($_SERVER["REQUEST_URI"])    ) ? (urlencode($_SERVER["REQUEST_URI"])    ) : ("") )
				. "&http_user_agent"			. "=" . ( (isset($_SERVER["HTTP_USER_AGENT"])) ? (urlencode($_SERVER["HTTP_USER_AGENT"])) : ("") )
				. "&linklift_title"			. "=" . urlencode(LinkLiftPlugin::ll_get_option( "linklift_title_"                . $linklift_website_key , "recomendaciones"))
				. "&condition_no_css"			. "=" . ( (LinkLiftPlugin::ll_get_option( "linklift_no_css_use_theme_"     . $linklift_website_key , true)) ? ("1") : ("0") )
				. "&condition_no_html_tags"	. "=" . ( (LinkLiftPlugin::ll_get_option( "linklift_no_html_tags_"         . $linklift_website_key , false)) ? ("1") : ("0") )
				. " "
				
				. "HTTP/1.0\n"
				. "Host: " . $server_host . "\n"
				. "Connection: Close\n"
				. "\n"
				
				. "";
	
	
	// possible errors lead to the xmlCache not being (re-)set
	$xml = LinkLiftPlugin::get_page_content( $server_host, $request );
	
	
	
	// saving the received XML to instance-property "xml_cache"
	if (false !== strpos($xml, "<?xml"))
		$this->setXmlCache( strstr($xml, "<?xml"), $update_time = true );
} //ll_retrieve_xml_from_ll_server()

/**
 * The method parses the textlink-data to your adspace out of a String given in XML-format.
 * Usually, the delivered string contains the XML-data either just received from the LinkLift-server or read out of the local XML-file.
 * The method returns a multi-dimensional Array of textlinks containing information like link_url, link_text, link_prefix, link_postfix, and so on.
 * The method is invoked by ll_textlink_code() after calling either ll_retrieve_xml_from_ll_server() or ll_retrieve_xml_from_file_systems().
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2006-09-18, 2006-12-03, 2007-12-10
 * @param $xml string The textlink-data as String and in XML-format that either has just been received from the LinkLift-server or read out of the local XML-file, may be left empty in order to save the instance's xml_cache.
 * @return array of textlink-data. Each element is representing one actual textlink on your website in that it contains information like link_url, link_text, link_prefix, link_postfix, and so on.
 */
function ll_retrieve_textlink_data_from_xml( $xml = "" )
{
	if (empty($xml))
		$xml = $this->getXmlCache();
	
	
	// well-formedness of XML is assumed!
	$textlink_data_fields =
				array(	
						  "prefix"
						, "url"
						, "text"
						, "postfix"
						
						, "rss_prefix"
						, "rss_url"
						, "rss_text"
						, "rss_postfix"
					);
	
	$plugin_fields =
				array(	
						  "language"
						, "version"
						, "pl_date"
					);
	
	$xml_fields = array_merge($textlink_data_fields, $plugin_fields);
	
	
	
	$parsed_xml_array = array();
	foreach ($xml_fields as $field)
	{
		preg_match_all ('!<' . $field . '[^>]*>(.*?)</' . $field . '>!im', $xml, $parsed_xml_array[$field], PREG_SET_ORDER);
	} //foreach($field)
	
	
	
	// ### Extracting plugin-data #################################################
	
	$server_plugin   = array();
	$plugin_to_save  = -1;
	foreach ($plugin_fields as $field)
	{
		foreach ($parsed_xml_array[$field] as $nr => $value)
		{
			if (   ("language" == $field)
				&& ($this->plugin_language == $value[1])   )
			{
				$plugin_to_save = $nr;
			} //if;
			
			$server_plugin[$nr][$field] = $value[1];
		} //foreach($value)
	} //foreach($field)
	
	if (! empty($server_plugin[$plugin_to_save]))
		LinkLiftPlugin::ll_save_plugin_data( $server_plugin[$plugin_to_save] );
	
	
	
	// ### Extracting textlink-data ###############################################
	
	$textlink_data   = array();
	foreach ($textlink_data_fields as $field)
	{
		foreach ($parsed_xml_array[$field] as $nr => $value)
		{
			$parsed_value = $value[1];
			
			// LinkLift may use CData-elements in its XML-feeds that can be recognised by XML-parsers.
			$parsed_value = str_replace(array("<![CDATA[", "]]>"), "", $parsed_value);
			
			$textlink_data[$nr][$field] = $parsed_value;
		} //foreach($value)
	} //foreach($field)
	
	
	return $textlink_data;
} //ll_retrieve_textlink_data_from_xml()

/**
 * The method retrieves textlink-data to your adspace from the local XML-file (i.e. the file-system).
 * The data is read in XML-format and contains information about all textlinks currently booked on your adspace.
 * Usually, the local XML-file gets updated after a certain period of time by calling ll_retrieve_xml_from_ll_server().
 * The read XML is saved as instance-property xml_cache.
 * The method is invoked by ll_textlink_code() if there is a local XML-file and it is not out-of-date.
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2006-09-18
 * @return void
 */
function ll_retrieve_xml_from_file_system()
{
	$xml = "";
	
	$xml_filename = $this->getXmlFilename();
	
	if (   (file_exists($xml_filename))
		&& (is_readable($xml_filename))
		&& ($xmlfile = fopen($xml_filename, "r"))   )
	{
		$xml = fread($xmlfile, filesize($xml_filename));
		fclose($xmlfile);
		
		
		$this->setXmlCache( $xml, $update_time = false );
	} //if
} //ll_retrieve_xml_from_file_system()

/**
 * The method writes textlink-data to your adspace into the local XML-file (i.e. the file-system).
 * The data is received in XML-format and contains information about all textlinks currently booked on your adspace.
 * Usually, the delivered textlink-data has just been received, i.e. downloaded, from the LinkLift-server using ll_retrieve_xml_from_ll_server().
 * The method is invoked by ll_textlink_code() after calling ll_retrieve_xml_from_ll_server() and if the received data exceeds a certain length (of bytes).
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2006-09-18
 * @param $xml string The textlink-data in XML-format that, usually, has just been received from the LinkLift-server, may be left empty in order to save the instance's xml_cache.
 * @return void
 */
function ll_write_xml_to_file_system( $xml = "" )
{
	if (empty($xml))
		$xml = $this->getXmlCache();
	
	$xml_filename = $this->getXmlFilename();
	
	if ($xmlfile = fopen($xml_filename, "w"))
	{
		fwrite($xmlfile, $xml);
		fclose($xmlfile);
	} //if
} //ll_write_xml_to_file_system()

/**
 * The method generates a textlink-array like the one created by ll_retrieve_textlink_data_from_xml() out of LinkLift's XML-feed.
 * If no debug-mode is active the generated array will be empty, otherwise, contain a textlink depending on the current debug-mode.
 * The method is invoked by ll_textlink_code().
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-17
 * @return array associative array containing textlinks that can be displayed within the generated HTML-code
 */
function get_debug_links()
{
	$debug_links = array();
	
	if ( LL_DEBUG_MODE )
	{
		if (function_exists( "md5" ))
			$md5_answer = md5( LL_PLUGIN_SECRET );
		else
			$md5_answer = "";
		
		// displaying an "answer" to the DEBUG_MODE-request
		if (1 != LL_DEBUG_MODE)
			$debug_links[] = array("text" => "Debug-Mode {" . LL_DEBUG_MODE . "} - (" . $md5_answer . ")", "url" => "http://www.linklift.com/?ref=518fcf64240", "prefix" => "[-- ", "postfix" => " --]");
		
		
		
		// see above for the purposes of the following debug-modes
		switch( LL_DEBUG_MODE )
		{
			case (1):
				$debug_links[] = array("text" => "30 Chars TextLink text - &#228;&#223;&#263;&#322;&#261;", "url" => "http://www.linklift.com/?ref=518fcf64240", "prefix" => "", "postfix" => "");
				break;
			
			
			case (2):
				$debug_links[] = array("text" => "<!--" . $this->__toString() . "-->", "url" => "http://www.linklift.com/somefolder/someSecondFolder/some-third-folder/someFile.php?somequery=1&someQuery=value&some-query=true&", "prefix" => "", "postfix" => "");
				break;
			
			
			case (3):
				$debug_links[] = array("text" => "<!--" . $this->getXmlCache() . "-->", "url" => "http://www.linklift.com/", "prefix" => "", "postfix" => "");
				break;
			
			
			case (4):
				$external_array = array(  "LL_WEBSITE_KEY"
										, "LL_PLUGIN_LANGUAGE"
										, "LL_PLUGIN_VERSION"
										, "LL_PLUGIN_DATE"
										, "LL_PLUGIN_CREATION_DATE"
										, "LL_PLUGIN_SECRET"
										, "LL_DATA_TIMEOUT"
										);
				$external_array = array_map( create_function('$element', 'return $element . "=" . constant($element);'), $external_array );
				
				$external_data =  implode( " / ", $external_array );
				
				
				$debug_links[] = array("text" => "<!--" . $external_data . "-->", "url" => "http://www.linklift.com/", "prefix" => "", "postfix" => "");
				break;
			
			
			case (10):
				$debug_links[] = array("text" => "<!--" . __FILE__ . "-->", "url" => "http://www.linklift.com/", "prefix" => "", "postfix" => "");
				break;
			
			
			
			
			
			case (99):
				$debug_links[] = array("text" => "1,2,3,4,5,10,99", "url" => "http://www.linklift.com/", "prefix" => "", "postfix" => "");
				break;
			
		} //switch(LL_DEBUG_MODE)
	} //if
	
	return $debug_links;
} //get_debug_links()

/**
 * This method is the actual "main"-method of the LinkLift-plugin.
 * The method
 *  - retrieves textlink-data to your adspace from the LinkLift-server and stores it in a local XML-file (for reuse) - calling ll_retrieve_xml_from_ll_server();
 *      or retrieves the textlink-data from that local XML-file in order to minimize outbound-traffic - calling ll_retrieve_xml_from_file_systems().
 *  - parses the downloaded or read textlink-data in XML-format into an utilisable array of textlinks - calling ll_retrieve_textlink_data_from_xml().
 *  - generates and outputs plain HTML-links using some CSS-styles in order to obtain the looks you chose on the LinkLift-website;
 *      intentionally, the generated code tries to be as ordinary as possible in order to integrate best with your own HTML-code.
 * 
 * No value is returned since the generated HTML-code is directly outputted to your website (except for delivering $return = true).
 * The method is invoked either at the end of the plugin (using PHP-plugin) or at the position of your choice within your website or blog (using one of the CMS-/Blog-software-plugins).
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2006-09-18, 2006-12-03, 2007-10-26
 * @param $return boolean Indicating whether the generated HTML-code should be returned ($return == true), or written to standard-out (echo); default: false.
 * @return the generated HTML-code containing your current textlinks, or void if ($return == false), then, HTML will be written to standard-out.
 */
function ll_textlink_code( $return = false )
{
	$linklift_website_key = $this->getWebsiteKey();
	
	
	$this->setXmlCache( LinkLiftPlugin::ll_get_option("linklift_data_" . $this->getWebsiteKey(), "") );
	$this->setXmlCacheTime( LinkLiftPlugin::ll_get_option("linklift_time_" . $this->getWebsiteKey(), 0) );
	
	// retrieving data from LL-server
	if (   ($this->getXmlCacheTime() < time() - 3600)
		|| (40 > strlen( $this->getXmlCache() ))   )
	{
		$this->ll_retrieve_xml_from_ll_server();
		
		update_option("linklift_data_" . $this->getWebsiteKey(), $this->getXmlCache());
		update_option("linklift_time_" . $this->getWebsiteKey(), $this->getXmlCacheTime());
	} //if
	
	
	
	
	// parsing XML-data
	$textlink_data = $this->ll_retrieve_textlink_data_from_xml();
	
	if (! is_array($textlink_data))
		return "";
	
	// a possible debug-mode helping to analyse problems or functionality of the plugin
	$debug_links = $this->get_debug_links();
	$textlink_data = array_merge( $debug_links, $textlink_data );
	
	// filtering testlinks, links that should not be shown or are shown elsewhere, and special LinkLift-links
	foreach ($textlink_data as $key => $link)
	{
		// if a certain subset of textlinks has been specified by links_to_show, the current textlink has to be part of it in order to be shown
		$links_to_show = $this->getLinksToShow();
		if (   (! empty($links_to_show))
			&& (! in_array($key, $links_to_show))   )
		{
			unset($textlink_data[$key]);
		} //if
		
		// filtering testlinks and special LinkLift-links, these are links containing the plugin's secret in their URL ...
		if (   (0 < strlen(LL_PLUGIN_SECRET))
			&& (false !== strpos($link["url"], LL_PLUGIN_SECRET))
			&& (! LL_SECRET_MODE)   )
		{
			unset($textlink_data[$key]);
		} //if
	} //foreach($link)
	
	// if there are no textlinks at this time the plugin will not display anything.
	if (0 >= count($textlink_data))
		return "";
	
	
	
	
	// creating and outputting textlinks
	// generating HTML-links
	// ---------------------------------------------------------------------------v
	
	// the appearance of the generated HTML-links depends on
		// - the default values as chosen on LinkLift's own plug-in-generation-panel
		// - the parameters that have been chosen within the configuration page of your LinkLift-plugin (if possible)
	// --- CSS-parameters ----------------------------------------
	$number_of_links_per_row = LinkLiftPlugin::ll_get_option( "linklift_links_per_row_"        . $linklift_website_key , 1);
	
	$styles_ul   = array();
	$styles_li   = array();
	$styles_a    = array();
	
	$styles_li[] = 'width:' . floor(100 / $number_of_links_per_row -1) . '%;';
	
	$styles_ul[] = "background-color:" . LinkLiftPlugin::ll_get_option( "linklift_css_background_color_" . $linklift_website_key , "") . ";";
	$styles_ul[] = "border:0px none #FFFFFF;";
	
	
	
	
	$styles_a[] = "font-size:" . LinkLiftPlugin::ll_get_option( "linklift_css_font_size_"        . $linklift_website_key , "12px") . ";";
	$styles_a[] = "color:" . LinkLiftPlugin::ll_get_option( "linklift_css_color_"            . $linklift_website_key , "") . ";";
	
	
	
	
	
	
	// --- style-attributes --------------------------------------
	if (function_exists("array_filter"))
	{
		$styles_ul = array_filter( $styles_ul, create_function('$style', 'return (strpos($style,":;") === false);') );
		$styles_li = array_filter( $styles_li, create_function('$style', 'return (strpos($style,":;") === false);') );
		$styles_a  = array_filter( $styles_a , create_function('$style', 'return (strpos($style,":;") === false);') );
	} //if
	
	// --- style-attributes --------------------------------------
	$css_ul      = ' style="' . implode(' ', $styles_ul) . '"';
	$css_li      = ' style="' . implode(' ', $styles_li) . '"';
	$css_a       = ' style="' . implode(' ', $styles_a ) . '"';
	
	// the following condition will evaluate to true
		// if you have chosen not to use CSS-styles within the generated HTML-links
	if (LinkLiftPlugin::ll_get_option( "linklift_no_css_use_theme_"     . $linklift_website_key , true))
	{
		$css_ul = '';
		$css_a  = '';
		
		if ($number_of_links_per_row <= 1)
			$css_li = '';
	} //if-else
	
	
	
	// --- HTML-Tags ---------------------------------------------
	$tag_ul1     = '<ul' . $css_ul . '>';
	$tag_ul2     = '</ul>';
	$tag_li1     = '<li' . $css_li . '>';
	$tag_li2     = '</li>';
	
	// the following condition will evaluate to true
		// if you have chosen not to use the HTML-tags <ul> and <li> within the generated HTML-links
	if (LinkLiftPlugin::ll_get_option( "linklift_no_html_tags_"         . $linklift_website_key , false))
	{
		$tag_ul1 = '';
		$tag_ul2 = '';
		$tag_li1 = '';
		$tag_li2 = '<br />';
	} //if-else
	
	
	
	// --- HTML --------------------------------------------------
	$line_break		= "\n";
	$indentation	= "";
	
	$output 		= $line_break
					. $indentation
					
					. $tag_ul1
					. $line_break;
	
	foreach ($textlink_data as $key => $link)
	{
		$output    .= $indentation
					. ( (empty($line_break)) ? ("") : ("\t") )			// no indentation if there are no linebreaks
					
					. $tag_li1
					. 	$link["prefix"]
					. 	'<a' . $css_a . ' href="'.$link["url"].'">'		// you may add  target="_self"  in order to give the link full strength
					. 		$link["text"]
					. 	'</a>'
					. 	$link["postfix"]
					. $tag_li2
					
					. $line_break;
	} //foreach($link)
	
	$output 	   .= $indentation
					
					. $tag_ul2
					. $line_break;
	
	// ---------------------------------------------------------------------------^
	
	
	
	// usually, the generated HTML-content is written to standard-out
		// however, you may choose that the method returns the code
	if ($return)
		return $output;
	else
		echo $output;
	
} //ll_textlink_code()







/**
 * The method adds another action on thw Wordpress "admin_menu"-signal.
 * 
 * The method gets invoked as an action on the Wordpress "init"-signal.
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-05-04
 * @return void
 */
function linklift_init()
{
	// adding a new submenu-page to the admin's menu
	add_action( "admin_menu", array("LinkLiftPlugin", "linklift_config_page") );
} //linklift_init()

/**
 * Adds a new submenu-page to the admin-panel within Wordpress.
 * The new submenu-page contains the LinkLift-plugin-configuration-page
 *   created by the method linklift_configuration().
 * 
 * The method gets invoked as an action on the Wordpress "admin_menu"-signal.
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-05-04
 * @return void
 */
function linklift_config_page()
{
	// adding the LinkLift-configuration page to ...
	if ( function_exists("add_submenu_page") )
	{
		// ... plugins-menu / -tab
		if (file_exists(LL_WORDPRESS_FILE_PLUGINS))
		{
			add_submenu_page(	  $parent       = LL_WORDPRESS_FILE_PLUGINS
								, $page_title   = LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TAB_TITLE')
								, $menu_title   = LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TAB_TITLE')
								, $access_level = "manage_options"
								, $file         = LL_PLUGIN_MENU_FILENAME
								, $function     = array("LinkLiftPlugin", "linklift_configuration")
							);
		} //if
		
		// ... the general options-menu / -tab
		if (file_exists(LL_WORDPRESS_FILE_OPTIONS_GENERAL))
		{
			add_submenu_page(	  $parent       = LL_WORDPRESS_FILE_OPTIONS_GENERAL
								, $page_title   = LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TAB_TITLE')
								, $menu_title   = LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TAB_TITLE')
								, $access_level = "manage_options"
								, $file         = LL_PLUGIN_MENU_FILENAME
								, $function     = array("LinkLiftPlugin", "linklift_configuration")
							);
		} //if
	} //if
} //linklift_config_page()

/**
 * Returns the localised text (or value) of a given text-key.
 * If the (Wordpress/CMS-) software's preset language is available to the plug-in
 *   the returned translation will be language-specific, otherwise english.
 * 
 * The method also replaces type_specifiers (like knwon from sprintf) within the localised text.
 *   Thus, you can fill the localised texts with dynamic (language-independent) values.
 * The replacements have to be delivered as String-array.
 *   If the localised text does not contain enough type-specifiers for all given replacements the remaining will be omitted.
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-05-02, 2007-06-10
 * @param $key_text string, the text to be translated
 * @param $replacements array of string-replacements, replacing type_specifiers in the localised text; default: empty array
 * @return string, translated text of input-parameter
 */
function ll_translate( $key_text, $replacements = array() )
{
	$type_specifier = "%s";
	
	
	if (defined($key_text))
		$localised_text		= constant($key_text);
	else
		$localised_text = $key_text;
	
	
	// if a string is given instead of an array ...
	if (! is_array($replacements))
		$replacements = array( $replacements );
	
	// avoiding a warning by vsprintf
	while (count($replacements) < substr_count($localised_text, $type_specifier))
		$replacements[] = "";
	
	
	// the actual replacement of %s-placeholders
	$localised_text = vsprintf( $localised_text, $replacements );
	
	
    return $localised_text;
} //ll_translate()

/**
 * Returns the value to a given key of the Wordpress-option-table (wp_options).
 * Other than Wordpress' own function get_option()
 *   this method will return a default_value rather than FALSE if the given key is undefined in the Wordpress-options-table (wp_options).
 * The default value can be delivered as second parameter.
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-06-10
 * @param $options_table_key string, the key of the value to be retrieved from the Wordpress-options-table (wp_options)
 * @param $default_value mixed, the default value that should be returned if the given key is undefined in the Wordpress-options-table (wp_options), default: "" (empty string)
 * @return string, the value to the given key retrieved from the Wordpress-options-table (wp_options), or $default_value if the given key is undefined
 */
function ll_get_option( $options_table_key, $default_value = "" )
{
	$options_table_value = get_option($options_table_key);
	
	// if a given key does not exist in the Wordpress-options-table
		// get_option returns false
	if (false === $options_table_value)
		return $default_value;
	else
		return $options_table_value;
} //ll_get_option()

/**
 * Persists a variable value to the CMS-database, such that it can be retrieved when the plugin runs again.
 * Note: If the given variable-name already exists it will be overridden, returning the former value
 *       otherwise it will be created with the given value.
 * Note: The given value can be of any type, but must be serializable.
 * CMS-specific-plugin-function.
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-21
 * @param $options_table_key string, the variable-name, the given value can be retrieved again with
 * @param $new_value mixed, the variable-value to be persisted in the CMS-database
 * @return string, the former value of the variable, or false if the variable did not exist before
 */
function ll_set_option( $options_table_key, $new_value = "" )
{
	$former_value_default = false;
	
	$former_value = LinkLiftPlugin::ll_get_option( $options_table_key, $former_value_default );
	
	
	update_option( $options_table_key, $new_value );
	
	return $former_value;
} //ll_set_option()


/**
 * Saves new values of LinkLift's configuration-page to the Wordress-database, delivered by POST-request.
 * 
 * The method gets invoked by the methods linklift_configuration() and widget_linklift_control().
 * class-method ("static")
 *
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-05-04
 * @param $force_saving boolean, an optional parameter, deliver true if you do not want the method to check wether a Wordpress-form has sent the information; default: false.
 * @return void
 */
function ll_update_plugin( $force_saving = false )
{
	if (   (isset($_POST['submit']) )
		|| ($force_saving)   )
	{
		// possible values of the LinkLift-plug-in's configuration page
		$options_array = array(
								  "linklift_website_key"
								, "linklift_title"
								, "linklift_no_css_use_theme"
								, "linklift_no_html_tags"
								, "linklift_links_per_row"
								, "linklift_css_font_size"
								, "linklift_css_color"
								, "linklift_css_background_color"
								);
		
		$linklift_website_key = ( (! empty($_POST["linklift_website_key"])) ? ($_POST["linklift_website_key"]) : ("") );
		
		
		foreach ( $options_array as $option )
		{
			// checkbox-values may not be delivered if the checkbox was left empty ...
				// in order to distinguish between forms that did not contain the checkbox and forms where the checkbox was left empty
				// another hidden field gives us the hint that the field was part of the form and was left empty (on purpose)
			if (   (in_array($option, array("linklift_no_css_use_theme", "linklift_no_html_tags"), $strict = true))
				&& (isset($_POST[$option . "_modified"]))
				&& (! isset($_POST[$option]))   )
			{
				$_POST[$option] = 0;
			} //if
			
			if (isset($_POST[$option]))
			{
				if ("linklift_website_key" != $option)
					$option_postfix = "_" . $linklift_website_key;
				else
					$option_postfix = "";
				
				update_option( $option . $option_postfix, $_POST[$option] );
			} //if
		} //foreach($option)
		
	} //if
} //ll_update_plugin()

/**
 * Saves the latest server-properties (e.g. plugin-version) of the plugin extracted from the received textlink-data-XML-feed.
 * At this time, the method expects the delivered associative array to contain the following fields:
 *   - language: the plugin's programming-/code-language
 *   - version:  the plugin's current version on the LinkLift-server
 *   - date:     the release-date of the latest plugin's version 
 * 
 * The method will ignore empty values (properties).
 * 
 * The method gets invoked by the method ll_retrieve_textlink_data_from_xml().
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-12-10
 * @param $server_plugin array, associative array containing the plugin's properties / data; default: array().
 * @return void
 */
function ll_save_plugin_data( $server_plugin = array() )
{
	if (! empty($server_plugin["language"]))
		update_option(LL_OPTION_SERVER_LANGUAGE, $server_plugin["language"]);
	
	if (! empty($server_plugin["version"]))
		update_option(LL_OPTION_SERVER_VERSION , $server_plugin["version"]);
	
	if (! empty($server_plugin["date"]))
		update_option(LL_OPTION_SERVER_DATE    , $server_plugin["date"]);
} //ll_save_plugin_data()

/**
 * Creates the HTML-code for LinkLift's configuration-page within the Wordpress-admin-menu.
 * After the user makes changes to the configuration the values will be saved to the Wordpress-database.
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2007-05-04
 * @return void
 */
function linklift_configuration()
{
	LinkLiftPlugin::ll_update_plugin();
	
	
	$fieldset_style        = " BORDER:1px solid #CCC; PADDING:12px";
	$field_key_style       = " MARGIN-BOTTOM:5px";
	$field_key_style_tiny  = " MARGIN-BOTTOM:0px";
	$field_value_style     = " MARGIN-TOP:5px";
	
	$field_text_style      = " FONT-FAMILY:'Courier New', Courier, mono; FONT-SIZE:1.5em;";
	$field_text_style_tiny = " FONT-FAMILY:'Courier New', Courier, mono; FONT-SIZE:1.2em;";
	
	$css_top_padding       = " PADDING-TOP:30px; MARGIN-TOP:30px";
	
	$field_text_maxlength  = "15";
	$field_text_size       = "15";
	
	
	if (! empty($_GET["linklift_website_key"]))
	{
		$linklift_website_key = $_GET["linklift_website_key"];
	} else {
		// loads variable $linklift_website_key
		$linklift_website_key = LinkLiftPlugin::ll_get_option("linklift_website_key", "");
		if (empty($linklift_website_key))
			$linklift_website_key = LinkLiftPlugin::ll_translate( "LINKLIFT_WEBSITE_KEY" );
		
	} //if-else
	
	
	// used at least twice:
	$register_link_to_linklift = '<a href="' . LL_PLUGIN_REGISTER_LINK_URL . '" target="_blank" rel="nofollow">';
?>
	
	<?php if (! empty($_POST) )  :  ?>
		<div id="message" class="updated fade">
			<p>
				<strong>
					<?php _e("Options saved."); ?>
				</strong>
			</p>
		</div>
	<?php endif; ?>
	
	
	
	<div class="wrap">
		<h2>
			<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE'); ?>
		</h2>
		<div>
			<p>
				<?php
					echo LinkLiftPlugin::ll_translate('LINKLIFT_PLUGIN_DESCRIPTION_1', array($register_link_to_linklift, '</a>') );
				?>
			</p>
			
			<p>
				<span style="FONT-WEIGHT:bold;">
					<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_PLUGIN_DESCRIPTION_2'); ?>
				</span>
				<br />
				
				<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_PLUGIN_DESCRIPTION_3'); ?>
			</p>
			
			<p>
				<?php
					if (LL_WORDPRESS_WIDGETS_INSTALLED)
						$link_url_to_widgets = LL_WORDPRESS_FILE_WIDGETS . "linklift_website_key=" . $linklift_website_key . "&";
					else
						$link_url_to_widgets = "http://automattic.com/code/widgets/";
					
					
					
					$link_to_widgets      =	  '<a href="' . $link_url_to_widgets . '" target="_self">'
											.   'Widgets'
											. '</a>'
											. '';
											
					$linklift_widget_name =	  '<span style="FONT-WEIGHT:bold;">'
											.   '&quot;'
											.   LL_PLUGIN_NAME
											.   '&quot;'
											. '</span>'
											. '';
				?>
				
				<span style="FONT-WEIGHT:bold;">
					<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_INSTALLATION_INSTRUCTIONS_1'); ?>
				</span>
				
			</p>
			
			
			<ol>
				<li>
					<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_INSTALLATION_INSTRUCTIONS_2', array($link_to_widgets, $linklift_widget_name) ); ?>
					<br />
					<br />
				</li>
				
				<li>
					<?php
						$link_to_theme_editor =	  '<a href="' . LL_WORDPRESS_FILE_THEME_EDITOR . '" target="_self">'
												.   'Themes/Theme-Editor'
												. '</a>'
												. '';
						$code_snippet_to_paste = htmlspecialchars('<?php if (is_callable(array("LinkLiftPlugin", "execute")))  LinkLiftPlugin::execute(); ?>', ENT_QUOTES);
					?>
					
					
					<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_INSTALLATION_INSTRUCTIONS_3', array($link_to_theme_editor) ); ?>
					<br />
					<br />
					
					<span style="COLOR:#FF0000; FONT-WEIGHT:bold;">
						<?php echo $code_snippet_to_paste; ?>
					</span>
					<br />
					<br />
					
					<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_INSTALLATION_INSTRUCTIONS_4'); ?>
				</li>
			</ol>
			
			
			<p>
				<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_INSTALLATION_INSTRUCTIONS_5'); ?>
				<br />
			</p>
			
			
			
			
			<form action="" method="post" id="linklift-conf" style="MARGIN-TOP:30Px;">
				
				<fieldset style="<?php echo $fieldset_style; ?>">
					<legend>
						<b>
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_HEADLINE_GENERAL'); ?>
						</b>
					</legend>
					
					
					<h3 style="<?php echo $field_key_style; ?>">
						<label for="key">
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_WEBSITE_KEY'); ?>
						</label>
					</h3>
					
					<p style="<?php echo $field_value_style; ?>">
						<input id="linklift_website_key" name="linklift_website_key" type="text" size="15" maxlength="15" value="<?php echo $linklift_website_key; ?>" style="<?php echo $field_text_style; ?>" />
						
						<?php
							$linklift_url_linklift_website_key = "http://www.linklift.es/faq/clave-website-linklift/?ref=518fcf64240";
						?>
						(<a href="<?php echo $linklift_url_linklift_website_key; ?>" target="_blank" rel="nofollow">
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_WEBSITE_KEY_EXPLANATION_LINK'); ?>
						</a>)
						
						<div class="description">
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_WEBSITE_KEY'); ?>
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_WEBSITE_KEY_2', array($register_link_to_linklift, '</a>') ); ?>
						</div>
					</p>
					
					
					<h3 style="<?php echo $field_key_style; ?>">
						<label for="key">
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_PLUGIN_HEADLINE'); ?>
						</label>
					</h3>
					
					<p style="<?php echo $field_value_style; ?>">
						<input id="linklift_title" name="linklift_title" type="text" size="30" value="<?php echo LinkLiftPlugin::ll_get_option("linklift_title_" . $linklift_website_key, "recomendaciones"); ?>" style="<?php echo $field_text_style; ?>" />
						
						<?php
							$linklift_url_link_marking			= "http://www.linklift.es/faq/etiquetado-enlace/?ref=518fcf64240";
							$link_to_linklift_faq_link_marking	= '<a href="' . $linklift_url_link_marking . '" target="_blank" rel="nofollow">';
						?>
						<div class="description">
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_PLUGIN_HEADLINE'); ?>
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_PLUGIN_HEADLINE_2', array($link_to_linklift_faq_link_marking, '</a>') ); ?>
						</div>
					</p>
				</fieldset>
				
				
				
				
				
				<fieldset style="<?php echo $fieldset_style; ?> <?php echo $css_top_padding; ?>">
					<legend>
						<b>
							<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_HEADLINE_OPTIONAL'); ?>
						</b>
					</legend>
					
					<p>
						<?php
							echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TEXT_OPTIONAL_VALUES');
						?>
					</p>
					
					
					<?php
						$form = array();
							
						$form["linklift_no_css_use_theme"]
							= array(
									  "#type"          => "checkbox"
									, "#default_value" => LinkLiftPlugin::ll_get_option( "linklift_no_css_use_theme_"     . $linklift_website_key , true)
									, "#title"         => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_NO_CSS')
									, "#description"   => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_NO_CSS')
									);
						
						$form["linklift_no_html_tags"]
							= array(
									  "#type"          => "checkbox"
									, "#default_value" => LinkLiftPlugin::ll_get_option( "linklift_no_html_tags_"         . $linklift_website_key , false)
									, "#title"         => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_NO_HTML')
									, "#description"   => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_NO_HTML')
									);
						
						$form["linklift_links_per_row"]
							= array(
									  "#type"          => "select"
									, "#options"       => array (1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 10 => 10)
									, "#default_value" => LinkLiftPlugin::ll_get_option( "linklift_links_per_row_"        . $linklift_website_key , 1)
									, "#title"         => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_LINKS_PER_ROW')
									, "#description"   => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_LINKS_PER_ROW')
									);
						
						
						$font_sizes = array();
						for ($i = 10; $i <= 18; $i++)
							$font_sizes[$i . "px"] = $i . "px";
						
						$form["linklift_css_font_size"]
							= array(
									  "#type"          => "select"
									, "#options"       => $font_sizes
									, "#default_value" => LinkLiftPlugin::ll_get_option( "linklift_css_font_size_"        . $linklift_website_key , "12px")
									, "#title"         => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_FONT_SIZE')
									, "#description"   => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_FONT_SIZE')
									);
						
						$form["linklift_css_color"]
							= array(
									  "#type"          => "textfield"
									, "#size"          => 20
									, "#maxlength"     => 20
									, "#default_value" => LinkLiftPlugin::ll_get_option( "linklift_css_color_"            . $linklift_website_key , "")
									, "#title"         => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_LINK_COLOR')
									, "#description"   => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_LINK_COLOR')
									);
						
						$form["linklift_css_background_color"]
							= array(
									  "#type"          => "textfield"
									, "#size"          => 20
									, "#maxlength"     => 20
									, "#default_value" => LinkLiftPlugin::ll_get_option( "linklift_css_background_color_" . $linklift_website_key , "")
									, "#title"         => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_BG_COLOR')
									, "#description"   => LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_BG_COLOR')
									);
						
						
						foreach ($form as $name => $element)
						{
							?>
							<h5 style="<?php echo $field_key_style_tiny; ?>">
								<label for="key">
									<?php echo $element["#title"]; ?>
								</label>
							</h5>

							<p style="<?php echo $field_value_style; ?>">
						<?php
							
							$current_value = LinkLiftPlugin::ll_get_option($name . "_" . $linklift_website_key, $element["#default_value"]);
							
							
							switch ($element["#type"])
							{
								case ("textfield"):
								{
									?>
									<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo $current_value; ?>" size="<?php echo ( (isset($element["#size"])) ? ($element["#size"]) : ($field_text_size) ); ?>" maxlength="<?php echo ( (isset($element["#maxlength"])) ? ($element["#size"]) : ($field_text_maxlength) ); ?>" style="<?php echo $field_text_style_tiny; ?>" />
								<?php
									
									break;
								} //case()
								
								case ("select"):
								{
									?>
									<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
									<?php	foreach ($element["#options"] as $key => $value) :  ?>
										<option value="<?php echo $key; ?>" <?php echo ( ($key == $current_value) ? ('selected="selected"') : ('') ); ?>>
											<?php echo $value; ?>
										</option>
									<?php	endforeach;  ?>
									</select>
								<?php
									
									break;
								} //case()
								
								case ("checkbox"):
								{
									?>
									<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="1" <?php echo ( ($current_value) ? ('checked="checked"') : ('') ); ?> />
									<input type="hidden" name="<?php echo $name; ?>_modified" id="<?php echo $name; ?>_modified" value="1" />
								<?php
									
									break;
								} //case()
								
							} //switch($element["#type"])
							
							?>
								<div class="description">
									<?php echo $element["#description"]; ?>
								</div>
							</p>
						<?php
							
						} //foreach($element)
						
					?>
					
					
					<br />
				</fieldset>
				
				
				
				<p class="submit" style="text-align:left;">
					<input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" />
				</p>
				
			</form>
			
			
			<p style="<?php echo $css_top_padding; ?>">
				LinkLift Plugin 
					<?php
						echo '(', LL_PLUGIN_LANGUAGE, ')';
					?>,
				Version
					<?php
						echo LL_PLUGIN_VERSION;
					?>
					<?php
						echo '(', LL_PLUGIN_DATE, ')';
					?>.
				<br />
				
				<?php
					// do you (still) own the latest version?
					$server_plugin_version = LinkLiftPlugin::ll_get_option( LL_OPTION_SERVER_VERSION, 0 );
					
					if ($server_plugin_version > LL_PLUGIN_VERSION)
						echo LinkLiftPlugin::ll_translate('LINKLIFT_PLUGIN_OUT_OF_DATE');
					elseif ($server_plugin_version == LL_PLUGIN_VERSION)
						echo LinkLiftPlugin::ll_translate('LINKLIFT_PLUGIN_UP_TO_DATE');
				?>
			</p>
		</div>
	</div>
	
<?php
	
} //linklift_configuration()

/**
 * Update-hook for the LinkLift-Wordpress-Textlink-plugin.
 * Checks if there is a newer version of thie plugin available on the LinkLift-server
 *   and offers a download-link.
 * Prints data to standard-out if you do not own the latest version of this LinkLift-plugin.
 * class-method ("static")
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-02-16
 * @return void
 */
function ll_update_nag()
{
	global $wp_version, $pagenow;
	
	
	// update-information of this plugin is only shown on the Wordpress-plugins-page!
	if (   (false === strpos( strtolower($pagenow)					, "plugins"		))
		&& (false === strpos( strtolower($_SERVER["REQUEST_URI"])	, "plugins.php"	))   )
	{
		return;
	} //if
	
	
	
	// the LinkLift-server may have been checked before
	$server_plugin_version				= LinkLiftPlugin::ll_get_option( LL_OPTION_SERVER_VERSION, 0 );
	// date of the last check
	$server_plugin_version_check_date	= LinkLiftPlugin::ll_get_option( LL_OPTION_SERVER_VERSION_CHECK_DATE, 0 );
	
	
	// no need to check more than once a week!
	if (   (LL_PLUGIN_VERSION >= $server_plugin_version)
		&& ($server_plugin_version_check_date < strtotime(LL_UPDATE_CHECK_TIMEFRAME))   )
	{
		$plugin_info = LinkLiftPlugin::ll_get_current_plugin_info( "WordPress/" . $wp_version . "; " . get_bloginfo("url") );
		
		if (   (empty($plugin_info))
			|| (! isset($plugin_info["plugin_version"]))   )
		{
			return;
		} //if
		
		
		$server_plugin_version = $plugin_info["plugin_version"];
		
		LinkLiftPlugin::ll_set_option( LL_OPTION_SERVER_VERSION				, $server_plugin_version );
		LinkLiftPlugin::ll_set_option( LL_OPTION_SERVER_VERSION_CHECK_DATE	, time() );
	} //if
	
	
	
	// a new version of this plugin is available on the LinkLift-server!
	if (LL_PLUGIN_VERSION < $server_plugin_version)
	{
		// is admin user?
		if ( current_user_can("manage_options") )
		{
			$download_url		= LinkLiftPlugin::ll_get_update_plugin_url();
			$opening_link_tag	= sprintf('<a href="%s">', $download_url);
			$closing_link_tag	= "</a>";
			
			
			$msg = sprintf( LinkLiftPlugin::ll_translate( "LINKLIFT_PLUGIN_OUT_OF_DATE_COMPLETE_ADMIN", array($opening_link_tag, $closing_link_tag)) );
			
		} else {
			$msg = LinkLiftPlugin::ll_translate( "LINKLIFT_PLUGIN_OUT_OF_DATE_COMPLETE_USER" );
		} //if-else
		
		
		echo sprintf( '<div id="update-nag">%s</div>', $msg );
	} //if
} //ll_update_nag()




/**
 * The widget-controller (Wordpress-Widget-Plugin) calls this method to generate the plugin's output.
 * The method extracts the plugin's title out of the Wordpress-database (options-table)
 *   and calls the plugin's main-function in order to generate your textlinks and the widget's body around.
 * 
 * The method is invoked by twosource().
 * class-method ("static")
 *
 * @author tomk32 (Thomas R. Koll), akniep (Andreas Rayo Kniep)
 * @since 2007-03-06
 * @param $args array, an associative array delivered by the Wordpress Plugin 'Wordpress Widgets'
 * @return void, the widget's body including your textlinks is written to standard-out
 */
function widget_linklift_main( $args )
{
	// extracts out of the given array of parameters the variables that are used below
	extract($args);
	
	
	$linklift_plugin_instance	=& LinkLiftPlugin::getInstance();
	$generated_html_code		=  $linklift_plugin_instance->ll_textlink_code( $return = true );
	
	
	// if there is no content at this time the widget will not display anything.
	if (empty($generated_html_code))
		return;
	
	
	$linklift_website_key		= $linklift_plugin_instance->getWebsiteKey();
	
	$linklift_title				= LinkLiftPlugin::ll_get_option("linklift_title_" . $linklift_website_key, "recomendaciones");
	
	
	echo	  $before_widget
			, "\n"
			, $before_title
			, $linklift_title
			, $after_title
			
			, $generated_html_code
			
			, $after_widget;
} //widget_linklift_main()

/**
 * The method generates an interface for editing the plugin's attributes / perameters.
 * At this time you can only manipulate the widget's title.
 * 
 * The method is invoked by the widget-controller.
 * class-method ("static")
 *
 * @author tomk32 (Thomas R. Koll), akniep (Andreas Rayo Kniep)
 * @since 2007-03-06
 * @return void, the interface is directly outputted to your website
 */
function widget_linklift_control()
{
	LinkLiftPlugin::ll_update_plugin($force_saving = TRUE);
	
	
	$field_key_style_tiny  = " MARGIN-BOTTOM:0px";
	$field_value_style     = " MARGIN-TOP:5px";
	$field_text_style_tiny = " FONT-FAMILY:'Courier New', Courier, mono; FONT-SIZE:1.2em;";
	$field_text_maxlength  = "15";
	$field_text_size       = "15";
	
	
	if (! empty($_GET["linklift_website_key"]))
	{
		$linklift_website_key = $_GET["linklift_website_key"];
	} else {
		// loads variable $linklift_website_key
		$linklift_website_key = LinkLiftPlugin::ll_get_option("linklift_website_key", "");
		if (empty($linklift_website_key))
			$linklift_website_key = LinkLiftPlugin::ll_translate( "LINKLIFT_WEBSITE_KEY" );
		
	} //if-else
	
?>
	<?php
		if (LL_LINKLIFT_CONFIGURATION_PAGE)  :
		
		$link_to_configuration =	  '<a href="' . LL_LINKLIFT_CONFIGURATION_PAGE . 'linklift_website_key=' . $linklift_website_key . '&" target="_self">'
									.   'LinkLift'
									. '</a>'
									. '';
		$linklift_widget_name =	  '<span style="FONT-WEIGHT:bold;">'
								.   LL_PLUGIN_NAME
								. '</span>'
								. '';
	?>
		<p>
			<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_WIDGETS_CONFIG_REMARK', array($link_to_configuration) ); ?>
			<br />
			<br />
		</p>
	<?php
		endif;
	?>
	
	<h5 style="<?php echo $field_key_style_tiny; ?>">
		<label for="key">
			<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_TITLE_PLUGIN_HEADLINE'); ?>
		</label>
	</h5>

	<p style="<?php echo $field_value_style; ?>">
		<input id="linklift_website_key" name="linklift_website_key" type="hidden" value="<?php echo( $linklift_website_key ); ?>" />
		<input id="linklift_title" name="linklift_title" type="text" value="<?php echo LinkLiftPlugin::ll_get_option("linklift_title_" . $linklift_website_key, "recomendaciones"); ?>"  size="<?php echo ( (isset($element["#size"])) ? ($element["#size"]) : ($field_text_size) ); ?>" maxlength="<?php echo ( (isset($element["#maxlength"])) ? ($element["#size"]) : ($field_text_maxlength) ); ?>" style="<?php echo $field_text_style_tiny; ?>" />
		
		<div class="description">
			<?php echo LinkLiftPlugin::ll_translate('LINKLIFT_CONFIG_DESCRIPTION_PLUGIN_HEADLINE'); ?>
		</div>
	</p>
<?php
	
} //widget_linklift_control()

/**
 * The method registers the LinkLift-plugin (-widget) with your widget-controller.
 * The widget controller is realised by the "Wordpress Widget-Plugin".
 * 
 * The method is invoked by the widget-controller, the action is added at the end of this plugin.
 * class-method ("static")
 *
 * @author tomk32 (Thomas R. Koll), akniep (Andreas Rayo Kniep)
 * @since 2007-03-06
 * @return void
 */
function widget_linklift_init()
{
	if (   (! function_exists( "register_sidebar_widget" ))
		|| (! function_exists( "register_widget_control" ))    )
		return;
	
	register_sidebar_widget( LL_PLUGIN_NAME, LL_PLUGIN_NAME );
	register_widget_control( LL_PLUGIN_NAME, array("LinkLiftPlugin", "widget_linklift_control") );
} //widget_linklift_init()



} // class LinkLiftPlugin

} //if (! class_exists("LinkLiftPlugin"))


if (! function_exists("twosource"))
{

/**
 * The widget-controller (Wordpress-Widget-Plugin) calls this method to generate the plugin's output.
 * This method wraps the plugin's widget-main-method LinkLiftPlugin::widget_linklift_main()
 *   in order to generate the widget's content.
 * 
 * @author akniep (Andreas Rayo Kniep)
 * @since 2008-01-02
 * @param $args array, an associative array delivered by the Wordpress Plugin 'Wordpress Widgets'
 * @return void
 */
function twosource( $args )
{
	return LinkLiftPlugin::widget_linklift_main( $args );
} //twosource()

} //if (! function_exists("twosource"))





if (is_callable("LinkLiftPlugin", "check_request"))
	LinkLiftPlugin::check_request($check_this_file = true);

// registering the LinkLift-plugin (mainly its configuration-page(s)) with the Wordpress-admin-menu
add_action( "init"			, array("LinkLiftPlugin", "linklift_init") );
// registering the LinkLift-widget with the widget-controller ("Wordpress Widget-Plugin")
add_action( "widgets_init"	, array("LinkLiftPlugin", "widget_linklift_init") );


// LinkLift-Update-Feature, introduced in Plugin v1.5 - Note: only working with Wordpress version v2.0.2 or above
add_action( "admin_notices"	, array("LinkLiftPlugin", "ll_update_nag") );

?>