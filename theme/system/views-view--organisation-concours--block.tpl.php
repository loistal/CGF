<?php
/*
Template personnalisé pour l'affichage des 
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result;

$nid = arg(1); 

?>
<br>
<div id="organisation-concours--block" class="col-xs-12">
	<div class="list-group">
		<?php 



		foreach($rows as $node) {
			$class = ($nid===$node->nid)? "active" : "" ; 
			?>
			<a href="<?php echo drupal_lookup_path('alias',"node/".$node->nid) ?>" class="list-group-item <?php echo $class; ?>">
				<?php echo $node->node_title; ?>
			</a>

			
			<?php } ?>
		</div>
	</div>

	