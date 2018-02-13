<?php 
/*
Template personnalisé pour l'affichage des évènements des concours sur la page d'accueil
Les évènements ne seront visibles que si leurs dates sont supérieures ou égales à la date actuelle et inférieures à la date actuelle + 2 mois 
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
$rows2 = $vars['variables']['view']; 
 // var_dump($rows);
$contextual_filters = $view->args;


$date_actu= getdate();

//echo 'date actu : '.date('d/m/Y H:i',$date_actu[0]).'<br/>';
?>


			<?php
			$res=0;
			if(isset($rows) && (count($rows)>0))
			{
				//var_dump($rows2);?>
				<!--<div class="col-sm-7">-->
				<div class=" panel panel-default panel-cgf panel-cgf-primary" >
					<div class="panel-cgf-header">
						<h3 class="panel-cgf-title">
							<?php  echo $contextual_filters[0]; ?>
						</h3>
					</div>
					<div class="panel-cgf-body">
						<div class="panel-cgf-body-content">
				<?php
				foreach ($rows as $row)
				{
					
					$titre='<span class="mini-panel-cgf-title">'.$row->node_title.'</span>';
					if($date_actu[0] >$row->field_field_date_d_inscription[0]["raw"]["value"] && $date_actu[0]< $row->field_field_date_cloture_d_inscription[0]["raw"]["value"])
					{
						$titre.='<div class="alert-cgf alert-cgf-danger">Les inscriptions pour le '.$row->node_title.' sont toujours en cours</div><table class="table table-condensed table-cgf table-responsive">';
					}
					else if($date_actu[0]< $row->field_field_date_d_inscription[0]["raw"]["value"] && $date_actu[0] > $row->field_field_date_d_inscription[0]["raw"]["value"]-(3600*24*60))
					{
						$titre.='<div class="alert-cgf alert-cgf-success ">Les inscriptions pour le '.$row->node_title.' s\'effectueront très prochainement</div><table class="table table-condensed table-cgf table-responsive">';
					}
					else
					{
						$titre.='<table class="table table-condensed table-cgf table-responsive">';
					}
					
					if($row->field_field_date_d_inscription[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_d_inscription[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t1 = $row->field_field_date_d_inscription[0]["raw"]["value"];
						echo '<tr><td>Date d\'inscription : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t1).'</span></td></tr>';
						$titre="";
						$res=1;
						
					}
					if($row->field_field_date_cloture_d_inscription[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_cloture_d_inscription[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t2 = $row->field_field_date_cloture_d_inscription[0]["raw"]["value"];
						echo '<tr><td>Date de clôture des inscriptions : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t2).'</span></td></tr>';
						$titre="";
						$res=1;
					}
					if($row->field_field_date_epreuve_1[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_epreuve_1[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t3 = $row->field_field_date_epreuve_1[0]["raw"]["value"];
						echo '<tr><td>Date de la 1ère épreuve : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t3).'</span></td></tr>';
						$titre="";
						$res=1;
					}
					if($row->field_field_date_resultat_1[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_resultat_1[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t4 = $row->field_field_date_resultat_1[0]["raw"]["value"];
						echo '<tr><td>Date des résultats de la 1ère session : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t4).'</span></td></tr>';
						$titre="";
						$res=1;
					}
					if($row->field_field_date_epreuve_2[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_epreuve_2[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t5 = $row->field_field_date_epreuve_2[0]["raw"]["value"];
						echo '<tr><td>Date de la 2ème épreuve : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t5).'</span></td></tr>';
						$titre="";
						$res=1;
					}
					if($row->field_field_date_resultat_2[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_resultat_2[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t6 = $row->field_field_date_resultat_2[0]["raw"]["value"];
						echo '<tr><td>Date des résultats de la 2ème session : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t6).'</span></td></tr>';
						$titre="";
						$res=1;
					}
					if($row->field_field_date_resultat_finaux[0]["raw"]["value"] >=$date_actu[0] && $row->field_field_date_resultat_finaux[0]["raw"]["value"]<= ($date_actu[0]+(3600*24*30)))
					{
						echo $titre;
						$t7 = $row->field_field_date_resultat_finaux[0]["raw"]["value"];
						echo '<tr><td>Date des résultats finaux : <span class="label label-danger pull-right">'.date('d/m/Y H:i',$t7).'</span></td></tr>';
						$titre="";
						$res=1;
					}
					echo '</table>';
				}
				//var_dump($more);
				if(isset($more) && (count($more)>0))
				{
						$href=explode("\"",$more);
						echo '<div class="mini-panel-cgf-link pull-right">';
							echo '<a class="btn btn-primary btn-sm btn-actus" href="'.$href[3].'">';
								echo strip_tags($more);
							echo'</a>';
						echo '</div>';
				}
				if ($res==0)
				{
					echo '<h4>Il n\'y a aucun évènement à venir</h4>';
				}
				?>
				</div>
		</div>
	</div>
<!--</div>-->
<!--</div>-->
<?php
			}
			
			?>
			
			
			
