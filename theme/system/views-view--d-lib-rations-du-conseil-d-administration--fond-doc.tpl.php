<?php

/*
Template personnalisé pour l'affichage des 3 dernières délibérations du CA. 
Cette vue est visible sur la page du fond documentaire
*/


function recherche_simple_a($t,$id)
{
	$res=false;
	foreach ($t as $s)
	{
		
		if(isset($s['id']) && $s['id']==$id)
			$res=true;
	}
	return $res;
}
$vars = get_defined_vars(); 
/*******************************TEXTE DU BOUTON ***************************/
$txt_btn = "Accéder à toutes les délibérations du conseil d'administration";
/**************************************************************************/
$rows = $vars['variables']['view']->result; 

foreach($rows as $row)
{
	//die(var_dump($row));
	foreach($row->field_field_documents_d_lib_rations as $r)
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
//die(var_dump($tab));

/**

**/

$t_max[0]['timestamp']=0;
$t_max[1]['timestamp']=0;
$t_max[2]['timestamp']=0;

if($tab) { 
	for($i=0;$i<3;$i++)
	{
		foreach ($tab as $t)
		{
			if($i>0)
			{
				if($t_max[$i]['timestamp']<=$t["timestamp"] && recherche_simple_a($t_max,$t['id'])==false)
				{
					$t_max[$i]=$t;	
				}
				
			}
			else
			{
				if($t_max[$i]['timestamp']<=$t["timestamp"])
				{
					$t_max[$i]=$t;
					
				}
			}
			
		}
		
	}
}



echo '<div class="panel panel-default panel-cgf panel-cgf-important">';
echo '<div class="panel-cgf-header">';
echo '<h3>La liste des derni&egrave;res d&eacute;lib&eacute;rations du conseil d\'administration</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
echo '<div class="panel-cgf-body-content">';
echo '<table class="table table-striped table-hover table-condensed table-responsive">';
foreach($t_max as $r)
{
	echo '<tr><td><a href="'.$r['url'].'" target="_blank">'.$r['name'].' - ( '.$r["content"].' )</a></td></tr>';
}
echo '</table><a href="ressources/deliberations-ca"  class="btn btn-primary btn-block" style="margin-top : 10px;">'.$txt_btn.'</a>';
echo '</div></div>';
echo '</div>';



?>
