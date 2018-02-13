<?php
/*
Template personnalisé pour l'affichage l'affichage synthétique des articles de la formations
*/

?>

<div class="row">
	<div class="col-sm-12">
		
		
		
	</div>
</div>


<div class="row">
	<div class="col-sm-12"><?php  print render($content); ?></div>
	<div class="col-sm-12">
		<?php 
		$view = views_get_view('directeurs_statut');
				//$view->set_display('');
				//$view->set_arguments(array($content->vid));
				//$view->pre_execute();
		$view->execute();
		print $view->render();
		$view = views_get_view('responsables_statuts');
				//$view->set_display('');
				//$view->set_arguments(array($content->vid));
				//$view->pre_execute();
		$view->execute();
		print $view->render();
		?>
	</div>
</div>






<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
	<?php print $drupal_render_children ?>
<?php endif; ?>
