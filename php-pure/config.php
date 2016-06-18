<?php
/**
 * @AUTHOR		Christian Marcell de Oliveira (chroda) <chroda@chroda.com.br>
 * @COPYRIGHT	Dev n' Quest 2014
 * @PACKAGE		DnQ LolC
 * @SINCE			July 2013
 * @VERSION		0.1
 *
 * Setup you project in 'Production' and 'Development' enviroments.
 */

ini_set("display_errors",'on');

// BASICS
define( '__APP_PACKAGE__'		,'chroda-twitter-like-app');
define( '__APP_TITLE__'			,strtoupper(__APP_PACKAGE__));
define( '__APP_VERSION__'		,'0.1');
define( '__APP_EMAIL__'			,'chroda@chroda.com.br');
define( '__APP_AUTHOR__'			,'Christian Marcell (chroda) '.__APP_EMAIL__);
//define( '__APP_DATABASE__'	,'mysql');
define( '__APP_DATABASE__'	,'firebase');

// DEFAULTS
define( '__DEBUG__'				,true);
define( '__DNS__'				,$_SERVER['SERVER_NAME']);
define( '__IP__'				,$_SERVER['SERVER_ADDR']);
define( '__HERE__'				,$_SERVER['REQUEST_URI']);
define( '__VIEW_EXT__'			,'.php');
define( '__TPL_EXT__'			,__VIEW_EXT__);
define( '__LOGGING__'			,true);
define( '__SESSION_NAME__'		,strtoupper(str_replace('\'','', str_replace(' ','',(__APP_PACKAGE__.'-'.__APP_TITLE__)))));
define( '__SESSION_TIMEOUT__'	,3600);
define( '__LOCALE__'			,'pt-br');
define( '__TIMEZONE_LOCAL__'	,'America/Sao_Paulo');
define( '__TIMEZONE_TIME__'		,'Etc/GMT+3');
define( '__ROOT__'				,str_replace('\\','/', dirname(__FILE__)).'/');
define( '__LIB_DIR__'			,__ROOT__		. 'lib/');
define( '__CONTROLLERS_DIR__'	,__ROOT__		. 'controllers/');
define( '__VIEW_PATH__'			,__ROOT__		. 'views/');
define( '__VIEW_CPT_PATH__'		,__VIEW_PATH__	. 'components/');
define( '__VIEW_USER_PATH__'	,__VIEW_PATH__	. 'user/');
define( '__VIEW_ADM_PATH__'		,__VIEW_PATH__	. 'admin/');

header( 'Accept-Charset:utf-8,ISO-8859-1;q=0.7,*;q=0.7"',true);
header( 'Content-Type: text/html; charset=UTF-8');
header( 'Expires: '.date( 'D, d m Y H:i:s' ).' GMT');
header( 'X-Powered-By: '.__APP_PACKAGE__.'/'.__APP_VERSION__ );
header( 'X-Server-Name: '. __DNS__);
header( 'X-Developer: '.__APP_AUTHOR__);

date_default_timezone_set( __TIMEZONE_LOCAL__ );
date_default_timezone_set( __TIMEZONE_TIME__ );

mb_internal_encoding( "UTF-8" );

// Basics Functions
require_once __LIB_DIR__.'functions.php';
// Specific App Functions
if(file_exists($appFunctions = __LIB_DIR__.'functions.'.trim(strtolower(str_replace(' ','',__APP_TITLE__))).'.php')){require_once $appFunctions;}

setlocale(LC_ALL, __LOCALE__ . ".UTF-8");

ini_set("display_errors",__DEBUG__);
ini_set('session.name',__SESSION_NAME__);
ini_set('session.cookie_lifetime',__SESSION_TIMEOUT__);
ini_set('session.use_trans_sid',true);

switch(__DNS__):
/**
 * Production.
 */
case 'production-url.com':
case 'www.production-url.com':
	define( '__ENV__', 'prod' );
	define( '__PATH__', '/' );
	break;

/**
 * Development.
 */
default:
	define( '__ENV__', 'dev' );
	define( '__PATH__','/var/www/html/'.__APP_PACKAGE__.'/application/');
	break;
endswitch;

require_once 'config.'.__APP_DATABASE__.'.php';

define('CDN_DIR',__PATH__ .'cdn/');

session_start();
