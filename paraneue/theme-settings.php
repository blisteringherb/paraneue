<?php
function paraneue_form_system_theme_settings_alter(&$form, $form_state) {
  $form['neue'] = array(
      '#type'          => 'fieldset',
      '#title'         => '&#9985; ' . t('Neue'),
      '#description'   => t('Settings for the neue library'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#weight'=> -19
  );

  $form['neue']['paraneue_neue_cdn'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use CDN') ,
    '#description'   => t('Use CDN version of neue library'),
    '#default_value' => theme_get_setting('paraneue_neue_cdn')
  );

  $form['neue']['paraneue_neue_source'] = array(
    '#type'          => 'select',
    '#title'         => t('Neue library source') ,
    '#description'   => t('Choose where to source the Neue library'),
    '#options'       => array(
      'cdn' => t('CDN'),
      'library' => t('Library API'),
      'bower' => t('Bower')
    ),
    '#default_value' => theme_get_setting('paraneue_neue_source')
  );


  $form['js'] = array(
      '#type'          => 'fieldset',
      '#title'         => '&#9985; ' . t('javascript'),
      '#description'   => t('Settings for javascript in the neue'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
      '#weight'=> -19
  );

  $form['js']['jquery'] = array(
    '#type'          => 'fieldset',
    '#title'         => '&#10006; ' .t('jQuery'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#description'   => t('')
  );

  $form['js']['jquery']['paraneue_js_jquery_cdn'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Replace Drupals local jquery width a CDN version') ,
    '#description'   => t('use ajax.googleapis.com/ajax/libs/jquery/[X.X.X]/jquery.min.js'),
    '#default_value' => theme_get_setting('paraneue_js_jquery_cdn')
  );

  $form['js']['jquery']['paraneue_js_jquerycdn_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('jQuery CDN version'),
    '#default_value' => theme_get_setting('paraneue_js_jquery_cdn_version'),
    '#description'   => t('write the version number fx 1.4.4 or 1.8.1 '),
  );

  $form['js']['unveil'] = array(
    '#type'          => 'fieldset',
    '#title'         => '&#10006; ' .t('Unveil'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    '#description'   => t('')
  );

  $form['js']['jquery']['paraneue_js_unveil_cdn'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Use the CDN version of unveil instead') ,
    '#description'   => t('CDN path'),
    '#default_value' => theme_get_setting('paraneue_js_unveil_cdn')
  );

  $form['js']['jquery']['paraneue_js_unveil_cdn_version'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Unveil CDN version'),
    '#default_value' => theme_get_setting('paraneue_js_unveil_cdn_version'),
    '#description'   => t('write the version number fx 1.4.4 or 1.8.1 '),
  );
}
