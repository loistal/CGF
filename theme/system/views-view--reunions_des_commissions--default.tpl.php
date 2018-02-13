<?php

/*
Template personnalisé pour l'affichage des 
*/

$vars = get_defined_vars(); 
die(var_dump($vars)); 

/**
* ON VERIFIE QUE L'UTIILSATEUR EST CONNECTE 
* ET QU'IL APPARTIENT BIEN A LA COMMISSION QUI S'AFFICHE
**/

var_dump(get_argument()); 

if( user_is_logged_in() ) { 
	$profil = profile2_load_by_user($user->uid); 

	$key = key($profil) ; 
	if($key === 'membre_d_une_commission' ) { 
		
		$commissions = $profil[$key]->field_commission['und']; 
		
		if(is_array($commissions)) { 
			foreach($commissions as $c) { 
				$ids[] = $c['target_id']; 
			}
		}
		
		
		/*
		if(in_array(get_argument(), $ids)) { 
		
		
		} 
		*/
		
		
		
	}
	



} 


