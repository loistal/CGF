<?php
/*
Template personnalisé pour l'affichage des 3 dernières listes d'aptitudes
*/

$vars = get_defined_vars(); 
/*******************************TEXTE DU BOUTON ***************************/
$txt_btn = "Accéder à toutes les listes d'aptitudes";
/**************************************************************************/
$rows = $vars['variables']['view']->result; 
//die(var_dump($rows));
echo '<div class="panel panel-default panel-cgf panel-cgf-important">';
echo '<div class="panel-cgf-header">';
echo '<h3>Les derni&egrave;res listes d\'aptitudes</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
echo '<div class="panel-cgf-body-content">';
echo '<table class="table table-striped table-hover table-condensed table-responsive">';
foreach($rows as $r)
{
	echo '<tr><td><a href="'.file_create_url($r->field_field_liste_aptitude_file["0"]["raw"]["uri"]).'" target="_blank">'.$r->node_title.'</a></td></tr>';
}
echo '</table><a href="concours/listes-aptitudes" class="btn btn-primary btn-block" style="margin-top : 10px;">'.$txt_btn.'</a>';
echo '</div></div>';
echo '</div>';
?>
