<?php
/*
Template personnalisé pour l'affichage des annales 
 triées par catégorie puis par année
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result;
//$rows = $vars['variables']['view'];
//die(var_dump($rows[0]));
foreach($rows as $b)
{
	
	
	$annee = (!empty($b->field_field_annee_annales[0]["rendered"]["#markup"]))? strip_tags($b->field_field_annee_annales[0]["rendered"]["#markup"]) : 0 ; 
	
	
	
	$categorie = $b->field_field_categorie[0]["rendered"]["#markup"]; 
	$type = $b->field_field_type_de_fichier_annales[0]["rendered"]["#markup"]; 
	$id=$b->nid;
	$annales_test[$categorie][$annee][$type][$id]['titre'] = $b->node_title;
	$annales_test[$categorie][$annee][$type][$id]['uri_fichier'] = file_create_url($b->field_field_document_annales[0]['rendered']['#file']->uri);
	$annales_test[$categorie][$annee][$type][$id]['filename'] = $b->field_field_document_annales[0]['rendered']['#file']->filename;
}

//die(var_dump($annales_test));
//var_dump($annales); die();


?>
<h3>Textes et documents des concours externes</h3>
<ul class="nav nav-tabs annales">	
	<?php
	$i=0;echo '<br/>';
	foreach($annales_test as $cat => $val)
	{
		$class=''; 
		if($i==0) $class='active'; 
		
		echo '<li class="'.$class.'"><a href="concours/annales/#cat'.$cat.'" data-toggle="tab">Catégorie '.$cat.'</a></li>';
		$i++;
	}
	?>
</ul>
<div id="myTabContent" class="tab-content">

	<?php


	$j=0;
	foreach($annales_test as $cat => $val)
	{	
		
		if($j==0)
			echo '<div class="tab-pane fade in active" id="cat'.$cat.'">';
		else
			echo '<div class="tab-pane fade" id="cat'.$cat.'">';
		$j++;
		echo '<div class="col-sm-2" style="border-right: 1px solid #ddd"><ul class="nav nav-pills nav-stacked"><h4>Années</h4>';
		$l=0;
		
		foreach($val as $an => $val2)
		{
			if($l==0 && $an!="0")
				echo '<li class="active"><a data-toggle="tab" href="concours/annales/#cat'.$cat.'-'.$an.'">'.$an.'</a></li>';
			else if ($an!="0")
				echo '<li><a data-toggle="tab" href="concours/annales/#cat'.$cat.'-'.$an.'">'.$an.'</a></li>';
			$l++;
		}
		
		echo'</ul></div>';
		$k=0;
		echo'<div class="col-sm-6" style=" border-right: 1px solid #ddd;"><div id="myTabContent2" class="tab-content">';
		foreach($val as $an => $val2)
		{
			if($an!="0")
			{
				if($k==0)
					echo'<div class="tab-pane fade in active" id="cat'.$cat.'-'.$an.'">';
				else
					echo'<div class="tab-pane fade " id="cat'.$cat.'-'.$an.'">';
				$k++;
				echo'<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
				foreach($val2 as $type =>$val3)
				{	
					echo '<h4>Concours externe catégorie '.$cat.'</h4>';
					echo '<div class="panel panel-default" style="margin-bottom : 5px; ">';
					echo'<div class="panel-heading" role="tab" id="headingOne">';
					echo'<div class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$cat.'-'.$an.'-'.str_replace(' ', '-', $type).'" aria-expanded="true" aria-controls="collapseOne">'.$type.'</a><span class="badge pull-right">'.count($val3).'</span></div>';
					echo '</div>';
					echo'</div>';
					echo'<div id="collapse'.$cat.'-'.$an.'-'.str_replace(' ', '-', $type).'" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body"><table class="table table-stripped table-hover table-condensed">';
						
						foreach($val3 as $carac)
						{
							echo '<tr><td><a href="'.$carac['uri_fichier'].'" target="_blank">'.$carac['titre'].'</a></td>';
						}
						echo'		</table></div>
					</div>';
				}
				echo'</div></div>';
				
			}
		}
		; 
		
		echo'</div></div>';

		
		echo '<div class="col-sm-4" style="padding-top :0px;">';
		foreach($val as $an => $val2)
		{
			//if($an=="0")
			//{
				echo'<div>';
				foreach($val2 as $type =>$val3)
				{	
					echo'<div class="col-sm-12">';
					echo'<div class="panel panel-default panel-cgf panel-cgf-primary">';
					echo'<div class="panel-cgf-header">';
					echo'<h4>'.$type.'</h4>';//<span class="badge pull-right">'.count($val3).'</h4>';
					echo'</div>';
					echo'<div class="panel-cgf-body">';
					echo'<div class="col-md-12">';
					echo'<table class="table table-stripped table-hover table-condensed table-cgf table-responsive">';
					foreach($val3 as $carac)
					{
						echo '<tr><td><a href="'.$carac['uri_fichier'].'" target="_blank">'.$carac['titre'].'</a></td>';
					}
					echo'</table>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
					echo'</div>';
				}
				echo'</div>';
			//}
		}
		echo '</div>';
		
		echo '</div>';
	}

	?>
