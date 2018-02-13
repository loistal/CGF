<?php
/*
Template personnalisé pour l'affichage des évènements concours 
*/



$rows = $view->result; 

foreach($rows as $row) { 
	$actu = $row; 

	?>
	<div class="actus_sous_menu">
		<h5><?php echo $row->node_title ?></h5>
		<small><?php echo $row->field_body[0]['rendered']['#markup'] ?></small>
		<hr />
	</div>

	<?php

}



