<?php
/*
Template personnalisé pour l'affichage des 
*/
?>




<div class="col-xs-12">
	<?php  print render($content); ?>
</div>



<?php
			//délibérations
echo '<div style="margin-top :10px">';
echo '<div class="col-sm-12" >';
$view = views_get_view('d_lib_rations_du_conseil_d_administration');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo'</div>';

			//ressources de la formation

echo '<div class="col-sm-8 ">';
$view = views_get_view('liste_documents_formations_2014');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';

			//catalogue calameo

echo '<div class="col-sm-4" >';
$view = views_get_view('vue_catalogue_2014');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';


			//annales

echo '<div class="col-sm-6">';
$view = views_get_view('annales');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';

			//listes d'aptitudes

echo '<div class="col-sm-6">';
$view = views_get_view('liste_des_listes_d_aptitude');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';

			//documents soutien juridique

echo '<div class="col-sm-6" >';
$view = views_get_view('soutien_juridique');
$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';
echo '</div>';
?>

