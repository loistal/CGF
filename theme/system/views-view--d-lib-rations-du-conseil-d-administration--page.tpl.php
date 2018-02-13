<?php
/*
Template personnalisé pour l'affichage de toutes les délibérations du CA
*/

$vars = get_defined_vars(); 

//$txt_btn = $vars['variables']['view']->style_plugin->row_tokens[0]["[nothing]"]; 



$rows = $vars['variables']['view']->result; 

foreach($rows as $row)
{
	$annee  = date('Y', $row->field_field_date_de_la_reunion_du_ca[0]['raw']['value']);  
	$date	=  date('d/m/Y', $row->field_field_date_de_la_reunion_du_ca[0]['raw']['value']); 
	
	foreach($row->field_field_documents_d_lib_rations as $r)
	{
		$id_reunion = $row->nid;
		$id=$r["rendered"]["#file"]->fid;
		$tab[$annee][$id_reunion]['titre'] = $row->node_title; 
		$tab[$annee][$id_reunion]['date'] = $date; 
		$tab[$annee][$id_reunion]['files'][$id]['id']=$r["rendered"]["#file"]->fid;
		$tab[$annee][$id_reunion]['files'][$id]['url']=file_create_url($r["rendered"]["#file"]->uri);
		
		
		if(isset($r["rendered"]["#file"]->description) && $r["rendered"]["#file"]->description!="") { 
			
			$tab[$annee][$id_reunion]['files'][$id]['name']=($r["rendered"]["#file"]->description);
		} 
		else { 
			
			$tab[$annee][$id_reunion]['files'][$id]['name']=$r["rendered"]["#file"]->origname;
			
		}
		
		$tab[$annee][$id_reunion]['files'][$id]['timestamp']=($r["rendered"]["#file"]->timestamp);
		$tab[$annee][$id_reunion]['files'][$id]['content']=$row->node_title;
	/*	
		if(isset($row->field_field_date_de_la_reunion_du_ca[0]["rendered"]["#markup"]) 
		&& $row->field_field_date_de_la_reunion_du_ca[0]["rendered"]["#markup"]!="") {
			
		
		$tab[$annee][$id_reunion][$id]['date']=str_replace(",","",strip_tags($row->field_field_date_de_la_reunion_du_ca[0]["rendered"]["#markup"]));
	}*/
	
}
} 



/** BLOCS ANNEES */
echo '<div class="col-sm-2" style="margin-bottom : 10px; border-right : 1px solid #ddd;"><h4>Années</h4>';
echo '<ul class="nav nav-pills nav-stacked">';
$class="active";
foreach($tab as $annee => $a)
{
	
	echo '<li class="'.$class.'"><a href="deliberations-ca#'.$annee.'" data-toggle="tab">'.$annee.'</a></li>';
	$class="";
}
echo '</ul>';
echo '</div>';



echo '<div class="col-sm-10" >';


echo '<div id="myTabContent-ca" class="tab-content">';

$class = "in active"; 
foreach($tab as $annee => $a)
{
	
	?>

	<div class="tab-pane fade <?php echo $class; $class=""; ?>" id="<?php echo $annee; ?>">
		<?php  
		
		
		foreach ($a as $reunion)
		{
		// var_dump($reunion); 
			?>
			<div class="col-md-12">
				<div class=" panel panel-default panel-cgf">
					<div class="panel-cgf-header">
						<div class="row">
							<div class="col-md-8">
								<h4><?php echo $reunion['titre']; ?> </h4>
							</div>
							<div class="col-md-4" ><span class="label label-warning pull-right" style="margin-top: 15px;"><em> <?php echo $reunion['date'];  ?></em></span> </div>
						</div>
					</div>
					<div class="panel-cgf-body">
						<div class="col-md-12">
							<table class="table table-hover table-condensed table-cgf table-responsive">
								<tr><th>Documents</th></tr>
								<?php 
								foreach($reunion['files'] as $t) { 
									?>
									<tr>
										<td><a href="<?php echo  $t['url']; ?>" target="_blank"><?php echo $t['name']; ?></a></td>
									</tr>
									<?php 
								} 
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php 
		}
		?>
	</div>
	<?
	
}
//echo '</div>';
//echo '</div>';
//echo '</div>';
echo '</div>';
echo '</div>';
?>
