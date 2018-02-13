<?php 
/*
Template personnalisé pour l'affichage des 
*/
?>

<div class="col-sm-12"><?php  print render($content); ?></div>    
<?php
echo '<div class="row">';
echo '<div class="col-sm-8 ">';
$view = views_get_view('liste_documents_formations_2014');
$view->set_display('ressources_formation');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';

echo '<div class="col-sm-4" >';
$view = views_get_view('vue_catalogue_2014');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';
echo '</div>';
?>

