<?php

add_action('wp_enqueue_scripts', 'enqueue_styles');

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
  wp_enqueue_style(
    'header',
    get_stylesheet_directory_uri()  . '/assets/css/header.css',
    array($parenthandle),
    $theme->get('Version') // this only works if you have Version in the style header
  );
  wp_enqueue_style(
    'frontpage',
    get_stylesheet_directory_uri()  . '/assets/css/frontpage.css',
    array($parenthandle),
    $theme->get('Version') // this only works if you have Version in the style header
  );
  wp_enqueue_style(
    'mailchimp',
    get_stylesheet_directory_uri()  . '/assets/css/mailchimp.css',
    array($parenthandle),
    $theme->get('Version') // this only works if you have Version in the style header
  );
}

require get_stylesheet_directory() . '/inc/gutenberg.php';
