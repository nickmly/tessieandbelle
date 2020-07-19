<?php
function tb_customize_register($wp_customize)
{
	tb_customize_terms($wp_customize);
	tb_customize_free_shipping_notice($wp_customize);
}

function tb_customize_terms($wp_customize)
{
	$wp_customize->add_section('tb_terms', array(
		'title' => 'WPAutoTerms',
		'description' => '',
		'priority' => 120,
	));
	$wp_customize->add_setting('terms_url', array(
		'default' => '/wpautoterms/terms-and-conditions-2/'
	));
	$wp_customize->add_control('terms_url', array(
		'label' => __('Terms and Conditions URL'),
		'type' => 'text',
		'section' => 'tb_terms',
	));
}

function tb_customize_free_shipping_notice($wp_customize)
{
	$wp_customize->add_section('tb_fsn', array(
		'title' => 'Free Shipping Notice',
		'description' => '',
		'priority' => 120,
	));
	$wp_customize->add_setting('free_shipping_msg', array(
		'default' => 'You unlocked free shipping! Select \'Free shipping\' at checkout',
	));
	$wp_customize->add_control('free_shipping_msg', array(
		'label' => __('Free shipping unlocked notice message'),
		'type' => 'text',
		'section' => 'tb_fsn',
	));
}

add_action('customize_register', 'tb_customize_register');
