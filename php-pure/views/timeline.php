timeline


$m = str_replace('.','',microtime(true));

echo $m."<br/>";

$m = substr($m,0,10);

echo date('d-m-Y h:i:s l',$m);
