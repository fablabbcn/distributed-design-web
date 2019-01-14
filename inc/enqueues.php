<?php

// Enqueue style and js
function the_theme_scripts() {

	wp_enqueue_style( 'fonts-Oswald', 'https://fonts.googleapis.com/css?family=Oswald:700' );
	wp_enqueue_style( 'fonts-Poppins', 'https://fonts.googleapis.com/css?family=Poppins:400,600' );
	wp_enqueue_style( 'tachyons', 'https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css' );

	wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/assets/css/theme.css', null, time() );
	wp_enqueue_style( 'grids', get_stylesheet_directory_uri() . '/assets/css/grids.css', null, time() );
	wp_enqueue_style( 'accordion', get_stylesheet_directory_uri() . '/assets/css/accordion.css', null, time() );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', null, time() );

	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css', null, time() );

	wp_enqueue_script( 'bootstrap-min', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'accordion', get_stylesheet_directory_uri() . '/assets/js/accordion.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'slick-min', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), false, true );
	// wp_enqueue_script( 'placeholders', get_stylesheet_directory_uri() . '/assets/js/placeholders.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), time(), true );

	$js_names = array(
		'jquery',
		'bootstrap-min',
		'slick-min',
		// 'placeholders',
		'scripts',
	);

	$localize_arr = array(
		'homeUrl'  => home_url(),
		'homePath' => get_stylesheet_directory_uri(),
		'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
	);

	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/theme-scripts.js', $js_names, false, true );
	wp_localize_script( 'theme-scripts', 'wpHelper', $localize_arr );

} add_action( 'wp_enqueue_scripts', 'the_theme_scripts' );

//Enqueue admin style and scripts function
function the_theme_enqueue_admin_styles_scripts() {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/assets/css/admin-styles.css' );
} add_action( 'admin_enqueue_scripts', 'the_theme_enqueue_admin_styles_scripts' );

function the_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/css/editor.css' );
} add_action( 'current_screen', 'the_theme_add_editor_styles' );

//  html5 for IE
function IEhtml5_shim_func() {
	echo '<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script><![endif]-->';
} add_action( 'wp_head', 'IEhtml5_shim_func' );
