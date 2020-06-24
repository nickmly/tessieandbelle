<?php

/**
 * The template for displaying the front page
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="front-page-landing-area">
	<main id="main" class="site-main" role="main">
		<a href="/shop" title="Go to the shop">
			<div id="landing">
				<div id="landing-image-container">
					<div id="landing-image-overlay"></div>
					<div id="landing-header">
					</div>
					<div id="landing-image"></div>
				</div>
			</div>
		</a>

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