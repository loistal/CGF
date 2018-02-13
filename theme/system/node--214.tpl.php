<?php
/*
Template personnalisé pour l'affichage des 
*/
?>


<div class="col-sm-12">
	<?php  print render($content); ?>
</div>
<div class="row">

	<div class="col-md-12">
		<?php 
		$view = views_get_view('se_former');
		$view->set_display('fonctionnaire');
		$view->set_arguments(array("Formations pour les agents non titulaires"));
		$view->pre_execute();
		$view->execute();
		print $view->render();
		?>
	</div>
</div>