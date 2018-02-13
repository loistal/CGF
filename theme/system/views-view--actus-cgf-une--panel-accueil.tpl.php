<?php 

/*
Template personnalisé pour l'affichage des acutalités du cgf en général  sur le panneau "en ce moment à la une"
->page d'accueil
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
// var_dump($rows);
$contextual_filters = $view->args;
$options = array('absolute' => TRUE);
?>

<?php
if(isset($rows) && count($rows)>0)
{
	//echo '<div class="col-sm-5">';
	?>
	
	<div class="panel panel-default panel-cgf panel-cgf-primary " >
		<div class="panel-cgf-header">
			<h3 class="panel-cgf-title">
				<?php  echo $contextual_filters[0]; ?>
			</h3>
		</div>
		<div class="panel-cgf-body" >
			<?php foreach ($rows as $row)
			{
				?>
				<div>
					<?php
					if(isset($row->field_field_illustration[0]["rendered"]["#item"]["uri"]) && $row->field_field_illustration[0]["rendered"]["#item"]["uri"]!="")
					{
						echo '<img src="'.file_create_url($row->field_field_illustration[0]["rendered"]["#item"]["uri"]).'" alt="'.$row->field_field_illustration[0]["rendered"]["#item"]["filename"].'" class="img-responsive" style="margin-bottom : 5px;"/>';
					}
					?>
					<div class="panel-cgf-body-title">
						<span class="mini-panel-cgf-title" >
							
							<?php echo $row->_field_data["nid"]["entity"]->title; ?>
							<span class="label label-warning pull-right">
								<?php
								echo date("d/m/Y",$row->_field_data["nid"]["entity"]->changed);
								?>
							</span>
							
						</span>
					</div>
					<div class="panel-cgf-body-content">
						<div class="">
							<?php 
							
							echo $row->field_body[0]["rendered"]["#markup"]; 
							?>
						</div>
						<?php if(isset($more) && (count($more)>0))
					{
						$href=explode("\"",$more);
						echo '<div class="mini-panel-cgf-link">';
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
			?>
		</div>

	</div>
	
	<?php
	//echo '</div>';
}