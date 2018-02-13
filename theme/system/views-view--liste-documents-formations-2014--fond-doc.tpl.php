<?php
/*
Template personnalisé pour l'affichage des 5 derniers documents de la formation (fond documentaire)
*/


function recherche_simple($t,$id)
{
	$res=false;
	if(isset($t))
	{
		foreach ($t as $s)
		{
			if(isset($s['id']) && (count($s['id'])>0))
			{
				if($s['id']==$id)
				{
					$res=true;
				}
			}
		}
	}
	return $res;
}
$vars = get_defined_vars(); 

$txt_btn = $vars['variables']['view']->style_plugin->row_tokens[0]["[nothing]"]; 

//die($rows);

$rows = $vars['variables']['view']->result; 
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
//die(var_dump($tab));
for($i=0;$i<5;$i++)
{
	$tab_max[$i]['timestamp']=0;
}
for($i=0;$i<5;$i++)
{
	foreach ($tab as $t)
	{
		if($i>0)
		{
			if($tab_max[$i]['timestamp']<=$t["timestamp"] && recherche_simple($tab_max,$t['id'])==false)
			{
				$tab_max[$i]=$t;	
			}
			
		}
		else
		{
			if($tab_max[$i]['timestamp']<=$t["timestamp"])
			{
				$tab_max[$i]=$t;

			}
		}
		
	}
	
}

echo '<div class="panel panel-default panel-cgf panel-cgf-important">';
echo '<div class="panel-cgf-header">';
echo '<h3>La liste des derniers documents de la formation</h3>';
echo '</div>';
echo '<div class="panel-cgf-body">';
echo '<div class="panel-cgf-body-content">';
echo '<table class="table table-striped table-hover table-condensed table-responsive">';
foreach($tab_max as $r)
{
	if(isset($r['url']) && isset($r['name']) && isset($r['content']))
	{
		echo '<tr><td><a href="'.$r['url'].'" target="_blank">'.$r['name'].'</a></td></tr>';
	}
}
echo '</table><a href="ressources/formation"  class="btn btn-primary btn-block" style="margin-top : 10px;">'.$txt_btn.'</a>';
echo '</div></div>';
echo '</div>';
?>
