<?php 
/*
Template personnalisé pour l'affichage de tous les événement à venir pour les concours 
*/


$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
//die(var_dump($rows));
$options = array('absolute' => TRUE);
if (isset($rows) && (count($rows)>0))
{
	foreach($rows as $row)
	{
		echo '<div class="page-header">';
		echo '<h3 class=""><a href="'.url('node/'.$row->nid , $options).'">'.$row->node_title.'</a></h3>';
		echo '<span class="mini-panel-cgf-author" style="padding-left : 0px;">&nbsp;'.$row->users_node_name.'</span><span class="mini-panel-cgf-date"> - '.date("d/m/Y",$row->_field_data["nid"]["entity"]->changed).'&nbsp;</span>';
		echo '</div>';
			/*if(isset($row->field_field_illustration_cgf_emploi[0]["rendered"]["#item"]["uri"]) && $row->field_field_illustration_cgf_emploi[0]["rendered"]["#item"]["uri"] !="")
			{
				echo '<img src="'.file_create_url($row->field_field_illustration_cgf_emploi[0]["rendered"]["#item"]["uri"]).'" alt="'.$row->node_title.'" class="img-responsive pull-left cadre " style="margin : 5px;"></img>';
			}*/
			echo text_summary(strip_tags($row->field_body[0]["rendered"]["#markup"]),NULL,300).'...&nbsp;'.'<a href="'.url('node/'.$row->nid , $options).'" class="btn-lire pull-right">Lire la suite</a>';
			
		}
	}
	else
	{
		echo '<div class="col-md-12">';
		echo '<center><h3 class="">Aucune actualité pour le moment</h3>';
		echo '<a class="btn btn-primary" href="/cgf">Revenir à l\'accueil</a></center>';
		echo '</div>';
	}

	?>
