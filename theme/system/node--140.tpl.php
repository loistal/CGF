<?php
/*
Template personnalisé pour l'affichage de la page de connexion 
*/



$vars = get_defined_vars(); 
$blocs = array(
	array('id' => 12, 'link' => 'membres'), 
	array('id' => 13, 'link' => 'membres-commissions'), 
	array('id' => 14, 'link' => 'candidats'), 
	array('id' => 17, 'link' => 'testtest'),
	); 


	?>

	<div class="row">
		<div class="col-sm-12">
			<?php
			if(count($vars['body']) > 0 ) {
				echo $vars['body'][0]['value']; 
			}
			?>
		</div>
	</div>
	<br />
	<div class="row-fluid">
		<?php
		

		foreach($blocs as $bloc) { 
			
			/* Print the whole custom block (with divs, title etc.) */
			$block = block_load('block',$bloc['id']);
//var_dump($block); die();
			$block_content = module_invoke('block','block_view',$bloc['id']);
			?>
			<div class="col-sm-4">
				<div class="col-md-12">
					<div class=" panel panel-default panel-cgf panel-cgf-primary panel-cgf-connexion" style="margin-bottom : 0px !important;">
						<div class="panel-cgf-header">
							<br/>
							<h3><?php print $block->title; ?></h3>
						</div>
						<div class="panel-cgf-body">
							<div class="panel-cgf-body-content">
								<?php print $block_content['content']; ?>
							</div>
							
						</div>
					</div>
					<a href="<?php echo $bloc['link']; ?>" class="btn btn-block btn-primary btn-connexion">Connectez-vous</a>
				</div>
			</div>
  <!--<div class="col-sm-4 thumbnails">
    <div class="thumbnail connexion">
      <div class="caption">
        <h3><?php //print $block->title; ?></h3>
        <?php //print $block_content['content']; ?>
        <p><a href="<?php //echo $bloc['link']; ?>" class="btn btn-block btn-primary">Connectez-vous</a> </p>
      </div>
    </div>
</div>-->
<?php } ?>
</div>
