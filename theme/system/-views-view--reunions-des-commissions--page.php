<?php 
$vars = get_defined_vars(); 
$rows = $vars['variables']['view']->result; 
die(var_dump($rows));
$date=0;
foreach ($rows as $row)
{
	var_dump($row);
	echo '<hr>';
	$id=$row->nid;
	//$tab[$date][$id]['id']=$id;
	$tab[$id]["id"]=$id;
	$tab[$id]["titre"]=$row->_field_data["nid"]["entity"]->title;
	$tab[$id]["id_commission"]=$row->field_field_commission_statutaire[0]["rendered"]["#markup"];
	
}
var_dump($tab);

?>