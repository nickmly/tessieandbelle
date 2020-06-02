<?php

/**
 * Custom Gutenberg functions
 */

function tb_gutenberg_defaults()
{
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name' => 'White',
				'slug' => 'white',
				'color' => '#fff'
			),
			array(
				'name' => 'Black',
				'slug' => 'black',
				'color' => '#090708'
			),
			array(
				'name' => 'Gray',
				'slug' => 'gray',
				'color' => '#867D74'
			),
			array(
				'name' => 'Green',
				'slug' => 'green',
				'color' => '#637976'
			),
			array(
				'name' => 'Gold',
				'slug' => 'gold',
				'color' => '#C39A64'
			),
			array(
				'name' => 'Blue',
				'slug' => 'blue',
				'color' => '#BECACA'
			),			
			array(
				'name' => 'Pink',
				'slug' => 'pink',
				'color' => '#D4AEA5'
			)
		)
	);

	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name' => 'Normal',
				'slug' => 'normal',
				'size' => 16,
			),
			array(
				'name' => 'Medium',
				'slug' => 'medium',
				'size' => 32,
			),
			array(
				'name' => 'Large',
				'slug' => 'large',
				'size' => 64,
			)
		)
	);
}

add_action('init', 'tb_gutenberg_defaults');
