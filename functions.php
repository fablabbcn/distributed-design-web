<?php

// SocialMedia
require_once get_template_directory() . '/includes/lib/class-socialmedia.php';


// Sets up theme
function load_the_theme_settings() {

	load_theme_textdomain( 'ddmp' );

	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'full-screen-thumbnails', 2000, null, true );
		add_image_size( 'container-thumbnails', 1090, null, true );
		add_image_size( 'post-list-thumbnails', 768, null, true );
		add_image_size( 'post-list-thumbnails-square', 768, 768, true );
		add_image_size( 'icon-thumbnails', 300, null, true );

		// Add supports
		add_theme_support( 'html5' );
		add_theme_support( 'custom-background' );
	}

	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
				'primary'   => __( 'Primary Navigation', 'ddmp' ),
				'secondary' => __( 'Secondary Navigation', 'ddmp' ),
			)
		);
	}

	// Set count revision on 5
	if ( ! defined( 'WP_POST_REVISIONS' ) ) {
		define( 'WP_POST_REVISIONS', 5 );
	}

} add_action( 'after_setup_theme', 'load_the_theme_settings' );


function update_numbers() {
	global $wpdb;
	$querystr  = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'resources' ";
	$pageposts = $wpdb->get_results( $querystr, OBJECT );
	$counts    = 0;

	if ( $pageposts ) {
		foreach ( $pageposts as $post ) {
			setup_postdata( $post );
			$counts++;
			add_post_meta( $post->ID, 'incr_number', $counts, true );
			update_post_meta( $post->ID, 'incr_number', $counts );
		}
	}
}

add_action( 'publish_post', 'update_numbers' );
add_action( 'deleted_post', 'update_numbers' );
add_action( 'edit_post', 'update_numbers' );


function html5_search_form( $form ) {
	return ( '
		<section class="search">
			<form role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >
				<label class="screen-reader-text" for="s">' . esc_html__( 'Search Query', 'ddmp' ) . '</label>
				<input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
				<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Go', 'ddmp' ) . '" />
			</form>
		</section>
	' );
}

add_filter( 'get_search_form', 'html5_search_form' );


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Register widget area
function the_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Default Sidebar', 'ddmp' ),
			'id'            => 'default-sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts', 'ddmp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'the_theme_widgets_init' );

// Clean up wp_head()
remove_action( 'wp_head', 'wp_generator' );

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode', 11 );

// Add SVG as supported mime type for uploads
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
} add_filter( 'upload_mimes', 'cc_mime_types' );

// Do not generate and display WordPress version
function the_theme_no_generator() {
	return '';
} add_filter( 'the_generator', 'the_theme_no_generator' );


function get_term_slug( $term ) {
	return is_object( $term ) ? $term->slug : $term;
}

function get_term_name( $term ) {
	return is_object( $term ) ? $term->name : $term;
}

function get_term_month( $term ) {
	$month = date( 'm', strtotime( "$term/01/2019" ) );
	return $month;
}

function get_button_clip( $terms, $term, $pad, $get_callback ) {
	global $post_type;

	$terms_slugs = array_map( 'get_term_slug', $terms );
	$terms_diff  = array_diff( $terms_slugs, [ $get_callback( $term ) ] );

	$button_clip = implode(
		', ',
		array_map(
			function ( $term ) use ( $pad ) {
				global $post_type;
				return "$post_type-$pad-$term";
			},
			array_merge( [ '' ], $terms_diff )
		)
	);

	return $button_clip;
}


// Enqueue scripts and styles.
require get_parent_theme_file_path( '/includes/enqueues.php' );

// Additional features to allow styling of the templates.
require get_parent_theme_file_path( '/includes/template-functions.php' );

// Customizer additions.
require get_parent_theme_file_path( '/includes/customizer.php' );

// Duplicate post
require get_parent_theme_file_path( '/includes/duplicate_post.php' );

// Shortcodes
require get_parent_theme_file_path( '/includes/shortcodes.php' );

// ACF
require get_parent_theme_file_path( '/includes/acf.php' );
