<?php 
/*
Template personnalisé pour l'affichage des articles concernant les formations obligatoires
Des pdfs sont aussi téléchargeables
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
 // var_dump($rows);
$contextual_filters = $view->args;

$options = array('absolute' => TRUE);
$date_actu= getdate();
//echo 'date actu : '.date('d/m/Y H:i',$date_actu[0]).'<br/>';
?>

<div class=" panel panel-default panel-cgf panel-cgf-primary panel-cgf-important" >
	<div class="panel-cgf-header">
		<h3 class="panel-cgf-title">
			<?php  echo $contextual_filters[0]; ?>
		</h3>
	</div>
	<div class="panel-cgf-body">
		<div class="panel-cgf-body-content">

			<?php
			if(isset($rows) && (count($rows)>0))
			{
				echo '<table class="table table-condensed table-hover">';
				foreach ($rows as $row)
				{
					echo '<tr><td><a href="'.url('node/'.$row->nid , $options).'">'.$row->node_title.'</a></td></tr>';
					
				}
				echo '</table>';
			}
			else
			{
				echo '<h4>Il n\'y a aucun article pour le moment</h4>';
			}
			?>
		</div>
	</div>
</div>
