<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <link rel="shortcut icon" href="/<?php print NEUE_PATH; ?>/assets/images/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="/<?php print NEUE_PATH; ?>/assets/images/apple-touch-icon-precomposed.png">

  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $scripts; ?>
  <?php print $page_bottom; ?>
</body>
</html>
