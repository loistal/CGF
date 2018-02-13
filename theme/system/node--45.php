<?php
/*
Template personnalisé pour l'affichage des 
*/
?>

<div class="row">
	<div class="col-sm-12">
		<?php  print render($content); ?>
		
	</div>
</div>


<div class="row">
	<div class="col-sm-8"><?php  print render($content); ?></div>
	<div class="col-sm-4">
		<?php 
		$view = views_get_view('organisation_concours');
		$view->set_display('block');
				//$view->set_arguments(array($content->vid));
		$view->pre_execute();
		$view->execute();
		print $view->render();
		
		?>
	</div>
</div>






<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
	<?php print $drupal_render_children ?>
<?php endif; ?>
