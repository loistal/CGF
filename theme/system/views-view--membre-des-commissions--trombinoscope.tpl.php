<?php 
/*
Template personnalisé pour l'affichage des membres de la commission 
*/


$vars = get_defined_vars(); 
$lines = $vars['variables']['view']->result;
$i=0; 


$cat = $membres = array(); 

foreach($lines as $line) {
	
	$info_membre = $line->_field_data['pid']['entity'] ; 



	$tid = (int)$line->field_data_field_type_de_membre_field_type_de_membre_tid ; 
	
	if($tid > 0) {
		$term = taxonomy_term_load($tid);
		$cat[$tid] = $term->name;


	} else { 
		$cat[0] = ''; 
	}
	//var_dump($cat); 


	$membres[$tid][$line->pid]['nom']  = $membres[$tid][$line->pid]['prenom'] = "-"; 
	
	// Profile ID 
	$membres[$tid][$line->pid]['pid'] = $line->pid ; 
	
	
	// NOM
	if(  count($info_membre->field_nom_membre_commission) > 0) {
		$membres[$tid][$line->pid]['nom'] = $info_membre->field_nom_membre_commission['und'][0]['safe_value'] ; 
	}
	
	// Prénom 
	if(count($info_membre->field_prenom_membre_commission) > 0) { 
		$membres[$tid][$line->pid]['prenom'] = $info_membre->field_prenom_membre_commission['und'][0]['safe_value'] ; 
	} 
	
	// photo 
	if(count($info_membre->field_photo_membre_commission) > 0) { 
		$membres[$tid][$line->pid]['photo'] = $info_membre->field_photo_membre_commission['und'][0]['uri'] ; 
	}
	
	
	if(count($info_membre->field_titre_qualit_poste) > 0) { 
		$membres[$tid][$line->pid]['titre_qualite'] = $info_membre->field_titre_qualit_poste['und'] ; 
	}
	
}



// on doit afficher les élus et les Représentants syndicaux, puis afin les autres... 
$lesautres = array(); //array_kshift($cat);  

//var_dump($cat); 
if (is_array($cat) && count($cat, COUNT_RECURSIVE) > 0) { 
	foreach($cat as $k => $categorie) { 
		if($k === 0) continue; 

		?>

		<h4><?php echo $categorie; ?></h4>
		<div class="row">
			<?php 
			foreach($membres[$k] as $membre) {
				if(!empty($membre)) {
	//var_dump($membre);  die(); 
					
					?>
					<div class="col-sm-3 ">
						<div class="thumbnail profil_membre_commission text-center">
							
							<?php if ( !isset($membre['photo']) || $membre['photo'] == '' ) { ?>
							<img src="<?php echo file_create_url('public://avatar.jpg') ?>" class="circular"/>
							<?php  } else { ?>
							<img src="<?php echo file_create_url($membre['photo']) ?>" class="circular"/>
							<?php  } ?>
							
							<h3 class="nom_membre"> <?php echo $membre['nom']?> <?php echo $membre['prenom']?></h3>
							<h4 class="poste_qualite_titre">
								<?php 
								if(isset($membre['titre_qualite']) && is_array($membre['titre_qualite']) && !empty($membre['titre_qualite'] )){
									foreach($membre['titre_qualite'] as $k => $v) {
										echo $v['safe_value'].'<br>'; 	
									}
								}
								?>
							</h4>
						</div>
					</div>
					<?
				}
			}
			?>

		</div>

		<?php
		
	}
}


if (isset($membres[0]) && is_array($membres[0]) && count($membres[0], COUNT_RECURSIVE) > 0) {
	?>
	<h4>Membres de la commission</h4>
	<div class="row">
		<?php
		foreach($membres[0] as $membre) { 
			if(!empty($membre)) {
	//var_dump($membre);  die(); 
				?>
				<div class="col-sm-3 ">
					<div class="thumbnail profil_membre_commission text-center">
						
						<?php if ( !isset($membre['photo']) || $membre['photo'] == "") { ?>
						<img src="<?php echo file_create_url('public://avatar.jpg') ?>" class="circular"/>
						<?php  } else { ?>
						<img src="<?php echo file_create_url($membre['photo']) ?>" class="circular"/>
						<?php  } ?>
						
						<h3 class="nom_membre"> <?php echo $membre['nom']?> <?php echo $membre['prenom']?></h3>
						<h4 class="poste_qualite_titre">
							<?php 
							if(isset($membre['titre_qualite']) && is_array($membre['titre_qualite']) )
							{
								foreach($membre['titre_qualite'] as $k => $v) 
								{
									echo $v['safe_value'].'<br>'; 	
								}
							}
							?>
							
						</h4>
					</div>
				</div>
				<?
			}
		}
		?>

		<?php }


function array_kshift( &$arr )
{
    $keys = array_keys( $arr );
    $r = array( $keys[0] => $arr[$keys[0]] );
    unset( $arr[$keys[0]] );
    return $r;
}

/*
		function array_kshift(&$arr)
		{
			
			if(count($arr)==0) return ;  
			list($k) = array_keys($arr);
			$r  = array($k=>$arr[$k]);
			unset($arr[$k]);
			return $r;
		}

*/

		?>







