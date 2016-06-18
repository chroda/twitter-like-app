<?php
switch (__ENV__) {
  case 'prod':
    define('MYSQL_HOST','localhost');
    define('MYSQL_USER','root');
    define('MYSQL_PASS','chroda');
    define('MYSQL_NAME',__APP_PACKAGE__);
    break;
  default: // dev
    define('MYSQL_HOST','localhost');
    define('MYSQL_USER','root');
    define('MYSQL_PASS','chroda');
    define('MYSQL_NAME',__APP_PACKAGE__);
    break;
}
include __CONTROLLERS_DIR__.'MySQL.php';
$mysql=new MySQL;
if(!$mysql->Connect()){ob_clean();die(include(__VIEW_CPT_PATH__.'maintenance.php'));}
