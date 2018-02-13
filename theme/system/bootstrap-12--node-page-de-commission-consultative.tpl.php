<?php
/*
Template personnalisé pour l'affichage des commissions consultatives
*/

$vars = get_defined_vars(); 

$content = $vars['elements']["#node"];  

$display_trombi = $display_docs = false; 

// On vérifie si on doit afficher le trombi
if(isset($content->field_affichage_du_trombinoscope['und'][0]['value']) && 
(int)$content->field_affichage_du_trombinoscope['und'][0]['value'] === 1
) { 
	$display_trombi = true; 
}

// On vérifie l'affichage des documents 
if(isset($content->field_affichage_des_documents['und'][0]['value']) && 
(int)$content->field_affichage_des_documents['und'][0]['value'] === 1
) { 
	$display_docs = true; 
}

// affichage des infos de la commission
// permet de masquer pour les membres d'une commission. 
$display = true; 

if( user_is_logged_in() ) { 
	
	$profil = profile2_load_by_user($user->uid); 
	

	$key = key($profil) ; 
	if($key === 'membre_d_une_commission'  ) { 
		$display = false; 
	}

}


//var_dump($display, $display_trombi, $display_docs); 


/** gestion du titre **/

$title = strtolower(array_shift(explode(' ', (string)$content->title))); 
$introMembres = "Les membres " . (($title === 'commission')? 'de la ' : 'du ') ;   
$membresTitle = $introMembres.$content->title; 


?>

<<?php print $layout_wrapper; print $layout_attributes; ?> class="<?php print $classes; ?>">
<?php if (isset($title_suffix['contextual_links'])): ?>
	<?php print render($title_suffix['contextual_links']); ?>
<?php endif; ?>

<?php /*?> PRESENTION ET RACCOURIS VERS LES COMMISSIONS <?php */?>

<?php 
// on affiche que si le membre est dans cette commission...

if($display) : ?>

<div class="row">
	<div class="col-sm-4 col-sm-push-8 ">
		
		
		<?php
		
		$view = views_get_view('commissions_statutaires');
		$view->set_display('menu_rapide');
		$view->set_arguments(array($content->vid));
		$view->pre_execute();
		$view->execute();
		print $view->render(); 
		?>
		
		
	</div>
	
	<div class=" col-sm-8 col-sm-pull-4  ">
		<h3>Les compétences</h3>
		
		<?php 
		if(isset($content->field_les_competences['und'][0]['value']))
		{
			echo $content->field_les_competences['und'][0]['value']; 
		}
		?>
		
		<h3>Le fonctionnement</h3>
		<?php 
		if(isset($content->field_le_fonctionnement['und'][0]['value']))
		{
			echo $content->field_le_fonctionnement['und'][0]['value'];
		}
		?>
		
		<h3>La composition</h3>
		<?php 
		if(isset($content->field_la_composition['und'][0]['value']))
		{
			echo $content->field_la_composition['und'][0]['value']; 
		}
		?>
		
		<?php
		if(isset($content->field_reglement_interieur['und'][0]['uri']) && $content->field_reglement_interieur['und'][0]['uri']!="" )
		{
			echo ' <h3>Règlement intérieur</h3>';
			echo '<a href="'.file_create_url($content->field_reglement_interieur['und'][0]['uri']).'">Consulter le règlement de la commission</a>';
		}
		?>
		
        <?php
		if(isset($content->field_fichier_cgf_statut['und']) && is_array($content->field_fichier_cgf_statut['und']))
		 { 
		 	if($display_docs) { 
				?>
				<h3>Documents téléchargeables</h3>
                
                <table class="table table-striped table-hover table-condensed">
                <thead><th>Titre</th></thead>
                
                 <?php foreach($content->field_fichier_cgf_statut['und'] as $doc) : 
				 

				 ?>
				<tr>
                <td><?php //echo print_r($doc, 1); echo $doc['uri'] ?> 
				<a href="<?php file_create_url($doc['uri']) ?>" title="<?php echo $doc['title']?>" target="_blank"><? print($doc['description']); ?></a>
                </td>
                
                </tr>
               
				<?php endforeach; ?>
                </table>    
                
				<?php
			} // end display_docs
		 }
		?>
        
        
	</div>
		
</div>

<?php endif ;?>


<?php /*?> AFFICHAGE DU TROMBINOSCOPE <?php */?>

<div class="row">


<?php 
// on affiche que si le gars est dans cette commission...

if($display) : ?>

<?php if($display_trombi) :?>
	<div class="col-sm-12"><h2>Trombinoscope</h2></div>
	<?php
	if(isset($content->field_president_commission['und'][0]['entity']))
	{
		$president = $content->field_president_commission['und'][0]['entity']; 
	}
	if (isset($president) && count($president) > 0)  {  ?>
	<div class="col-sm-12">
		
		<div class="thumbnail profil text-center">
			<div class="president-image">
				<?php if (count($president->field_photo_membre_commission) == 0) { ?>
				<img src="<?php echo file_create_url('public://avatar.jpg') ?>" class=" circular-director"/>
				<?php  } else { ?>
				<img src="<?php 
				if(isset($content->field_president_commission['und'][0]['entity']))
				{
					echo file_create_url($president->field_photo_membre_commission['und'][0]['uri']).'"  class="circular-director" />';
				}
				?>
				<?php  } ?>
				
			</div>
			<div class="president-heading">
				<h3>
					<?php 
					if(isset($president->field_nom_membre_commission['und'][0]['safe_value']))
					{
						echo $president->field_nom_membre_commission['und'][0]['safe_value']; 
					}
					if(isset($president->field_prenom_membre_commission['und'][0]['safe_value']))
					{
						echo $president->field_prenom_membre_commission['und'][0]['safe_value'];
					}
					?>
				</h3>
				<h4>Président</h4>
				<span class="help-block">
					<?php 
					
					$arr_titre = array(); 
					if(isset($president->field_titre_qualit_poste['und']))
					{
						foreach($president->field_titre_qualit_poste['und'] as $k => $v) {
							$arr_titre[] = $v['safe_value']; 		
						}
					}
					echo implode(', ' , $arr_titre); 
					?>
					
				</span>
			</div>
		</div>
		
		
	</div>
	<br />
	<?php } ?> 
	
	<div class="col-sm-12">
		<h3><?php echo $membresTitle; ?></h3>
		
		<?php
		
		$view = views_get_view('membre_des_commissions');
		$view->set_display('trombinoscope');
		$view->set_arguments(array($content->vid));
		$view->pre_execute();
		$view->execute();
		print $view->render();
		
		?>
	
	</div>
   <?php endif; ?> 
    
 <?php /*?> END AFFICHAGE DU TROMBINOSCOPE <?php */?>
<?php endif ;?>
    
    <?php /*?> 
	AFFICHAGE DES REUNIONS :
	Seulement pour les membres des commissions inscrits à cette commission.
	<?php */?>
	<div class="col-sm-12">
		<?php
		
		$view = views_get_view('reunions_des_commissions');
		$view->set_display('block_1');
		$view->set_arguments(array($content->vid));
		$view->pre_execute();
		$view->execute();
		print $view->render();
		
		?>
		
	</div>
	
	
	
</div>




</<?php print $layout_wrapper ?>>


<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
	<?php print $drupal_render_children ?>
<?php endif; ?>
