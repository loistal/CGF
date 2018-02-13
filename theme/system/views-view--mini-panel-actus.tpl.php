<?php 
/*
Template personnalisé pour l'affichage des actualités dans les sous-menus(l'emploi, les concours, le statut, la formation, les ressources)
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 

?>
<div class="mini-panel-cgf panel-cgf-primary">
	<?php
	if(isset($rows) && count($rows) >0)
	{
//var_dump($rows);
	}
	if(isset($rows) && count($rows)>0)
	{
		foreach ($rows as $row)
		{
			?>
			<div class="mini-panel-header">
				
				
				<h4 class="mini-panel-cgf-title">
					<?php
					echo $row->_field_data["nid"]["entity"]->title;
					

					?>
					
				</h4>
				<?php /*?><h4 class="mini-panel-cgf-author">
					<?php
					echo $row->users_node_name.'<span class="mini-panel-cgf-date"> - '.date("d/m/Y",$row->_field_data["nid"]["entity"]->changed).'&nbsp;</span>';
					?>
				</h4><?php */?>
				
				
			</div>
			<div class="mini-panel-body">
				<div class="mini-panel-cgf-content">
					<?php
					$options = array('absolute' => TRUE);
					echo '<div class="well well-sm well-actus-cgf">'.text_summary(strip_tags($row->field_body[0]["rendered"]["#markup"]),NULL,300).'...&nbsp;'.'<a href="'.url('node/'.$row->nid , $options).'" class="btn-lire">Lire la suite</a></div>';
					?>
					<?php if(isset($more) && (count($more)>0))
					{
						$href=explode("\"",$more);
						echo '<div class="mini-panel-cgf-link pull-right">';
						echo '<a class="btn btn-primary btn-sm btn-actus" href="'.$href[3].'">';
						echo strip_tags($more);
						echo'</a>';
						echo '</div>';
					}
					?>
				</div>
			</div>
			
			<?php
		}	
	}

	else
	{
		?>
		<div class="col-md-12 mini-panel-cgf-body" >
			<h4 class="mini-panel-cgf-title">
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<em>
					<?php
					$rows= $vars['variables']['view'];
					echo $rows->query->pager->display->handler->handlers["empty"]["area"]->options["content"];
					?>
				</em>
			</h4>
		</div>
		<?php
	}
	?>
</div>

