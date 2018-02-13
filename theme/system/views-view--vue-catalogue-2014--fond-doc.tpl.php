<?php
/*
Template personnalisé pour l'affichage de l'embed du catalogue dnas le fond documentaires (note : cette vue est réutilisé pour les ressources de la formation, la page d'accueil,...)
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result;
//var_dump($rows);
$title = $rows[0]->_field_data['nid']['entity']->title; 

echo '<div class="panel panel-default panel-cgf panel-cgf-primary"style="padding-bottom : 30px !important;">';
echo '<div class="panel-cgf-header">';
echo '<h3>'.$title.'</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
foreach ($rows as $r)
{
	echo $r->field_field_int_gration_de_la_publicat[0]["rendered"]["#markup"];
}
echo '</div>';
echo '</div>';

?>