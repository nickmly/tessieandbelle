<?php

/**
 * The template for displaying the front page
 *
 * @package storefront
 */

get_header(); ?>

<div class="front-page-content-area">
	<?php
	while (have_posts()) :
		the_post();
		the_content();
	endwhile;

	get_footer();

	?>