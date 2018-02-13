<?php
/*
Template personnalisé pour l'affichage de la page "se former" 
*/
?>

<div class="row">
	<div class="col-sm-12">
		
		
		
	</div>
</div>


<div class="row">
	<div class="col-sm-8">
		<?php  print render($content); ?>
		
		<br />
				
		<br />
		
		<hr>
		
		<br />
		
		<div class="row">

			<div class="col-md-12">
				<?php 
				$view = views_get_view('se_former');
				$view->set_display('quelles_formations');
				$view->set_arguments(array("Quelles Formations"));
				$view->pre_execute();
				$view->execute();
				print $view->render();
				?>
			</div>
			<div class="col-md-6">
				<?php 
				$view = views_get_view('se_former');
				$view->set_display('infos_pratiques');
				$view->set_arguments(array("Informations pratiques"));
				$view->pre_execute();
				$view->execute();
				print $view->render();
				?>
			</div>
			<div class="col-md-6">
				<?php 
				$view = views_get_view('se_former');
				$view->set_display('tout_savoir_sur_la_formation');
				$view->set_arguments(array("Tout savoir sur la formation"));
				$view->pre_execute();
				$view->execute();
				print $view->render();
				?>
			</div>
			
			
			<div class="row-fluid">
				
				
				<?php 
				$block = module_invoke('block','block_view','11');
				print render($block['content']);
				?>
				
				
			</div>
			

		</div> 
		
		
		
	</div>
	
	
	<div class="col-sm-4">
		<div class="col-md-12">
			<?php 
			$view = views_get_view('vue_catalogue_2014');
			$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
			$view->pre_execute();
			$view->execute();
			print $view->render();
			?>
		</div>
		<div class="col-md-12">
			<?php 
			$view = views_get_view('liste_documents_formations_2014');
			$view->set_display('fond_doc');
				//$view->set_arguments(array($content->vid));
			$view->pre_execute();
			$view->execute();
			print $view->render();
			?>
		</div>
		<div class="col-md-12">
			<?php 
			$view = views_get_view('actus_formation_cgf');
			$view->set_display('panel_accueil');
			$view->set_arguments(array("Actu - Formation"));
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
