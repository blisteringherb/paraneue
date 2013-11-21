<?php
/**
 * include template overwrites
 */


define('PARANEUE_PATH', drupal_get_path('theme', 'paraneue'));

switch(theme_get_setting('paraneue_neue_source')) {
  case 'library':
    define('NEUE_PATH', 'profiles/dosomething/libraries/neue');
    break;
  case 'bower':
    define('NEUE_PATH', PARANEUE_PATH . '/vendor/neue');
    break;
}

require_once PARANEUE_PATH . '/includes/bootstrap.inc';
require_once PARANEUE_PATH . '/includes/theme.inc';
require_once PARANEUE_PATH . '/includes/preprocess.inc';

function paraneue_html_head_alter(&$head_elements) {
  foreach($head_elements as $key => $element) {
    switch($key) {
      case (preg_match('/^drupal_add_html_head_link*/', $key)) ? TRUE : FALSE:
        $shortcut_key = $key;
        break;
    }
  }

  if ($shortcut_key) {
    $shortcut = $head_elements[$shortcut_key];
    unset($head_elements[$shortcut_key]);
    $shortcut_url = url(NEUE_PATH . '/assets/favicon.ico', array('absolute' => TRUE));
    $shortcut['#attributes']['href'] = $shortcut_url;
    $head_elements['drupal_add_html_head_link:' . $shortcut_url] = $shortcut;
  }
}

/**
 * Implements hook_css_alter().
 */
function paraneue_css_alter(&$css) {
  // Load excluded CSS files from theme.
  $excludes = _paraneue_alter(paraneue_theme_get_info('exclude'), 'css');
    
  // Core
  $css['neue'] = array(
    'data' => NEUE_PATH . '/assets/neue.css',
    'type' => 'file',
    'every_page' => TRUE,
    'media' => 'all',
    'preprocess' => TRUE,
    'group' => CSS_THEME,
    'browsers' => array('IE' => TRUE, '!IE' => TRUE),
    'weight' => -1,
  );

  // IE
  $css['neue-ie'] = array(
    'data' => NEUE_PATH . '/assets/neue.css',
    'type' => 'file',
    'every_page' => TRUE,
    'media' => 'all',
    'preprocess' => TRUE,
    'group' => CSS_THEME,
    'browsers' => array('IE' => 'lt IE 9'),
    'weight' => 1,
  );

  $css = array_diff_key($css, $excludes);
}

/**
 * Implements hook_js_alter().
 */
function paraneue_js_alter(&$js) {
  // Load excluded JS files from theme.
  $excludes = _paraneue_alter(paraneue_theme_get_info('exclude'), 'js');

  $theme_path = drupal_get_path('theme', 'bootstrap');

  // $jquery = JQUERY_PATH . '/jquery.js';
  // $js[$jquery] = drupal_js_defaults();
  // $js[$jquery]['data'] = $jquery;
  // $js[$jquery]['group'] = -100;
  // $js[$jquery]['type'] = 'file';
  // $js[$jquery]['every_page'] = TRUE;
  // $js[$jquery]['weight'] = -20;

  $js['misc/drupal.js']['weight'] = -19;

  $neue_core = NEUE_PATH . '/assets/neue.js';
  $js[$neue_core] = drupal_js_defaults();
  $js[$neue_core]['data'] = $neue_core;
  $js[$neue_core]['type'] = 'file';
  $js[$neue_core]['every_page'] = TRUE;
  $js[$neue_core]['weight'] = -20;

  $neue_html5 = NEUE_PATH . '/assets/ie/html5.min.js';
  $js[$neue_html5] = drupal_js_defaults();
  $js[$neue_html5]['data'] = $neue_html5;
  $js[$neue_html5]['type'] = 'file';
  $js[$neue_html5]['every_page'] = TRUE;
  $js[$neue_html5]['weight'] = 1;
  $js[$neue_html5]['browsers'] = array('IE' => 'lt IE 9');

  $neue_rem = NEUE_PATH . '/assets/ie/rem.min.js';
  $js[$neue_rem] = drupal_js_defaults();
  $js[$neue_rem]['data'] = $neue_rem;
  $js[$neue_rem]['type'] = 'file';
  $js[$neue_rem]['every_page'] = TRUE;
  $js[$neue_rem]['weight'] = 2;
  $js[$neue_rem]['browsers'] = array('IE' => 'lt IE 9');

  $js = array_diff_key($js, $excludes);

}
