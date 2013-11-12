<?php

/**
 * Implements theme_preprocess_page().
 */
function paraneue_preprocess_page(&$vars) {
  $vars['logo'] = $vars['base_path'] . NEUE_PATH . '/assets/images/ds-logo.png';

}
