<?php

add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('after_setup_theme', 'after_setup_theme', 99);

function after_setup_theme()
{
	remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
	remove_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
	remove_action('storefront_footer', 'storefront_credit', 20);
	add_action('show_credit', 'show_credit');
}

function get_the_terms_link($before = '', $after = '')
{
	$link = '';
	$terms_url = get_site_url(null, get_theme_mod('mytheme_terms_url'));
	$page_title = 'Terms and Conditions';

	if ($terms_url && $page_title) {
		$link = sprintf(
			'<a class="terms-and-conditions-link" href="%s">%s</a>',
			esc_url($terms_url),
			esc_html($page_title)
		);
		$link = apply_filters('the_terms_link', $link, $terms_url);

		if ($link) {
			return $before . $link . $after;
		}

		return '';
	}
}

function show_credit()
{
	$links_output = '';

	if (apply_filters('storefront_credit_link', true)) {
		if (storefront_is_woocommerce_activated()) {
			$links_output .= '<a href="https://woocommerce.com" target="_blank" title="' . esc_attr__('WooCommerce - The Best eCommerce Platform for WordPress', 'storefront') . '" rel="noreferrer">' . esc_html__('Built with Storefront &amp; WooCommerce', 'storefront') . '</a>.';
		} else {
			$links_output .= '<a href="https://woocommerce.com/storefront/" target="_blank" title="' . esc_attr__('Storefront -  The perfect platform for your next WooCommerce project.', 'storefront') . '" rel="noreferrer">' . esc_html__('Built with Storefront', 'storefront') . '</a>.';
		}
	}
	if (apply_filters('storefront_privacy_policy_link', true) && function_exists('the_privacy_policy_link')) {
		$separator = '<span role="separator" aria-hidden="true"></span>';
		$links_output = get_the_privacy_policy_link('', (!empty($links_output) ? $separator : '')) . $links_output;
	}
	//if (apply_filters('storefront_privacy_policy_link', true) && function_exists('the_terms_link')) {
	$separator = '<span role="separator" aria-hidden="true"></span>';
	$links_output = get_the_terms_link('', (!empty($links_output) ? $separator : '')) . $links_output;
	//}

	$links_output = apply_filters('storefront_credit_links_output', $links_output);
?>
	<div class="site-info">
		<?php echo esc_html(apply_filters('storefront_copyright_text', $content = '&copy; ' . get_bloginfo('name') . ' ' . date('Y'))); ?>

		<?php if (!empty($links_output)) { ?>
			<br />
			<?php echo wp_kses_post($links_output); ?>
		<?php } ?>
	</div><!-- .site-info -->
<?php
}


function enqueue_styles()
{
	$parenthandle = 'storefront'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme = wp_get_theme();
	wp_enqueue_style(
		$parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // if the parent theme code has a dependency, copy it to here
		$theme->parent()->get('Version')
	);
	// wp_enqueue_style(
	// 	'header',
	// 	get_stylesheet_directory_uri()  . '/assets/css/header.css',
	// 	array($parenthandle),
	// 	$theme->get('Version') // this only works if you have Version in the style header
	// );
	// wp_enqueue_style(
	// 	'frontpage',
	// 	get_stylesheet_directory_uri()  . '/assets/css/frontpage.css',
	// 	array($parenthandle),
	// 	$theme->get('Version') // this only works if you have Version in the style header
	// );
}

require get_stylesheet_directory() . '/inc/gutenberg.php';
require get_stylesheet_directory() . '/inc/customizer.php';
