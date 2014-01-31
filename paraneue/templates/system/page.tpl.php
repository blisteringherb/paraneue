<nav id="top" class="utility">
  <div class="flexwidth-wrapper">
    <a href="#" class="utility-link js-menu-toggle">Menu</a>
    <ul class="utility-links">
      <li class="search">
        <?php //print render($page['utility']['dosomething_blocks_dosomething_utility_bar']['search']); ?>
      </li>
      <li><a class="utility-link" href="<?php print $front_page; ?>help">Help</a></li>
      <?php if(!$logged_in): ?>
      <li><a class="utility-link" href="<?php print $front_page; ?>user/login">Sign In</a></li>
      <?php else: ?>
      <li><a class="utility-link" href="<?php print $front_page; ?>user/logout">Log out</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

<div class="masthead-wrapper">
    <nav class="masthead">
        <a class="logo" href="<?php print $base_path; ?>"><img src="<?php print $logo; ?>" alt="DoSomething.org"></a>
        <?php print render($page['navigation']); ?>
    </nav>
</div>

<div role="main" class="wrapper">
  <div class="content-center">
    <?php print $messages; ?>
    <?php if ($tabs): ?><nav class="tabs"><?php print render($tabs); ?></nav><?php endif; ?>
    <?php print render($page['content']); ?>
  </div>
</div>

<div class="footer-wrapper">
    <?php //print render($page['footer']); ?>
</div>
