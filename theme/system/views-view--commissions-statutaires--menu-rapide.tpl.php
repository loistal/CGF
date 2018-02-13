<?php
/*
Template personnalisé pour l'affichage des titres des différentes commissions. Cette vue est visible sur la page des commissions consultatives
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result;

$nid = arg(1); 

?>
<br>

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


	
	