<?php 
/*
Template personnalisé pour l'affichage des personnes avec le grade de "responsables" dans le départment de la formation 
*/


$vars = get_defined_vars(); 

$rows = $vars['variables']['view']->result; 

?>

<div class="row">
  <?php 

  foreach($rows as $row) {

    $profile = $row->_field_data["profile_users_pid"]["entity"] ; 
    $email = $row->users_mail; 


    ?>
    <div class="col-sm-4">
      <div class="thumbnail profil text-center ">
        <?php if (count($profile->field_photo) == 0) { ?>
        <img src="<?php echo file_create_url('public://avatar.jpg') ?>" class="circular"/>
        <?php  } else { ?>
        <img src="<?php echo file_create_url($profile->field_photo['und'][0]['uri']) ?>" class="circular"/>
        <?php  } ?>
        <h3 class="nom_formation"> <?php echo strtoupper($profile->field_prenom_membre_cgf['und'][0]['safe_value']) ?> <?php echo strtoupper($profile->field_nom_membre_cgf['und'][0]['safe_value']);  ?> </h3>
        <h4 class="poste_formation"><?php echo $profile->field_titre_qualite_poste['und'][0]['safe_value']; ?></h4>
        <div class="caption">
          <p class="domaines "><?php  if(count($profile->field_en_charges_des_domaines) != 0) echo ($profile->field_en_charges_des_domaines['und'][0]['safe_value']);?></p>
          <div class="row-fluid">
            <div class="col-sm-6 email text-left" <?php if(strlen($email) > 30 ) { ?> style="font-size:90%" <?php } ?> > <?php echo $email; ?> </div>
            <div class="col-sm-6 telephone text-right"><?php  if(count($profile->field_telephone) != 0) echo format_responsable_phone($profile->field_telephone['und'][0]['safe_value']); ?></div>
          </div>
        </div>
      </div>
    </div>
    <?php } 


    function format_responsable_phone($phone)
    {
     $phone = preg_replace("/[^0-9]/", "", $phone);
     if(strlen($phone) == 8) { 
      return preg_replace("/([0-9]{2})/", "$1 $2 $3 $4", $phone);
    } else return $phone; 

  }
  ?>
</div>
