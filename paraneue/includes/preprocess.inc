<?php

/**
 * Implements theme_preprocess_page().
 */
function paraneue_preprocess_page(&$vars) {
  //krumo(NEUE_PATH);
  $vars['logo'] = NEUE_PATH . '/assets/images/ds-logo.png';
  $vars['favicon'] = NEUE_PATH . '/assets/favicon.ico';

}
