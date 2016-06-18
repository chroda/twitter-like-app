<?php
/**
 * @AUTHOR		Christian Marcell de Oliveira (chroda) <chroda@chroda.com.br>
 * @COPYRIGHT	Dev n' Quest 2014
 * @PACKAGE		DnQ LolC
 * @SINCE			July 2013
 * @VERSION		0.1
 *
 * ALERT: Don't change anything here, go to 'config.php' to set up your project.
 */

/**
 * Setting up and database connecting.
 */
require_once './config.php';

$_dir = '';
$_response = Array();

/**
 * Initializer.
 */
require_once __ROOT__.'init.php';
/**
 * Verifying the existence of the page.
 */
if(rewrite(1)==''||rewrite(1)==='index'||rewrite(1)==='home'):
	require_once(__VIEW_PATH__.'components/header.php');
	include_once(__VIEW_PATH__.'home'.__VIEW_EXT__);
	require_once(__VIEW_PATH__.'components/footer.php');
elseif(array_search(rewrite(1),$_SESSION['pages'])):
	require_once(__VIEW_PATH__.'components/header.php');
	include_once(__VIEW_PATH__.rewrite(1).__VIEW_EXT__);
	require_once(__VIEW_PATH__.'components/footer.php');
elseif(file_exists(__VIEW_PATH__.rewrite(1).__VIEW_EXT__)):
	/**
	 * Renders existing file (no header and no footer).
	 */
	include_once ( __VIEW_PATH__.rewrite(1).__VIEW_EXT__ );
else:
	/**
	 * Renders file of error 404.
	 */
	header("HTTP/1.0 404 Not Found");
	header("Status: 404 Not Found");
	require_once(__VIEW_CPT_PATH__.'header.php');
	require_once(__VIEW_CPT_PATH__.'error404.php');
	require_once(__VIEW_CPT_PATH__.'footer.php');
endif;
