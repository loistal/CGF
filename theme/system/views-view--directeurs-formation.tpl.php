<?php 
/*
Template personnalisé pour l'affichage des directeurs de formations visibles sur la page "vos interlocuteurs"
*/

$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 

$directeur = $rows[0]->_field_data["profile_users_pid"]["entity"] ; 
$directeur_email = $rows[0]->users_mail; 

$adjoint = $rows[1]->_field_data["profile_users_pid"]["entity"] ; 
$adjoint_email = $rows[1]->users_mail; 

?>

<div class="row">
  <div class="col-sm-8">
    <div class="thumbnail profil text-center">
      <div class="row-fluid">
        <div class="col-sm-5">
          <?php if ( count($adjoint->field_photo) == 0) { ?>
          <img src="<?php echo file_create_url('public://avatar.jpg') ?>" class="circular-director"/>
          <?php  } else { ?>
          <img src="<?php echo file_create_url($directeur->field_photo['und'][0]['uri']) ?>" class="circular-director"/>
          <?php  } ?>
          
        </div>
        <div class="col-sm-6">
          <h3 class="nom_formation text-left"> <?php echo strtoupper($directeur->field_prenom_membre_cgf['und'][0]['safe_value']) ?> <?php echo strtoupper($directeur->field_nom_membre_cgf['und'][0]['safe_value']);  ?> </h3>
          <h4 class="poste_formation text-left"><?php echo $directeur->field_titre_qualite_poste['und'][0]['safe_value']; ?></h4>
          
          <div class="text-left">

           <h5 class="enchargede text-left">EN CHARGE DES DOMAINES</h5>
           <div class="domaines" >
             <blockquote><?php echo ($directeur->field_en_charges_des_domaines['und'][0]['safe_value']) ?></blockquote>
           </div>

           
           <div class="email text-left row"><span class="col-sm-2">Email :</span>  <?php echo $directeur_email ?></div>
           <div class=" telephone text-left row"><span class="col-sm-2">Tél. :</span>  <?php echo format_directeur_phone($directeur->field_telephone['und'][0]['safe_value']); ?></div>


         </div>

       </div>
     </div>
     <div class="clearfix"></div>

   </div>
 </div>
 <div class="col-sm-4">
  <div class="thumbnail profil text-center">
    <?php if ( count($adjoint->field_photo) == 0) { ?>
    <img src="<?php echo file_create_url('public://avatar.jpg') ?>" class="circular"/>
    <?php  } else { ?>
    <img src="<?php echo file_create_url($adjoint->field_photo['und'][0]['uri']) ?>" class="circular"/>
    <?php  } ?>

    <h3 class="nom_formation"><?php echo strtoupper($adjoint->field_prenom_membre_cgf['und'][0]['safe_value']) ?> <?php echo strtoupper($adjoint->field_nom_membre_cgf['und'][0]['safe_value']);  ?>
    </h3>
    <h4 class="poste_formation "><?php echo $adjoint->field_titre_qualite_poste['und'][0]['safe_value']; ?></h4>
    
    <h5 class="enchargede">EN CHARGE DES DOMAINES</h5>
    <p class="domaines adjoint"><?php echo ($adjoint->field_en_charges_des_domaines['und'][0]['safe_value']) ?></p>
    <div class="row-fluid">
      <div class="col-sm-6 email adjoint text-left"><?php echo $adjoint_email ?></div>
      <div class="col-sm-4 telephone pull-right"><?php echo format_directeur_phone($adjoint->field_telephone['und'][0]['safe_value']); ?></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>




</div>
<?php
function format_directeur_phone($phone)
{
	$phone = preg_replace("/[^0-9]/", "", $phone);
  if(strlen($phone) == 8) { 
    return preg_replace("/([0-9]{2})/", "$1 $2 $3 $4", $phone);
  } else return $phone; 

}




