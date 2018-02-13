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

	<div class="col-md-12">
		<?php 
		$view = views_get_view('se_former');
		$view->set_display('formations_statutaires');
		$view->set_arguments(array("Les formations statutaires"));
		$view->pre_execute();
		$view->execute();
		print $view->render();
		?>
	</div>
</div>