<?php

function no_default_thumbnail() {
	return '<img src="' . get_stylesheet_directory_uri() . '/assets/images/no-default-thumbnail.png" alt="no image available">';
}

// Images in post content will link to large version instead of fullscreen one.
function the_theme_add_lightbox_class( $html, $id ) {
	$url  = wp_get_attachment_image_src( $id, 'large' );
	$html = preg_replace( '/<a href="[^"]+\.(jpe?g|gif|png)">/i', '<a href="' . $url[0] . '">', $html );
	return $html;
} add_filter( 'image_send_to_editor', 'the_theme_add_lightbox_class', 10, 3 );


// Images in post content will have img-responsive class by default
function the_theme_add_class_to_thumbnail( $thumb ) {
	$thumb = str_replace( 'attachment-', 'img-responsive attachment-', $thumb );
	return $thumb;
} add_filter( 'post_thumbnail_html', 'the_theme_add_class_to_thumbnail' );


// Images in post content won't have link by default
function the_theme_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ( 'none' !== $image_set ) {
		update_option( 'image_default_link_type', 'none' );
	}
} add_action( 'admin_init', 'the_theme_imagelink_setup', 10 );


// Images in post content won't have height and width attributes
function the_theme_remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
} add_filter( 'get_image_tag', 'the_theme_remove_thumbnail_dimensions', 10 );
add_filter( 'post_thumbnail_html', 'the_theme_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'the_theme_remove_thumbnail_dimensions', 10 );


// Add active class.
function special_nav_class( $classes, $menu_item = null ) {
	if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes ) ) {
		$classes[] = 'active';
	}
	if ( is_archive() || is_singular( 'post' ) ) {
		if ( get_the_permalink( get_option( 'page_for_posts' ) ) == $menu_item->url ) {
			$classes[] = 'active';
		}
	}
	return $classes;
} add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );


// Custom posts per page per custom post types.
// add_action( 'pre_get_posts', 'set_posts_per_page_for_cpt' );
function set_posts_per_page_for_cpt( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'talent' ) ) {
		$query->set( 'posts_per_page', '8' );
	}
}


/**
 * Custom wp_kses function:
 * Allows using [button_link] shortcodes inside the_content.
 */
function wp_kses_ddmp( $content ) {
	$svg_args = array(
		'svg' => array( 'class' => true ),
		'use' => array( 'xlink:href' => true ),
	);

	$allowed_tags = array_merge( wp_kses_allowed_html( 'post' ), $svg_args );

	echo wp_kses( $content, $allowed_tags );
}
