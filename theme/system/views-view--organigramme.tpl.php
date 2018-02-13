<?php
/*
Template personnalisé pour l'affichage de l'organigrames du CGF
*/

//drupal_flush_all_caches();
$vars = get_defined_vars();
$rows = $vars['variables']['view']->result;
//die(var_dump($rows));
foreach($rows as $b)
{
	$id_user = $b->uid;
	//$user_details = user_load($id_user);
	//$user_roles = $user_details->roles;

	$id=$b->profile_users_pid;
	$detail_profil = profile2_load($id);
	//die(var_dump($detail_profil));

	$roles="";
	$prenom="";
	$nom = $b->field_field_nom_membre_cgf[0]["rendered"]["#markup"];
	if (isset($b->field_field_prenom_membre_cgf[0]["rendered"]["#markup"]))
	{
		$prenom = $b->field_field_prenom_membre_cgf[0]["rendered"]["#markup"];
	}
	if(isset($detail_profil->field_sous_la_direction_de_["und"][0]["target_id"]))
	{
		$sous_la_direction_de=$detail_profil->field_sous_la_direction_de_["und"][0]["target_id"];
	}
	else
	{
		$sous_la_direction_de="";
	}
	$identifiant=$b->users_name;
	if(isset($b->field_field_directeur_du_cgf[0]["rendered"]["#markup"]))
	{
		$directeur_du_cgf=$b->field_field_directeur_du_cgf[0]["rendered"]["#markup"];
	}
	else
	{
		$directeur_du_cgf="";
	}




	if(isset($b->field_field_titre_qualite_poste[0]["rendered"]["#markup"]))
	{
		$poste=$b->field_field_titre_qualite_poste[0]["rendered"]["#markup"];
	}
	//echo "[{v:'".$identifiant."',f:'<span class=\"".$class." \">".$prenom." ".$nom."</span>'}, '".$sous_la_direction_de."', '".$nom." ".$prenom."'],";
	$tab[$id]['identifiant']=$identifiant;
	$tab[$id]['id_user']=$id_user;
	if(isset($id))
	{
		$tab[$id]['id']=$id;
	}
	$tab[$id]['nom']=$nom;
	$tab[$id]['prenom']=$prenom;
	$tab[$id]['directeur']=$directeur_du_cgf;
	//$tab[$id]['roles']=$roles;
	$tab[$id]['sous_la_direction_de']=$sous_la_direction_de;
	$tab[$id]['poste']=$poste;
	if(isset($b->field_field_profil_membre_cgf[0]["rendered"]["#markup"]))
		$tab[$id]['departement']=$b->field_field_profil_membre_cgf[0]["rendered"]["#markup"];
	if(isset($b->field_field_profil_membre_cgf[1]["rendered"]["#markup"]))
		$tab[$id]['grades']=$b->field_field_profil_membre_cgf[1]["rendered"]["#markup"];
	if(isset($tab[$id]['grades']))
	{
		switch ($tab[$id]['grades'])
		{
			case "Direction":
			$tab[$id]['g']=0;
			break;
			case "Responsables":
			$tab[$id]['g']=1;
			break;
			case "Secrétaires":
			$tab[$id]['g']=2;
			break;
			case "Agents":
			$tab[$id]['g']=3;
			break;
			default:
			$tab[$id]['g']=4;
			break;
		}
	}
	$max=0;
	foreach($tab as $t)
	{
		if(isset($t['g']))
		{
			if($max<$t['g'])
				$max=$t['g'];
		}
	}
}
//die(var_dump($tab));
?>

<style>
	.content-org *{

		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		position: relative;
	}
	<?php
	$cnt_directeur_direction = 0 ;

	foreach($tab as $t)
	{
		if($t["directeur"]=="oui")
		{
			$id_directeur=$t["id_user"];
		}
		if( isset($t["sous_la_direction_de"]) && $t["sous_la_direction_de"]!=""
			&& $t["departement"]=="Direction" && $t["grades"]=="Direction" ) {
			$cnt_directeur_direction++;
	}
	if($cnt_directeur_direction ==0)
	{
		echo '.admin:after{visibility: visible;}';
	}

}


?>
</style>
<div class="content-org">
	<figure class="org-chart cf">
		<ul class="ul-org administration bloc-person">
			<li>
				<ul class="ul-org director bloc-person">
					<li>
						<a  class="Direction-cgf"><span>
							<?php
							foreach($tab as $t)
							{
								if(isset($t["sous_la_direction_de"]) && isset($t["departement"]))
								{
									if($t["sous_la_direction_de"]=="" && $t["departement"]=="Direction")
									{
										echo $t["nom"].' '.$t["prenom"].'<div class="poste">'.$t["poste"].'</div>';
									}
								}
							}
							?></span></a>
							<ul class="ul-org subdirector bloc-person">
								<li><a  class="Secrétaires-cgf"><span><?foreach($tab as $t) if( isset($t["sous_la_direction_de"]) && $t["sous_la_direction_de"]!="" && $t["departement"]=="Direction" && $t["grades"]=="Secrétaires" )echo $t["nom"].' '.$t["prenom"].'<div class="poste">'.$t["poste"].'</div>'; ?></span></a></li>
							</ul>
							<ul class="ul-org departments cf bloc-person">



								<?php if ($cnt_directeur_direction > 0) {

									$style = "";
									$class = "" ;

								}  else {
									$style = " style='visibility:hidden' ";
									$class = " hide" ;
								} ?>


								<li class="admin" <?=$style?>>
									<a  class="Direction-cgf <?=$class?>">
										<span>

											<?php
											foreach($tab as $t) {
												if( isset($t["sous_la_direction_de"]) && $t["sous_la_direction_de"]!=""
													&& $t["departement"]=="Direction" && $t["grades"]=="Direction" ) {
													echo $t["nom"].' '.$t["prenom"].'<div class="poste">'.$t["poste"].'</div>';
											}

										}
										?>
									</span></a></li>





									<?php foreach($tab as $t)
									{
										if(isset($t["grades"]) && isset($t["sous_la_direction_de"]) && isset($t["departement"]))
										{
											if($t["grades"]=="Direction" && $t["sous_la_direction_de"]==$id_directeur && $t["departement"]!="Direction")
											{
												echo '<li class="department dep-a"><a  class="'.$t["grades"].'-cgf"><span>';
												echo $t["nom"].' '.$t["prenom"].'<div class="poste">'.$t["poste"].'</div>';
												echo'</span></a>';
												echo'<ul class=" ul-org sections bloc-person">';
												for($i=0;$i<=$max;$i++)
													foreach($tab as $u)
													{
														if(isset($t["departement"]) && isset($u["departement"]) && isset($u["id_user"]) && isset($t["id_user"]) && isset($u['g']))
														{
															if($t["departement"] == $u["departement"] && $u["id_user"]!=$t["id_user"] && $u['g']==$i)
															{
																echo '<li class="section"><a  class="'.$u["grades"].'-cgf"><span>'.$u["nom"].' '.$u["prenom"].'<div class="poste">'.$u["poste"].'</div>'.'</span></a></li>';
															}
														}
													}
													echo '</ul>
												</li>';
											}
										}
									}
									?>


								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</figure>
		</div>
