<?php
/*
Nukes the js
*/
function paraneue_js_alter(&$js) {
  //js from core modules
  foreach ($js as $file => $value) {
    if (strpos($file, 'modules/') !== FALSE) {
      unset($js[$file]);
    }
  }
  //js from contrib modules
  foreach ($js as $file => $value) {
    if (strpos($file, '/modules/') !== FALSE) {
      unset($js[$file]);
    }
  }

  foreach ($js as $file => $value) {
    if (strpos($file, 'misc/') !== FALSE) {
      unset($js[$file]);
    }
  }

  if(theme_get_setting('paraneue_js_jquery_latest')){
    if (isset($js['misc/jquery.js'])) {
      $js['misc/jquery.js']['data'] = drupal_get_path('theme', 'paraneue') . '/js/jquery-1.8.2.min.js';
      $js['misc/jquery.js']['weight'] = -100;
    }
  }

  //http://www.metaltoad.com/blog/mobile-drupal-optimization-results
  if(theme_get_setting('paraneue_js_jquerycdn')){
    $version = theme_get_setting('paraneue_js_jquerycdn_version');
    if (isset($js['misc/jquery.js'])) {
      $js['misc/jquery.js']['data'] ='http://ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js';
      $js['misc/jquery.js']['type'] = 'external';
      $js['misc/jquery.js']['weight'] = -100;
    }
  }

  uasort($js, 'drupal_sort_css_js');
  $i = 0;
  foreach ($js as $name => $script) {
    $js[$name]['weight'] = $i++;
    $js[$name]['group'] = JS_DEFAULT;
    $js[$name]['every_page'] = FALSE;
  }

}

