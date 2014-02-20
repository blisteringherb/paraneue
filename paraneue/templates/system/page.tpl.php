<div class="nav--wrapper">
  <nav class="main">
    <a class="logo" href="<?php print $base_path; ?>"><img src="/<?php print NEUE_PATH; ?>/assets/images/ds-logo.png" alt="DoSomething.org"></a>
    <a class="hamburger js-toggle-mobile-menu" href="#">&#xe606;</a>
    <div class="menu">
      <ul class="primary-nav">
        <li>
          <a href="#">
            <strong>Explore Campaigns</strong>
            <span>Lorem ipsum dolor.</span>
          </a>
        </li>

        <li>
          <a href="#">
            <strong>What is Do Something?</strong>
            <span>Sit amet consequeter.</span>
          </a>
        </li>
      </ul>

      <div class="secondary-nav">
        <ul>
          <li class="searchfield">
            <form action="/search/" method="get" accept-charset="utf-8">
              <input type="search" name="s" id="search" value="" />
            </form>
          </li>
          <?php if(!$logged_in): ?>
          <li><a href="<?php print $front_page; ?>user/login" class="js-modal-link" data-cached-modal="#modal-login">Sign In</a></li>
          <?php else: ?>
          <li><a href="<?php print $front_page; ?>user/logout">Log out</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <?php print $messages; ?>
</div>

<div role="main" class="wrapper">
  <?php if ($tabs): ?><nav class="tabs"><?php print render($tabs); ?></nav><?php endif; ?>
  <?php print render($page['content']); ?> 
</div>

<div class="footer--wrapper">
  <form class="searchfield" action="/search/" method="get" accept-charset="utf-8">
    <input type="search" name="s" id="search" value="" placeholder="Search" />
  </form>
  <footer class="main">
    <div class="logo">
      <a href="<?php print $base_path; ?>"><img src="/<?php print NEUE_PATH; ?>/assets/images/ds-logo.png" alt="DoSomething.org"></a>      
    </div>
    <div class="social tablet">
      <ul>
        <li><a class="social-link" title="dosomething on Facebook" href="https://www.facebook.com/dosomething">&#xe600;</a></li>
        <li><a class="social-link" title="@dosomething on Twitter" href="https://twitter.com/dosomething">&#xe603;</a></li>
        <li><a class="social-link" title="@dosomething on Tumblr" href="http://dosomething.tumblr.com">&#xe602;</a></li>
        <li><a class="social-link" title="@dosomething on Instagram" href="http://instagram.com/dosomething">&#xe604;</a></li>
        <li><a class="social-link" title="dosomething1 on YouTube" href="http://www.youtube.com/dosomething1">&#xe601;</a></li>
      </ul>
    </div>
    <div class="col help js-footer-col">
      <h4>Help</h4>
      <ul>
         <li><a href="#">Contact Us</a></li>
         <li><a href="#">Hotlines</a></li>
         <li><a href="#">FAQ</a></li>
      </ul>
    </div>
    <div class="col knowus js-footer-col">
      <h4>Get to Know Us</h4>
      <ul>
        <li><a href="#">Partners</a></li>
        <li><a href="#">Donate</a></li>
        <li><a href="#">TMI Agency</a></li>
      </ul>
    </div>
    <div class="col about js-footer-col">
      <h4>About</h4>
      <ul>
        <li><a href="#">What is Do Something?</a></li>
        <li><a href="#">Our Team</a></li>
        <li><a href="#">Scholarships</a></li>
        <li><a href="#">Jobs &amp; Internships</a></li>
        <li><a href="#">Old People</a></li>
        <li><a href="#">Sexy Financials</a></li>
        <li><a href="#">International</a></li>
      </ul>
    </div>

    <div class="social mobile">
      <ul>
        <li><a class="social-link" title="dosomething on Facebook" href="#">&#xe600;</a></li>
        <li><a class="social-link" title="@dosomething on Twitter" href="#">&#xe603;</a></li>
        <li><a class="social-link" title="@dosomething on Tumblr" href="#">&#xe602;</a></li>
        <li><a class="social-link" title="@dosomething on Instagram" href="#">&#xe604;</a></li>
        <li><a class="social-link" title="dosomething1 on YouTube" href="#">&#xe601;</a></li>
      </ul>
    </div>

    <div class="subfooter">
      <div class="tagline">Any cause, anytime, anywhere. *mic drop*</div>
      <ul class="utility">
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
      </ul>
    </div>
  </footer>
</div>
