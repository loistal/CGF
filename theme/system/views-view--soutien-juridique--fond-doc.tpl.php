<?php
/*
Template personnalisé pour l'affichage des 3 derniers document pour le soutien juridique
*/

$vars = get_defined_vars(); 
$txt_btn = $vars['variables']['view']->style_plugin->row_tokens[0]["[nothing]"]; 
$rows = $vars['variables']['view']->result; 
//die(var_dump($rows));
echo '<div class="panel panel-default panel-cgf panel-cgf-important">';
echo '<div class="panel-cgf-header">';
echo '<h3>La liste des derniers documents de soutien juridique</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
echo '<div class="panel-cgf-body-content">';
echo '<table class="table table-striped table-hover table-condensed table-responsive">';
foreach($rows as $r)
{
	echo '<tr><td><a href="'.file_create_url($r->field_field_fichier_sj["0"]["rendered"]["#file"]->uri).'" target="_blank">'.$r->node_title.'</a></td></tr>';
}
echo '</table><a href="statut/soutien-juridique"  class="btn btn-primary btn-block" style="margin-top : 10px ;">'.$txt_btn.'</a>';
echo '</div></div>';
echo '</div>';
?>
