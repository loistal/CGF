<?php

/*
Template personnalisé pour l'affichage des dernières annales mis en lignes - cette vue est visible sur la page du fond documentaire 
*/

$vars = get_defined_vars(); 
/*******************************TEXTE DU BOUTON ***************************/
$txt_btn = "Accéder à toutes les annales";
/**************************************************************************/
//$txt_btn = $vars['variables']['view']["default_display"]->display->handler["fields"]["nothing"]["alter"]["text"]; 
//die(var_dump($vars));
//die($txt_btn);

$rows = $vars['variables']['view']->result; 
//die(var_dump($rows));
echo '<div class="panel panel-default panel-cgf panel-cgf-important">';
echo '<div class="panel-cgf-header">';
echo '<h3>La liste des derni&egrave;res annales publi&eacute;es</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
echo '<div class="panel-cgf-body-content">';
echo '<table class="table table-striped table-hover table-condensed table-responsive">';
foreach($rows as $r)
{
	echo '<tr><td><a href="'.file_create_url($r->field_field_document_annales["0"]["rendered"]["#file"]->uri).'" target="_blank">'.$r->node_title.'</a></td></tr>';
}
echo '</table><a href="concours/annales" class="btn btn-primary btn-block" style="margin-top : 10px;">'.$txt_btn.'</a>';
echo '</div></div>';
echo '</div>';
?>
