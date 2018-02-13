<?php
/*
Template personnalisé pour l'affichage des panneaux sur la page d'accueil
*/
?>

<?php  if(isset($content) && $content != ""){print render($content);} ?>
<?php

echo '<div class="row row-cgf" id ="row-cgf-homepage1" style="margin-top : 40px;">';

echo '<ul style="margin-bottom:500px;">';
echo '<li><a href="http://ohipa.cgf.pf:8080/actus-formation-cgf/Les%20derni%C3%A8res%20actualit%C3%A9s%20-%20Formation">En ce moment à la une</a></li>';
echo '<li><a href="http://ohipa.cgf.pf:8080/actus-formation-cgf/Les%20derni%C3%A8res%20actualit%C3%A9s%20-%20Formation">Toute l\'actualité sur la formation</a></li>';
echo '<li><a href="http://ohipa.cgf.pf:8080/actus-statut-cgf/Les%20derni%C3%A8res%20actualit%C3%A9s%20du%20Statut">Les dernières actualités du statut</a></li>';
echo '<li><a href="http://ohipa.cgf.pf:8080/emploi/bourse-stages">Les dernières offres de stage</a></li>';
echo '<li><a href="http://ohipa.cgf.pf:8080/actualite-concours-ndeg1-2">Les dernières actualités - Concours</a></li>';
echo '<li><a href="http://ohipa.cgf.pf:8080/actus-emplois-cgf/Les%20derni%C3%A8res%20actualit%C3%A9s%20-%20Emplois">Les dernières actualités - Emplois</a></li>';
echo '</ul>';

$view = views_get_view('actus_cgf_une');
$view->set_arguments(array("En ce moment à la une"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();

$view = views_get_view('concours');
$view->set_arguments(array("Les prochains évènements"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();

//echo '</div>';
//echo'</div>';



//echo '<div  class="row row-cgf" id ="row-cgf-homepage2">';
//echo '<div class="col-sm-6" >';
$view = views_get_view('actus_formation_cgf');
$view->set_arguments(array("Les dernières actualités - Formation"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();

//echo '</div>';

//echo '<div class="col-sm-6" >';

$view = views_get_view('actus_statut_cgf');
$view->set_arguments(array("Les dernières actualités du Statut"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();



//echo '<div class="col-sm-6">';
$view = views_get_view('derni_res_offres_de_stage');
$view->set_arguments(array("Les dernières offres de stage"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();
//echo '</div>';

//echo '<div class="col-sm-6">';
$view = views_get_view('actus_concours_cgf');
$view->set_arguments(array("Les dernières actualités - Concours"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();
//echo '</div>';
//echo '</div>';

//echo '<div class="row row-cgf "id ="row-cgf-homepage3">';
//echo '<div class="col-sm-6" >';
$view = views_get_view('dernieres_offres_d_emploi');
$view->set_arguments(array("Les dernières offres d'emploi"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();
//echo '</div>';
//echo '<div class="col-sm-6">';
$view = views_get_view('actus_emplois_cgf');
$view->set_arguments(array("Les dernières actualités - Emplois"));
$view->set_display('panel_accueil');
$view->pre_execute();
$view->execute();
//print $view->render();
//echo '</div>';
//echo '</div>';

//echo '<div  class="row row-cgf" id="row-cgf-homepage4">';
//echo '<div class="col-sm-4" >';
$view = views_get_view('vue_catalogue_2014');
$view->set_display('fond_doc');
$view->pre_execute();
$view->execute();
//print $view->render();
//echo '</div>';


//echo '</div>';
?>

<?php
/*drupal_add_js('jQuery(".row-cgf-homepage").each(function(){jQuery(".row-cgf-homepage .panel-cgf ").height(jQuery(".row-cgf-homepage").height());alert("oto"); });', 'inline');*/
?>

