<?php 
/*
Template personnalisé pour l'affichage des 
*/
?>   
<div class="col-xs-12">
	<?php  print render($content); ?>
</div>


<?php

$view = views_get_view('organigramme');
$view->set_display('trombinoscope');
//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
?>
