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

    $page[$bottom_region]['login'] = array(
      '#prefix' => '<script type="text/cached-modal" id="modal--login">',
      '#suffix' => '</script>',
      'modal_close' => array(
        '#markup' => '<a href="#" class="js-close-modal modal-close-button">×</a>'
      ),
      'login' => drupal_get_form('user_login_block')
    );

    $page[$bottom_region]['register'] = array(
      '#prefix' => '<script type="text/cached-modal" id="modal--register">',
      '#suffix' => '</script>',
      'modal_close' => array(
        '#markup' => '<a href="#" class="js-close-modal modal-close-button">×</a>'
      ),
      'register' => drupal_get_form('user_register_form')
    );
  }
}

/**
 * Implements theme_preprocess_page().
 */
function paraneue_preprocess_page(&$vars) {
  $vars['logo'] = $vars['base_path'] . NEUE_PATH . '/assets/images/ds-logo.png';
}
