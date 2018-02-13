<?php
/*
Template personnalisé pour l'affichage des 
*/
?>


<div <?php print $layout_attributes; ?> class="<?php print $classes; ?>">
	<?php if (isset($title_suffix['contextual_links'])): ?>
		<?php print render($title_suffix['contextual_links']); ?>
	<?php endif; ?>
	<div class="row">
		<div class="col-sm-8">
			<?php print render($content);  ?>
			<?php
			
			$view = views_get_view('marches_publics');
			//$view->set_display('five_last');
			//$view->set_arguments(array($content->vid));
			//$view->pre_execute();
			$view->execute();
			print $view->render(); 
			?>
		</div>
		<div class="col-sm-4">
			
			
			<?php
			
			$view = views_get_view('marches_publics');
			$view->set_display('five_last');
			//$view->set_arguments(array($content->vid));
			$view->pre_execute();
			$view->execute();
			print $view->render(); 
			?>
			

			
			
			
			
		</div>
	</div>
</div>


<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
	<?php print $drupal_render_children ?>
<?php endif; ?>
