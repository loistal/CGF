<?php 
/*
Template personnalisé pour l'affichage des dernières offres d'emploi sur la pgae d'accueil
*/
$options = array('ABSOLUTE' => true); 

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
// var_dump($rows);
$contextual_filters = $view->args;

?>

<?php
if(isset($rows) && count($rows)>0)
{
	
		//var_dump($row);
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
					echo '<span class="label label-warning">Catégorie '.$row->field_field_categorie[0]["rendered"]["#title"].'</span> ';	
					
					
					?>
					<span class="label label-danger">
						<?php
						echo 'Date limite de dépôt : '.strip_tags($row->field_field_date_limite_des_candidatur[0]["rendered"]["#markup"]);
						?>
					</span>
					<br/>
					<?php
					echo '<em><strong>Spécialité '.$row->field_field_specialites[0]["rendered"]["#title"].'</strong></em>, ';	
					echo '<em>sur '.$row->field_field_commune[0]["rendered"]["#title"].'</em>';
					?>
				</ul>
			</div>
			<?php
		}
		?>
		<div class="mini-panel-cgf-link" style="padding-left :5px;">
			<a href="<?php echo url('node/32', $options); ?>" class="btn btn-primary btn-sm btn-actus">Toutes les offres d'emploi</a>
		</div>
	</div>
</div>

<?php

}


?>


