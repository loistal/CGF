<?php 
/*
Template personnalisé pour l'affichage de toutes les offres de stages (bourses des stages)
*/


$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
// var_dump($rows);
$contextual_filters = $view->args;
$options = array('ABSOLUTE' => true); 
?>

<?php
if(isset($rows) && count($rows)>0)
{
	
	
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
							//var_dump($row);
				?>
				<div class="panel-cgf-body-title">
					<span class="mini-panel-cgf-title">
						<em>
							<?php
							echo $row->_field_data["nid"]["entity"]->title;
							
							?>
							
							
						</em>
					</span>
				</div>
				<div class="panel-cgf-body-content">
					<?php
					
					echo '<a href="'.file_create_url($row->field_field_fichier_offre_stage[0]["rendered"]["#file"]->uri).'">Voir le document</a>';
					echo ' - <em>sur '.$row->field_field_commune_stage[0]["rendered"]["#title"].'</em>';
					?>
				</ul>

			</div>
			<?php
		}

		?>
		<div class="mini-panel-cgf-link" style="padding-left :5px;">
		<a href="<?php echo url('node/37', $options); ?>" class="btn btn-primary btn-sm btn-actus ">Toutes les offres de stages</a>
		</div>
	</div>
</div>

<?php
}
?>


