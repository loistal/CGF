<?php 
/*
Template personnalisé pour l'affichage des évènements des concours à venir. Cette vue est visible sur la page du calendrier dans la section concours
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
 // var_dump($rows);
$contextual_filters = $view->args;


$date_actu= getdate();
//echo 'date actu : '.date('d/m/Y H:i',$date_actu[0]).'<br/>';
?>
<?php
if(isset($rows) && (count($rows)>0))
{
	foreach ($rows as $row)
	{
		$titre='<div class="col-md-12"><div class="panel panel-default panel-cgf panel-cgf-important panel-cgf-primary"><div class="panel-cgf-header"><h3>'.$row->node_title.'</h3></div><div class="panel-cgf-body"><div class="panel-cgf-body-content">';
		if($date_actu[0] >$row->field_field_date_d_inscription[0]["raw"]["value"] && $date_actu[0]< $row->field_field_date_cloture_d_inscription[0]["raw"]["value"])
		{
			$titre.='<div class="alert-cgf alert-cgf-danger">Les inscriptions pour le '.$row->node_title.' sont toujours en cours</div><table class="table table-condensed table-cgf table-responsive">';
		}
		else if($date_actu[0]< $row->field_field_date_d_inscription[0]["raw"]["value"] && $date_actu[0] > $row->field_field_date_d_inscription[0]["raw"]["value"]-(3600*24*60))
		{
			$titre.='<div class="alert-cgf alert-cgf-success ">Les inscriptions pour le '.$row->node_title.' s\'effectueront très prochainement</div><table class="table table-condensed table-cgf">';
		}
		else
		{
			$titre.='<table class="table table-condensed table-cgf">';
		}
		
		if($row->field_field_date_d_inscription[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t1 = $row->field_field_date_d_inscription[0]["rendered"]["#markup"];
			echo '<tr><td>Date d\'inscription : <span class="label label-danger pull-right">'.$t1.'</span></td></tr>';
			$titre="";
			
		}
		if($row->field_field_date_cloture_d_inscription[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t2 = $row->field_field_date_cloture_d_inscription[0]["rendered"]["#markup"];
			echo '<tr><td>Date de clôture des inscriptions : <span class="label label-danger pull-right">'.str_replace(",", "", $t2).'</span></td></tr>';
			$titre="";
		}
		if($row->field_field_date_epreuve_1[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t3 = $row->field_field_date_epreuve_1[0]["rendered"]["#markup"];
			echo '<tr><td>Date de la 1ère épreuve : <span class="label label-danger pull-right">'.str_replace(",", "", $t3).'</span></td></tr>';
			$titre="";
		}
		if($row->field_field_date_resultat_1[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t4 = $row->field_field_date_resultat_1[0]["rendered"]["#markup"];
			echo '<tr><td>Date des résultats de la 1ère session : <span class="label label-danger pull-right">'.str_replace(",", "", $t4).'</span></td></tr>';
			$titre="";
		}
		if($row->field_field_date_epreuve_2[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t5 = $row->field_field_date_epreuve_2[0]["rendered"]["#markup"];
			echo '<tr><td>Date de la 2ème épreuve : <span class="label label-danger pull-right">'.str_replace(",", "", $t5).'</span></td></tr>';
			$titre="";
		}
		if($row->field_field_date_resultat_2[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t6 = $row->field_field_date_resultat_2[0]["rendered"]["#markup"];
			echo '<tr><td>Date des résultats de la 2ème session : <span class="label label-danger pull-right">'.str_replace(",", "", $t6).'</span></td></tr>';
			$titre="";
		}
		if($row->field_field_date_resultat_finaux[0]["raw"]["value"] >=$date_actu[0])
		{
			echo $titre;
			$t7 = $row->field_field_date_resultat_finaux[0]["rendered"]["#markup"];
			echo '<tr><td>Date des résultats finaux : <span class="label label-danger pull-right">'.str_replace(",", "", $t7).'</span></td></tr>';
			$titre="";
		}
		echo '</table></div></div>';
	}
}
else
{
	echo '<h3>Il n\'y a aucun évènement à venir</h3>';
}
?>

