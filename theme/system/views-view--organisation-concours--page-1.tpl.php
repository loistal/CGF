<?php

/*
Template personnalisé pour l'affichage de la page regroupant tous les articles taggé : 'Organisation'
*/

?>


<div class="row">

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
		
		<?php 
		$view = views_get_view('organisation_concours');
		$view->set_display('page');
		$view->pre_execute();
		$view->execute();
		print $view->render();
		?>
		
		
	</div>
	
	

</div>

