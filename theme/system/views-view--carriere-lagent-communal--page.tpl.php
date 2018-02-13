<?php 
$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 

$tab = array(); 

//var_dump(user_role_permissions($user->roles)); 


foreach($rows as $row) { 
//dpm($row); 

// id de la catégorie
$tab[$row->field_field_categorie_carriere_agent[0]['raw']['tid']]['tid'] =  $row->field_field_categorie_carriere_agent[0]['raw']['tid'] ; 
// nom de la catégorie
$tab[$row->field_field_categorie_carriere_agent[0]['raw']['tid']]['name'] =  $row->field_field_categorie_carriere_agent[0]['raw']['taxonomy_term']->name;

// fichiers 
$tab[$row->field_field_categorie_carriere_agent[0]['raw']['tid']]['files'][$row->nid]['nid'] =  $row->nid; 
$tab[$row->field_field_categorie_carriere_agent[0]['raw']['tid']]['files'][$row->nid]['title'] =  $row->node_title; 
$tab[$row->field_field_categorie_carriere_agent[0]['raw']['tid']]['files'][$row->nid]['acces'] =  $row->field_field_fichier[0]['rendered']['#access'];
$tab[$row->field_field_categorie_carriere_agent[0]['raw']['tid']]['files'][$row->nid]['fichier'] =  $row->field_field_fichier[0]['rendered']['#markup'];   
// #access - #markup

}



//echo '<pre>'.print_r($tab, 1).'</pre>'; 
?>


<?php foreach($tab as $cat) { ?>
<table class="table table-hover table-condensed table-striped">
<caption><h3 class="statut text-left"><?php print $cat['name']; ?></h3></caption>
<tbody>
<?php if(is_array($cat['files']) && count($cat['files'] > 0)) { 

?>

<?php 
	foreach($cat['files'] as $file => $f) : 
?>
<tr>
	<td class="col-md-8 text-left"><?php print $f['title'];  ?></td>
    <td class="col-md-2 text-right"><a href="<?php print $f['fichier']; ?>">Lire</a></td>
    <td class="col-md-2 text-center"><?php 
	if(user_access('edit any documents_carriere_de_l_agent content')) { ?> 
    <a class="btn btn-xs btn-primary"  href="<?php print 'node/'.$f['nid'].'/edit' ; ?>"><?php print t('Edit'); ?></a>
	<?php } ?></td>
</tr>

<?php endforeach; ?>

<?php }  ?>

</tbody>
</table>
<?php } ?>




