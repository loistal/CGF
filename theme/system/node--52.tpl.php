<?php 
/*
Template personnalisé pour l'affichage des 
*/
?>

<div class="col-sm-12"><?php  print render($content); ?></div>    
<?php

$view = views_get_view('directeurs_formation');
$view->set_display('block');
//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();



$view = views_get_view('responsables_formation');
$view->set_display('');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();

?>

