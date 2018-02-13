<?php

/*
Template personnalisé pour l'affichage des 
*/

$terms = field_view_field('node', $node, 'field_tags');
$term_id =   $terms['#items'][0]['taxonomy_term']->tid;

$term_name =   $terms['#items'][0]['taxonomy_term']->name;

?>


<?php 
if($term_id == '10' ) { ?>
<div class="col-sm-4 col-sm-push-8 ">
	<?php 
	$view = views_get_view('organisation_concours');
	$view->set_display('block');
	$view->pre_execute();
	$view->execute();
	print $view->render();
	?>
</div>
<div class=" col-sm-8 col-sm-pull-4  ">
	<?php  print render($content); ?>
</div>




<?php }  else { ?>

<div class="col-md-12">
	<?php  print render($content); ?>
</div>

<?php } ?>



