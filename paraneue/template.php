<?php
/**
 * include template overwrites
 */

define('PARANEUE_PATH', drupal_get_path('theme', 'paraneue'));
define('PARANEUE_VENDOR_PATH', dirname(PARANEUE_PATH) . '/vendor');
define('NEUE_PATH', PARANEUE_VENDOR_PATH . '/neue');
define('JQUERY_PATH', PARANEUE_VENDOR_PATH . '/jquery');

require_once PARANEUE_PATH . '/includes/bootstrap.inc';

/**
 * Implements hook_css_alter().
 */
function paraneue_css_alter(&$css) {

  // Load excluded CSS files from theme.
  $excludes = _paraneue_alter(paraneue_theme_get_info('exclude'), 'css');

  // Load from CDN
  if (theme_get_setting('paraneue_neue_cdn')) {
    
  }
  else {

    // Core
    $css['neue'] = array(
      'data' => NEUE_PATH . '/assets/application.css',
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
      'data' => NEUE_PATH . '/assets/ie.css',
      'type' => 'file',
      'every_page' => TRUE,
      'media' => 'all',
      'preprocess' => TRUE,
      'group' => CSS_THEME,
      'browsers' => array('IE' => 'lt IE 9'),
      'weight' => 1,
    );
  }

  $css = array_diff_key($css, $excludes);
}

/**
 * Implements hook_js_alter().
 */
function paraneue_js_alter(&$js) {
  // Load excluded JS files from theme.
  $excludes = _paraneue_alter(paraneue_theme_get_info('exclude'), 'js');

  $theme_path = drupal_get_path('theme', 'bootstrap');

  // Load from CDN
  if (theme_get_setting('paraneue_neue_cdn')) {
    
  }
  else {

    $jquery = JQUERY_PATH . '/jquery.js';
    $js[$jquery] = drupal_js_defaults();
    $js[$jquery]['data'] = $jquery;
    $js[$jquery]['group'] = -100;
    $js[$jquery]['type'] = 'file';
    $js[$jquery]['every_page'] = TRUE;
    $js[$jquery]['weight'] = -20;

    $js['misc/drupal.js']['weight'] = -19;

    $neue_core = NEUE_PATH . '/assets/application.js';
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

  }

  $js = array_diff_key($js, $excludes);

}
