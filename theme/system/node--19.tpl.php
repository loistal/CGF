<?php
/**
 * @file
 * Bootstrap 8-4 template for Display Suite.
 */
/*
Template personnalisé pour l'affichage des 
*/
?>


<div <?php if(isset($layout_attributes) && $layout_attributes!=""){print $layout_attributes; }?> class="<?php print $classes; ?>">
  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
  <div class="row">
    <div class="col-sm-8 <?php if(isset($left_classes) &&  $left_classes!=""){print $left_classes;} ?>">
      <?php print render($content);  ?>
    </div>
    <div class="col-sm-4 <?php if(isset($right_classes) && $right_classes!=""){print $right_classes;} ?>">
     
     
      <?php
      
      $view = views_get_view('commissions_statutaires');
      $view->set_display('menu_rapide');
			//$view->set_arguments(array($content->vid));
      $view->pre_execute();
      $view->execute();
      print $view->render(); 
      ?>
      

      
      
      
      
    </div>
  </div>
</div>


<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
