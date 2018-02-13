<?php 
/*
Template personnalisé pour l'affichage des documents d'une réunion de commission UNIQUEMENT pour les membres d'une commission
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 

$date=0;
if( user_is_logged_in() ) { 
	$profil = profile2_load_by_user($user->uid); 

	$key = key($profil) ; 
	if($key === 'membre_d_une_commission' ) { 
		
		$commissions = $profil[$key]->field_commission['und']; 
	}
	if(isset($commissions) && is_array($commissions)) { 
		foreach($commissions as $c) { 
			$ids[] = $c['target_id']; 
		}
	}
	else
	{
		if(isset($commissions))
		{
			$ids[]=$commissions;
		}
	}
	if(isset ($rows[0]->field_field_commission_statutaire[0]["rendered"]["#markup"]) && isset($ids))
	{
		if(in_array($rows[0]->field_field_commission_statutaire[0]["rendered"]["#markup"], $ids)) 
		{ 
			echo '<hr/>';
			echo '<h3>Travaux de la commission</h3><br/>';
			foreach ($rows as $row)
			{	
				//var_dump($row);
				$id=$row->nid;
				$date=strip_tags($row->field_field_date_de_la_reunion[0]["rendered"]["#markup"]);
				$date=str_replace(",","",$date);
				$annee=explode(" ",$date);
				$annee=$annee[3];
				if(isset($row->_field_data["nid"]["entity"]->field_categorie_reunions["und"][0]["target_id"]) && $row->_field_data["nid"]["entity"]->field_categorie_reunions["und"][0]["target_id"]!="")
				{
					$term = taxonomy_term_load($row->_field_data["nid"]["entity"]->field_categorie_reunions["und"][0]["target_id"]);
					$categorie=$term->tid;
				}
				else
				{
					$categorie="na";
				}
				$tab[$categorie][$annee][$id]["id"]=$id;
				$tab[$categorie][$annee][$id]["titre"]=$row->_field_data["nid"]["entity"]->title;
				$tab[$categorie][$annee][$id]["id_commission"]=$row->field_field_commission_statutaire[0]["rendered"]["#markup"];
				$tab[$categorie][$annee][$id]["date"]=$date;
				if(isset($row->_field_data["nid"]["entity"]->field_avis_d_cisions["und"]) && $row->_field_data["nid"]["entity"]->field_avis_d_cisions["und"]!="")
				{
					foreach($row->_field_data["nid"]["entity"]->field_avis_d_cisions["und"] as $r)
					{
						$id_avis= $r["fid"];
						if(isset($r["description"]) && $r["description"]!="")
						{
							$tab[$categorie][$annee][$id]["avis"][$id_avis]["title"]=$r["description"];
						}
						else
						{
							$tab[$categorie][$annee][$id]["avis"][$id_avis]["title"]=$r["filename"];
						}
						$tab[$categorie][$annee][$id]["avis"][$id_avis]["uri"]=file_create_url($r["uri"]);
					}
				}
				if(isset($row->_field_data["nid"]["entity"]->field_documents["und"]) && $row->_field_data["nid"]["entity"]->field_documents["und"]!='')
				{
					foreach($row->_field_data["nid"]["entity"]->field_documents["und"] as $t)
					{
						$id_doc= $t["fid"];
						if(isset($t["description"]) && $t["description"]!="")
						{
							$tab[$categorie][$annee][$id]["documents"][$id_doc]["title"]=$t["description"];
						}
						else
						{
							$tab[$categorie][$annee][$id]["documents"][$id_doc]["title"]=$t["filename"];
						}
						$tab[$categorie][$annee][$id]["documents"][$id_doc]["uri"]=file_create_url($t["uri"]);
						/*$path_file=explode(':',$t["uri"]);
						echo(($path_file[1]).'<br/>');
						(file_unmanaged_copy($t["uri"] ,'public'.$path_file[1]));
						$tab[$annee][$id]["documents"][$id_doc]["uri"]=file_unmanaged_copy($t["uri"] ,'public'.$path_file[1]);*/
						
					}
				}
				
			}
			/************************************/
			/**********MISE EN FORME*************/
			/************************************/
			echo '<ul class="nav nav-tabs" role="tablist">';
			$classtop="active";
			foreach($tab as $cat=>$t)
			{
				if($cat!="na")
				{
					$term=taxonomy_term_load($cat);
					$nom_cat=$term->name;
				}
				else
				{
					$nom_cat="Divers";
				}
				echo'<li role="presentation" class="'.$classtop.'">
				<a href="#'.$cat.'" aria-controls="home" role="tab" data-toggle="tab">'.$nom_cat.'</a></li>';
				$classtop="";
			}
			echo '</ul>';
			echo '<div class="tab-content">';
			$class="active";
			foreach($tab as $cat=>$r)
			{
				echo '<div role="tabpanel" class="tab-pane fade in '.$class.'" id="'.$cat.'">';
				echo '<div class="row" style="margin-top : 15px;">';
				echo '<div class="col-md-3" style="margin-top : 10px ;">';
				echo '<ul class="nav nav-pills nav-stacked" role="tablist">';
				$class2="active";
				foreach($r as $an=>$t)
				{
					echo '<li role="presentation" class="'.$class2.'"><a href="#'.$cat.'-'.$an.'" role="tab" data-toggle="tab">'.$an.'</a></li>';
					$class2="";

				}
				$class="";
				echo '</ul>';
				echo '</div>';

				echo '<div class="col-md-9" style="border-left : 1px solid #ddd !important;">';
				echo '<div class="tab-content">';
				$class3="active";
				foreach($r as $an=>$val)
				{
					echo '<div role="tabpanel" class="tab-pane fade in '.$class3.'" id="'.$cat.'-'.$an.'">';
					foreach ($val as $t)
					{
									//var_dump($t);
						echo '<div class="row">';
						echo '<div class="col-sm-12">';
						echo '<div class=" panel panel-default panel-cgf panel-cgf-primary">';
						echo '<div class="panel-cgf-header">';
						echo '<div class="row">';
						echo '<div class="col-sm-12"><h4>'.$t["titre"].'</h4></div>';
						echo '<div class="col-sm-12"><em><span class="label label-warning" style="margin-top: 15px;">'.$t["date"].'</span></em></div>';
						echo '</div>';echo '</div>';
						echo '<div class="panel-cgf-body">';
						echo '<div class="col-md-12">';
						if(isset($t["avis"]) && count($t["avis"])>0)
						{
							echo '<table class="table table-condensed table-cgf table-responsive">';
							echo '<tr><th><em>Avis & Décisions</em></th></tr>';
							foreach($t["avis"] as $a)
							{
								echo '<tr><td><a href="'.$a["uri"].'">'.$a["title"].'</a></td></tr>';
							}
							echo '</table>';
						}
						echo '</div>';
						echo '<div class="col-md-12">';
						if(isset($t["documents"]) && count($t["documents"])>0)
						{
							echo '<table class="table table-condensed table-cgf table-responsive">';
							echo '<tr><th><em>Documents</em></th></tr>';
							foreach($t["documents"] as $b)
							{
								echo '<tr><td><a href="'.$b["uri"].'">'.$b["title"].'</a></td></tr>';
							}
							echo '</table>';
						}
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					$class3="";	
				}
				
				echo '</div>';
				echo '</div>';

				echo '</div>';
				echo '</div>';

			}
			
			echo '</div>';
		}
	}
}


?>

<!--foreach ($r as $an=>$t)
				{
					echo '<div role="tabpanel" class="tab-pane '.$class.'" id="'.$cat.'">';
					echo '<div class="col-md-3">';
					echo $an;
					
					foreach($t as $s)
					{
						var_dump($t);

					}
					

					echo '</div>';


echo '<li role="presentation" class="'.$class.'"><a href="#">'.$an.'</a></li>';

					echo '</div>';
					$class="";
				}-->