<?php
/*
Template personnalisé pour l'affichage des 
*/
?>

<div class="row">
	<div class="col-sm-12">
		
		
		
	</div>
</div>


<div class="row">
	<div class="col-sm-12"><?php  print render($content); ?></div>
	<div class="col-sm-12"><h2> Les communes recrutent</h2>
		<?php 
		$view = views_get_view('offres_d_emploi');
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
