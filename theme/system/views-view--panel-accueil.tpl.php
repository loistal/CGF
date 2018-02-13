<?php 
/*
Template personnalisé pour l'affichage des différents panneaux présents sur la page d'accueil
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
// var_dump($rows);
$contextual_filters = $view->args;

?>

<?php
if(isset($rows) && count($rows)>0)
{
	
		//var_dump($contextual_filters);
	?>
	
	
	<div class="panel panel-default panel-cgf panel-cgf-important" >
		<div class="panel-cgf-header">
			<h3 class="panel-cgf-title">
				<?php  echo $contextual_filters[0]; ?>
			</h3>
		</div>
		<div class="panel-cgf-body">
			
			<?php foreach ($rows as $row)
			{
				?>
				<div class="panel-cgf-body-title">
					<span class="mini-panel-cgf-title">
						<em>
							<?php
							echo $row->_field_data["nid"]["entity"]->title;
							?>
							
							<span class="label label-warning pull-right">
								<?php
								echo date("d/m/Y",$row->_field_data["nid"]["entity"]->changed);
								?>
							</span>
						</em>
					</span>
				</div>
				<div class="panel-cgf-body-content">
					<?php 
					$options = array('absolute' => TRUE);
					echo text_summary(strip_tags($row->field_body[0]["rendered"]["#markup"]),NULL,300).'...&nbsp;'.'<a href="'.url('node/'.$row->nid , $options).'" class="btn-lire">Lire la suite</a>';
					?>

					
				</div>

				<?php
				
			}

if(isset($more) && (count($more)>0))
				{

						$href=explode("\"",$more);
						echo '<div class="mini-panel-cgf-link" style="padding-left :5px;">';
							echo '<a class="btn btn-primary btn-sm btn-actus" href="'.$href[3].'" >';
								echo strip_tags($more);
							echo'</a>';
						echo '</div>';
				}
			?>
			
		</div>

	</div>
	
	<?php
	
}
?>


