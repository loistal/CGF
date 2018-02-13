<div class="col-sm-12"><?php  print render($content); ?></div>  
<?php
echo '<div class="row">';
echo '<div class="col-sm-12" style="margin-top : 40px;">';
$view = views_get_view('concours');
$view->set_arguments(array("Les prochains évènements du CGF"));
$view->set_display('calendrier');
$view->pre_execute();
$view->execute();
print $view->render();
echo '</div>';
echo '</div>';

