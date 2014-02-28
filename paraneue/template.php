<?php
/**
 * include template overwrites
 */


define('PARANEUE_PATH', drupal_get_path('theme', 'paraneue'));
define('NEUE_PATH', PARANEUE_PATH . '/bower_components/pattern-library');

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
    unset($head_elements[$shortcut_key]);
  }
}

/**
 * Implements hook_css_alter().
 */
function paraneue_css_alter(&$css) {
  // Load excluded CSS files from theme.
  $excludes = _paraneue_alter(paraneue_theme_get_info('exclude'), 'css');

  // Core
  $neue_css = NEUE_PATH . '/neue.css';
  $css['neue']['data'] = $neue_css;
  $css['neue']['media'] = 'all';
  $css['neue']['browsers'] = array('IE' => TRUE, '!IE' => TRUE);
  $css['neue']['preprocess'] = TRUE;
  $css['neue']['group'] = CSS_THEME;
  $css['neue']['type'] = 'file';
  $css['neue']['every_page'] = TRUE;
  $css['neue']['weight'] = 1;

  $neue_css_ie = NEUE_PATH . '/ie.css';
  $css['neue-ie']['data'] = $neue_css_ie;
  $css['neue-ie']['media'] = 'all';
  $css['neue-ie']['browsers'] = array('IE' => 'lte IE 8');
  $css['neue-ie']['preprocess'] = TRUE;
  $css['neue-ie']['group'] = CSS_THEME;
  $css['neue-ie']['type'] = 'file';
  $css['neue-ie']['every_page'] = TRUE;
  $css['neue-ie']['weight'] = 1;

  $css = array_diff_key($css, $excludes);
}

/**
 * Implements hook_js_alter().
 */
function paraneue_js_alter(&$js) {
  // Load excluded JS files from theme.
  $excludes = _paraneue_alter(paraneue_theme_get_info('exclude'), 'js');

  $jquery = PARANEUE_PATH . '/bower_components/jquery/dist/jquery.js';
  $js['jquery'] = drupal_js_defaults();
  $js['jquery']['data'] = $jquery;
  $js['jquery']['group'] = -100;
  $js['jquery']['type'] = 'file';
  $js['jquery']['every_page'] = TRUE;
  $js['jquery']['weight'] = -30;


  $neue_js = NEUE_PATH . '/neue.js';
  $js['neue'] = drupal_js_defaults();
  $js['neue']['data'] = $neue_js;
  $js['neue']['group'] = -100;
  $js['neue']['type'] = 'file';
  $js['neue']['every_page'] = TRUE;
  $js['neue']['weight'] = -20;

  $js = array_diff_key($js, $excludes);
}

function paraneue_form_alter(&$form, &$form_state, $form_id) {
  // Add `.btn` to all form submit buttons.
  $form['actions']['submit']['#attributes']['class'][] = 'btn';
}
