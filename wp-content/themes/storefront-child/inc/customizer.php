<?php
function mytheme_customize_register($wp_customize)
{
	$wp_customize->add_section('mytheme_terms', array(
		'title' => 'WPAutoTerms',
		'description' => '',
		'priority' => 120,
	));
	$wp_customize->add_setting('mytheme_terms_url');
	$wp_customize->add_control('mytheme_terms_url', array(
		'label' => __('Terms and Conditions URL'),
		'type' => 'text',
		'section' => 'mytheme_terms',
	));
}
add_action('customize_register', 'mytheme_customize_register');
