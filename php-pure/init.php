<?php
/**
 * @AUTHOR Christian Marcell de Oliveira (chroda) <chroda@chroda.com.br>
 * @COPYRIGHT Dev n' Quest 2014
 * @PACKAGE DnQ LolC
 * @SINCE July 2013
 * @VERSION 0.1
 *
 * This file have purpose to serve and set before the file(required by user) be called.
 */

/**
 * Setting a locale.
 */
if (! isset( $_SESSION['user']['locale'] ) ){
 $_SESSION['user']['locale'] = __LOCALE__;
}

/**
 * Setting a platform.
 */
require_once __CONTROLLERS_DIR__.'Mobile_Detect.php';
$detect = new Mobile_Detect;
 $_SESSION['user']['platform']='desktop';
if($detect->isTablet()){$_SESSION['user']['platform']='tablet';}
if($detect->isMobile()){$_SESSION['user']['platform']='mobile';}

/**
 * Starting SEO.
 */
$_SESSION['seo'] = Array(
 'ptitle' => ($title = __APP_TITLE__),
 'title' => $title,
 'page' => '',
 'author' => __APP_AUTHOR__,
 'description' => 'Colecione seus personagens no League of Legends',
 'keywords' => '',
 'copyright' => 'Todos os direitos reservados © Copyright - '.__APP_PACKAGE__.' '.date('Y'),
 'feed' => 'http://feeds.feedburner.com/',
);

/**
 * Social data
 */
$_SESSION['social'] = Array(
 'facebook' => 'https://www.facebook.com/chroda',
 'twitter' => 'https://twitter.com/_chroda',
 'github' => 'https://github.com/chroda',
);

/**
 * Registration of pages.
 */
$_SESSION['pages'] = Array(
 'index','home',
 'post',
 'timeline',
);

/**
 * Titles of knows pages
 */
define('__TITLE_SEP__', ' &bull; ');
define('__DESCR_SEP__', ' &mdash; ');
switch (rewrite(1)):
  case '':
  case 'index':
  case 'home':
      $seo_title = 'Home';
      break;
    case file_exists(__VIEW_PATH__.rewrite(1).__VIEW_EXT__):
      $seo_title = ucfirst(strtolower(rewrite(1)));
      $seo_description = ucfirst(strtolower(rewrite(1))).' Page';
      break;
    default:
      $seo_title = 'Page "'.rewrite(1).'" Not Found';
      $seo_description = $seo_title ;
      break;
endswitch;
$_SESSION['seo']['title'] = $seo_title.__TITLE_SEP__.$_SESSION['seo']['title'];
$_SESSION['seo']['page'] = $seo_title;
isset($seo_description)?$_SESSION['seo']['description']=$seo_description:null;
