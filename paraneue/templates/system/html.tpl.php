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
  
  <?php $ga_account = variable_get('googleanalytics_account'); if (!empty($ga_account)): ?>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php print $ga_account; ?>']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  <?php endif; ?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $scripts; ?>
  <?php print $page_bottom; ?>
</body>
</html>
