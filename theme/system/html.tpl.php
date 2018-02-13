<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
"http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php global $base_url; ?>
  <base href="<?php  print $base_url ?>/"  lang="fr" />

  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  

  
  <?php print $styles; ?>
  <!-- HTML5 element support for IE6-8 -->

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
    
    <?php print $scripts; ?>
  </head>
  <body class="<?php print $classes; ?>" <?php print $attributes;?>>
    <div id="skip-link">
      <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
<script>
	jQuery(".item > .carousel-caption > h4").remove();
	jQuery(".pane-content > p").remove();
        console.log(jQuery("#mini-panel-sous_menu_les_examens_panel > .panel-panel.panel-col-first"));
        jQuery("#mini-panel-sous_menu_les_examens_panel > .panel-panel.panel-col-first").append("<ul style='list-style:none;'><li style='color: #959595; margin: 10px 15px; margin-top: 20px;'><a style='color: #959595' href='http://ohipa.cgf.pf:8080/node/408#overlay-context=statut/soutien-juridique'>Le calendrier des examens</a></li><li style='color: #959595; margin: 10px 15px;'><a style='color: #959595' href='http://ohipa.cgf.pf:8080/#overlay-context=statut/soutien-juridique'>Le calendrier provisionnel</a></li><li style='color: #959595; margin: 10px 15px;'><a style='color: #959595' href='http://ohipa.cgf.pf:8080/#overlay-context=statut/soutien-juridique'>Les conditions d'accès</a></li><li style='color: #959595; margin: 10px 15px;'><a style='color: #959595' href='http://ohipa.cgf.pf:8080/#overlay-context=statut/soutien-juridique'>Les résultats des examens</a></li><li style='color: #959595; margin: 10px 15px;'><a style='color: #959595' href='http://ohipa.cgf.pf:8080/#overlay-context=statut/soutien-juridique'>Notions essentielles</a></li></ul>");
    </script>

  </body>
  </html>
