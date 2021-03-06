<?php
/*
Template personnalisé pour l'affichage des 
*/

$vars = get_defined_vars(); 

$txt_btn = $vars['variables']['view']->style_plugin->row_tokens[0]["[nothing]"]; 



$rows = $vars['variables']['view']->result; 
 // die(var_dump($rows));
foreach($rows as $row)
{
	//die(var_dump($row));
	foreach($row->field_field_fichier_telecharger as $r)
	{
		
		$id=$r["rendered"]["#file"]->fid;
		$tab[$id]['id']=$r["rendered"]["#file"]->fid;
		$tab[$id]['url']=file_create_url($r["rendered"]["#file"]->uri);
		if(isset($r["rendered"]["#file"]->description) && $r["rendered"]["#file"]->description!="")
			$tab[$id]['name']=($r["rendered"]["#file"]->description);
		else
			$tab[$id]['name']=$r["rendered"]["#file"]->origname;
		$tab[$id]['timestamp']=($r["rendered"]["#file"]->timestamp);
		$tab[$id]['content']=$row->node_title;
		
	}
}
// die(var_dump(count($tab)));
$prec ="";
echo '<div class=" panel panel-default panel-cgf">'; 

foreach ($tab as $t)
{
	if($t['content'] != $prec)
	{
		if($prec !="")
		{
			echo '</table>';
			echo '</div>';
		}
		echo '<div class="panel-cgf-header">';
		echo '<h4>'.$t['content'].'</h4>';
		echo '</div>';
		echo '<div class="panel-cgf-body">';
		echo '<table class="table table-hover table-condensed table-responsive">';
		$prec=$t['content'];
	}
	echo '<tr><td><a href="'.$t['url'].'" target="_blank">'.$t['name'].'</a></td></tr>';
	
}
echo '</table>';
echo '</div>';
?>