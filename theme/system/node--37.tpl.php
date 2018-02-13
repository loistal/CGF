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
	<div class="col-sm-12">
		<div class="panel panel-default panel-cgf panel-cgf-primary panel-cgf-important">
			<div class="panel-cgf-header">
				<h3> Offres des stages </h3>
			</div>
			<div class="panel-cgf-body">
				<div class="panel-cgf-body-content">
					<?php 
					$view = views_get_view('offres_de_stages');
					//$view->set_display('page');
								//$view->set_arguments(array($content->vid));
					//$view->pre_execute();
					$view->execute();
					print $view->render();
					
					?>
				</div>
			</div>
		</div>
	</div>
</div>






<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
	<?php print $drupal_render_children ?>
<?php endif; ?>
