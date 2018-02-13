<?php 
/*
Template personnalisé pour l'affichage des appels d'offres (l'appel d'offres ne sera affiché que si sa date de limite de dépots des dossiers n'est pas dépassé) 
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
$type="";
//die(var_dump($rows));

echo '<h2>'.$vars['variables']['view']->human_name.'</h2><hr/>';
if(isset($rows) && (count($rows) >0))
{
	foreach ($rows as $row)
	{
		$id=$row->nid;
		$tab[$id]['titre']=$row->node_title;
		foreach($row->field_field_fichier_document_mp as $r)
		{
			$tab[$id]['files'][$r["rendered"]["#file"]->fid]['adr']=file_create_url($r["rendered"]["#file"]->uri);
			$tab[$id]['files'][$r["rendered"]["#file"]->fid]['nom_fichier']=$r["rendered"]["#file"]->description;
		}
		$tab[$id]['type']=$row->field_field_type_de_marche[0]["rendered"]["#markup"];
		$tab[$id]['ref']=$row->field_field_r_f_rence_de_l_offre[0]["rendered"]["#markup"];
		$tab[$id]['dl']=$row->field_field_date_limite_de_remise_des_[0]["rendered"]["#markup"];
		if(isset($row->field_field_description_de_l_offre[0]["rendered"]["#markup"]))
		{
			$tab[$id]['desc']=$row->field_field_description_de_l_offre[0]["rendered"]["#markup"];
		}
		if($type!=$row->field_field_type_de_marche[0]["rendered"]["#markup"])
		{
			$type=$row->field_field_type_de_marche[0]["rendered"]["#markup"];
			$liste_type[]=$row->field_field_type_de_marche[0]["rendered"]["#markup"];
		}
	}
	//die(var_dump($rows));

	foreach($liste_type as $l)
	{
		echo '<h3>'.$l.'</h3>';
		
		foreach($tab as $t)
		{
			if($l == $t["type"])
			{
				echo '<div class="panel panel-default">';
				echo '<div class="panel-heading"><em><strong>'.$t["type"].' n°'.$t["ref"].' : </strong><br/><small>'.$t["titre"].'</small></em></div>';
				if(isset($t["files"]))
				{
					echo '<div class="panel-body">';
					if(isset($t["dl"]))
						echo '<em><strong>Date limite de dep&ocirc;t des offres : </strong><span class="label label-danger">'.$t["dl"].'</span></em><br/>';
					if(isset($t["desc"]))
						echo '<em><strong>Description : </strong><small>'.$t["desc"].'</small></em>';
					echo '</div>';
					echo '<ul class="list-group">';
					foreach($t["files"] as $file)
					{
						echo'<li class="list-group-item"><a href="'.$file["adr"].'" target="_blank">'.$file["nom_fichier"].'</a></li>';
					}
					echo '</ul>';
					
				}
				echo '</div>';
			}
		}
		
	}
}
else
{
	echo '<h4>Aucune offre disponible pour le moment</h4>';
}
?>