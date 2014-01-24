<?php

/**
 * Implements hook_page_alter().
 */
function paraneue_dosomething_page_alter(&$page) {
  if (!user_is_logged_in()){

    $bottom_region = 'page_bottom';

    if (!isset($page[$bottom_region])) {
      $page[$bottom_region] = array('region' => $bottom_region);
    }

    $page[$bottom_region]['authentication'] = array(
      '#prefix' => '<div style="display: none">',
      '#suffix' => '</div>',
      'login' => drupal_get_form('user_login_block'),
      'register' => drupal_get_form('user_register_form'),
    );
  }
}

/**
 * Implements theme_preprocess_page().
 */
function paraneue_preprocess_page(&$vars) {
  $vars['logo'] = $vars['base_path'] . NEUE_PATH . '/assets/images/ds-logo.png';
}
