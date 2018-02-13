<?php
/*
Template personnalisé pour l'affichage des différents membres du CA
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result;
//die(var_dump($vars));
echo '<div class="row">';
foreach ($rows as $row)//while
{
	if($row->field_field_position_conseil_d_adminis[0]["rendered"]["#markup"]=="Président")
	{
		echo '<div class="col-sm-6 col-sm-offset-3">';
		echo '<div class="thumbnail panel-cgf text-center panel-cgf-primary">';
		echo '<div class="panel-cgf-header">';
		echo '<img src="'.file_create_url($row->field_field_photo[0]["rendered"]["#item"]["uri"]).'" class="circular-director">';
		echo '</div>';
		echo '<hr/><div class="panel-cgf-body"><h4 class=" h4-ca-pres">'.$row->field_field_prenom_membre_cgf[0]["rendered"]["#markup"].'&nbsp;'.$row->field_field_nom_membre_cgf[0]["rendered"]["#markup"].'</h4><em>'.$row->field_field_titre_qualite_poste[0]["rendered"]["#markup"].'</em>';
		echo '</div></div></div>';
	}
}
echo '</div>';
echo '<hr/>';
echo '<div class="row">';
for($i=1;$i<=4;$i++)
	foreach ($rows as $row)
	{
		if(
		substr($row->field_field_position_conseil_d_adminis[0]["rendered"]["#markup"], 0, 1)  == $i)
		{
			echo '<div class="col-sm-3">';
			echo '<div class="thumbnail panel-cgf text-center panel-cgf-ca-vp">';
			echo '<div class="panel-cgf-header">';
			echo '<img src="'.file_create_url($row->field_field_photo[0]["rendered"]["#item"]["uri"]).'" class="circular">';
			echo '</div>';
			echo '<hr/><div class="panel-cgf-body"><h4 class=" h4-ca-vp">'.$row->field_field_prenom_membre_cgf[0]["rendered"]["#markup"].'&nbsp;'.$row->field_field_nom_membre_cgf[0]["rendered"]["#markup"].'</h4><em>'.$row->field_field_titre_qualite_poste[0]["rendered"]["#markup"].'</em>';
			echo '</div></div></div>';
		}
	}
	echo '</div>';
	echo '<hr/>';
	echo '<div class="row">';
	foreach ($rows as $row)
	{
		if($row->field_field_position_conseil_d_adminis[0]["rendered"]["#markup"]=="Aucun")
		{
			echo '<div class="col-sm-2">';
			echo '<div class="thumbnail panel-cgf  text-center panel-cgf-ca-membres">';
			echo '<div class="panel-cgf-header">';
			echo '<img src="'.file_create_url($row->field_field_photo[0]["rendered"]["#item"]["uri"]).'" class="circular">';
			echo '</div>';
			echo '<hr/><div class="panel-cgf-body"><h4 class=" h4-ca-membres">'.$row->field_field_prenom_membre_cgf[0]["rendered"]["#markup"].'&nbsp;'.$row->field_field_nom_membre_cgf[0]["rendered"]["#markup"].'</h4><em>'.$row->field_field_titre_qualite_poste[0]["rendered"]["#markup"].'</em>';
			echo '</div></div></div>';
		}
	}
	echo '</div>';
	?>
