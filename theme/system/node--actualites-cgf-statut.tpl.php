

<div class="col-sm-12">
	<div class="col-md-12" >
		<?php  print render($content); ?>
	</div>
	
</div>

<?php echo $content['body']['#bundle']; ?>

<?php
$options = array('absolute' => TRUE);
$vars = get_defined_vars(); 
$row = $vars['variables'] ; 
//var_dump($row); 

echo '<h3><a href="'.url( './actualites/statut/').'">Voir toutes les actualités du statut</a></h3>';
?>