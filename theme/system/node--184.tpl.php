<?php 
/*
Template personnalisé pour l'affichage des 
*/
?>


<div class="col-sm-12"><?php  print render($content); ?></div>    
<?php

echo '<div class="col-sm-12" style="padding : 5px">';
$view = views_get_view('d_lib_rations_du_conseil_d_administration');
$view->set_display('page_1');
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';


?>

