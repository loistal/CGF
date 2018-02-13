<?php 
/*
Template personnalisé pour l'affichage de tout les documents pour le soutien juridique (soutien juridiques)
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
$vid = taxonomy_vocabulary_machine_name_load("soutien_juridique_")->vid;
$terms = taxonomy_get_tree($vid);


//var_dump(user_role_permissions($user->roles)); 

//var_dump($rows); die(); 

foreach ($rows as $row) {
	
	$docs[$row->nid]['id'] = $row->nid; 
	$docs[$row->nid]['cat'] = $row->taxonomy_term_data_node_tid; 
	$docs[$row->nid]['title'] = $row->node_title; 
	$docs[$row->nid]['body'] = $row->_field_data['nid']['entity']->body['und'][0]['value']; 
	//if(isset($row->field_field_fichier_sj[0]["rendered"]["#file"]->uri))
	$docs[$row->nid]['chemin'] = file_create_url($row->field_field_fichier_sj[0]["rendered"]["#file"]->uri); 
	$docs[$row->nid]['date_de_publication'] = $row->node_created;
}

//var_dump($docs); die(); 
//die(var_dump($terms));
foreach ($terms as $t)
{	
	if($t->parents[0]==0)
	{
		$tab[$t->tid]['name']=$t->name;
		$tab[$t->tid]['id']=$t->tid;
		
		foreach($docs as $d)
		{
			
			if($d['cat']==$t->tid)
			{
				$tab[$t->tid]['files'][$d["cat"]][$d['id']]['id']=$d['id'];
				$tab[$t->tid]['files'][$d["cat"]][$d['id']]['title']=$d['title'];
				$tab[$t->tid]['files'][$d["cat"]][$d['id']]['body']=$d['body'];
				$tab[$t->tid]['files'][$d["cat"]][$d['id']]['chemin']=$d['chemin'];
				$tab[$t->tid]['files'][$d["cat"]][$d['id']]['date_de_publication']=$d['date_de_publication'];
			}
		}
	}	
	foreach($terms as $b)
	{
		if($b->parents[0] == $t->tid)
			
		{
			$tab[$t->tid]['fils'][$b->tid]['id'] = $b->tid;
			$tab[$t->tid]['fils'][$b->tid]['name'] = $b->name;
			foreach($docs as $d)
			{
				
				if($d['cat']==$b->tid)
				{
					$tab[$t->tid]['files'][$d["cat"]][$d['id']]['id']=$d['id'];
					$tab[$t->tid]['files'][$d["cat"]][$d['id']]['title']=$d['title'];
					$tab[$t->tid]['files'][$d["cat"]][$d['id']]['body']=$d['body'];
					$tab[$t->tid]['files'][$d["cat"]][$d['id']]['chemin']=$d['chemin'];
					$tab[$t->tid]['files'][$d["cat"]][$d['id']]['date_de_publication']=$d['date_de_publication'];
				}
			}	
		}	
		
	}
	
}


?>
<style>
	h4
	{
		margin-top :5px;
		margin-bottom :5px;
	}
</style>
<div class="col-sm-4" style="margin-bottom : 5px; background : #fafafa; padding :5px ;">
	
	<ul class="nav nav-pills nav-stacked" role="tablist">
		<?
		$i=0;
		$class="";

		foreach($tab as $d)
		{

			if ($i==0)
				$class="active";
			echo '<li class="presentation '.$class.'"><a href="#cat-'.$d['id'].'" role="tab" data-toggle="tab">'.$d['name'].'</a></li>';
			$i++;
			$class="";
			
		}
		?>
	</ul>
	
</div>
<div class="col-sm-8">
	<div class="tab-content" id="myTabContent">
		<?
		$i=0;
		$class="";
		foreach($tab as $d)
		{
		

		
			if ($i==0)
				$class="in active";
			echo '<div role="tabpanel" class="tab-pane fade '.$class.'" id="cat-'.$d['id'].'">';
			$k=0;
			$class="";
			
			if(isset($d["files"]))
			{
				
				foreach ($d["files"] as $f => $files)
				{
					echo '<div class="col-sm-12" >';
					echo '<div class="panel panel-default panel-cgf">';
					echo '<div class="panel-cgf-header">';
					foreach($terms as $t)
						if($t->tid==$f)
							echo '<h4>'.$t->name.'</h4>';
						echo '</div>';
						echo '<div class="panel-cgf-body ">';
						echo '<div class="col-sm-12">';
						echo '<table class="table table-striped table-hover table-condensed table-cgf table-responsive">';
						foreach ($files as $file)
						{
						//var_dump($file["chemin"]);
							
							echo '<tr><td><a href="'.$file["chemin"].'" target="_blank">'.ucfirst($file["title"]).'</a>';
						?>							
                            
                            
                            <?php if( !empty($file['body']) ) : ?>
<div class="well well-sm well-small-italic" ><?php print($file['body']); ?></div>
                            <?php endif; ?>
							
							
							<?php echo  '</td>'; 
							
							// on a ffiche le bouton de modification direct pour les membres ayant le droit
							if(user_access('edit any soutien_juridique_ content') || user_access('edit own soutien_juridique_ content')) {  ?>
							
                            <td align="right"> <a class="btn btn-xs btn-primary"  href="<?php print 'node/'.$file["id"].'/edit' ; ?>"><?php print t('Edit'); ?></a></td>
                            
                            
							<?php }
							
							
							
							echo '</tr>';
						}
						echo '</table>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					
				}
				echo '</div>';
				$i++;
				$class="";
			}
			
			
			?>
		</div>
	</div>
