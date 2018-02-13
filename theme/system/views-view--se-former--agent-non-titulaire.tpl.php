<?php 
/*
Template personnalisé pour l'affichage des articles concernant les agents non titulaires
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
 //var_dump($rows);
$contextual_filters = $view->args;
$options = array('absolute' => TRUE);

foreach($rows as $row)
{
	echo '<div class="col-md-12" >';
	echo '<div class="page-header">';
	echo '<h3>'.$row->node_title.'</h3>';
	echo '</div>';
	echo '<span>'.$row->field_body[0]["rendered"]["#markup"].'</span>';
	echo '</div>';
}
?>
