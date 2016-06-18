<?php

function pr($expression=null){
  print '<pre>';
  print_r($expression);
  print '</pre>';
}

pr(!!1);

?>
