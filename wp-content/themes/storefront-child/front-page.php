<?php

/**
 * The template for displaying the front page
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="front-page-landing-area">
  <main id="main" class="site-main" role="main">
    <div id="landing">
      <div id="landing-image-container">
        <div id="landing-image-overlay"></div>
        <h1 id="landing-header"><?php the_title() ?></h1>
        <div id="landing-image" style="background: url( <?php echo the_post_thumbnail_url('full') ?>)"></div>
      </div>
    </div>

  </main><!-- #main -->
</div><!-- #primary -->
<div class="front-page-content-area">
  <?php
  while (have_posts()) :
    the_post();
    the_content();
  endwhile;
  ?>
  <div class="col-full">
    <!-- Begin Mailchimp Signup Form -->
    <div id="mc_embed_signup">
      <form action="https://tessieandbelle.us18.list-manage.com/subscribe/post?u=efa1a7f4246c83fbdc0bf8b59&amp;id=7eef1ea64e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
          <h2>Subscribe to our mailing list! </h2>
          <div id="mc_flex_container">
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group">
              <label id="mce-EMAIL-label" for="mce-EMAIL">Email Address <span class="asterisk">*</span>
              </label>
              <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
          </div>
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_efa1a7f4246c83fbdc0bf8b59_7eef1ea64e" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script type="text/javascript">
  window.dojoRequire(["mojo/signup-forms/Loader"], function(L) {
    L.start({
      "baseUrl": "mc.us18.list-manage.com",
      "uuid": "efa1a7f4246c83fbdc0bf8b59",
      "lid": "7eef1ea64e",
      "uniqueMethods": true
    })
  })
</script>


<!--End mc_embed_signup-->
<?php

get_footer();
