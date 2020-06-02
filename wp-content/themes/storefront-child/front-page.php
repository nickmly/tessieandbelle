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

get_footer();

?>
