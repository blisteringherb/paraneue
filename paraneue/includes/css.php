<?php

/* Nukes the css from drupal core */
/* Blatently stolen from mothership - swag */

function paraneue_css_alter(&$css) {

  //book
  foreach ($css as $file => $value) {
    if (strpos($file, 'book.css') !== FALSE) {
      unset($css[$file]);
    }
  }

  //theme.css
  foreach ($css as $file => $value) {
    //first check those css files we DONT wanna remove
    if (
      //these exits in the css-core shift em to the themes version
      strpos($file, 'toolbar.theme.css') == FALSE AND
      strpos($file, 'shortcut.theme.css') == FALSE
    ) {
      if (strpos($file, '.theme.css') !== FALSE) {
        unset($css[$file]);
      }
    }
  }

  //admin.css
  foreach ($css as $file => $value) {
    if (strpos($file, '.admin.css') !== FALSE) {
      unset($css[$file]);
    }
  }

  // //modules: contrib module
  // foreach ($css as $file => $value) {
  //   //first check those css files we DONT wanna remove
  //   if (
  //     strpos($file, '.base.css') == FALSE
  //   ){
  //     if (strpos($file, '/modules/') !== FALSE) {
  //       unset($css[$file]);
  //     }
  //   }
  // }

  //modules: all modules
  foreach ($css as $file => $value) {
    //first check those css files we DONT wanna remove
    if (
      strpos($file, 'admin.') == FALSE AND
      strpos($file, 'admin.menu') == FALSE AND
      strpos($file, '.base.css') == FALSE AND
      strpos($file, 'contextual.css') == FALSE AND
      strpos($file, 'system.base.css') == FALSE AND
      strpos($file, 'system.messages.css') == FALSE AND
      strpos($file, 'system.menus.css') == FALSE AND
      strpos($file, 'system.theme.css') == FALSE AND
      strpos($file, 'shortcut.css') == FALSE AND
      strpos($file, 'toolbar.css') == FALSE

    ) {
      if (strpos($file, 'modules/') !== FALSE) {
        unset($css[$file]);
      }
    }
  }

  //system message folder
  foreach ($css as $file => $value) {
    if (
      strpos($file, 'shortcut.css') !== FALSE
    ) {
      unset($css[$file]);
    }
  }

  //system message folder
  foreach ($css as $file => $value) {
    if (strpos($file, 'system.messages.css') !== FALSE) {
      unset($css[$file]);
    }
  }

  //system menu
  foreach ($css as $file => $value) {
    if (strpos($file, 'system.menus.css') !== FALSE) {
      unset($css[$file]);
    }
  }

  //system theme
  foreach ($css as $file => $value) {
    if (strpos($file, 'system.theme.css') !== FALSE) {
      unset($css[$file]);
    }
  }

  //vertical tabs
  foreach ($css as $file => $value) {
    if (strpos($file, 'vertical-tabs.css') !== FALSE) {
      unset($css[$file]);
    }
  }


  //Here we go smack all css files into 1 (one) - we like less http request

  $theme = drupal_get_path('theme', 'mothership');
  //its all screen honey all screen
  foreach ($css as $path => $value) {
    if ($css[$path]['media'] == 'all') {
      $css[$path]['media'] = 'screen';
    }
  }

  //grap the css and punch it into one file
  //credits to metaltoad http://www.metaltoad.com/blog/drupal-7-taking-control-css-and-js-aggregation
  uasort($css, 'drupal_sort_css_js');
  $i = 0;
  foreach ($css as $name => $style) {
    $css[$name]['weight'] = $i++;
    $css[$name]['group'] = CSS_DEFAULT;
    $css[$name]['every_page'] = FALSE;
  }

}
