<?php

/**
 * Implements theme_preprocess_html().
 */
function paraneue_preprocess_html($vars) {
  if (module_exists('neue')) {
    drupal_add_library('neue', 'neue');
  }
}

/**
 * Implements theme_preprocess_page().
 */
function paraneue_preprocess_page($vars) {

}
