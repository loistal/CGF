<?php
/*
Template personnalisé pour l'affichage de toutes les listes d'aptitudes
*/

$vars = get_defined_vars(); 
/*******************************TEXTE DU BOUTON ***************************/
$txt_btn = "Accéder à toutes les listes d'aptitudes";
/**************************************************************************/
$rows = $vars['variables']['view']->result; 

/***
droits du user
var_dump(user_role_permissions($user->roles)); 
edit any liste_d_aptitude content edit own liste_d_aptitude content 

**/


echo '<div class="panel panel-default panel-cgf panel-cgf-important panel-cgf-primary">';
echo '<div class="panel-cgf-header">';
echo '<h3>Les listes d\'aptitudes</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
echo '<div class="panel-cgf-body-content">';
echo '<table class="table table-striped table-hover table-condensed table-responsive">';
foreach($rows as $r)
{
	echo '<tr><td><a href="'.file_create_url($r->field_field_liste_aptitude_file["0"]["raw"]["uri"]).'" target="_blank">'.$r->node_title.'</a></td><td><span class="label label-warning pull-right">'.$r->node_revision_log.'</label></td>'; 

if(user_access('edit any documents_carriere_de_l_agent content')) { 
echo '<td><a class="btn btn-xs btn-primary" href="node/'.$r->nid.'/edit">'.t("Edit").'</a></td>'; 
	 } 

 echo '</tr>';
}
echo '</table>';
echo '</div></div>';
echo '</div>';
?>
