<?php

require_once get_template_directory() . '/includes/lib/class-socialmedia.php';

require_once get_parent_theme_file_path( '/includes/utils.php' );
require_once get_parent_theme_file_path( '/includes/setup.php' );
require_once get_parent_theme_file_path( '/includes/register.php' );
require_once get_parent_theme_file_path( '/includes/enqueues.php' );
require_once get_parent_theme_file_path( '/includes/template-functions.php' );
require_once get_parent_theme_file_path( '/includes/customizer.php' );
require_once get_parent_theme_file_path( '/includes/duplicate_post.php' );
require_once get_parent_theme_file_path( '/includes/acf.php' );
require_once get_parent_theme_file_path( '/includes/shortcodes.php' );
require_once get_parent_theme_file_path( '/includes/forms.php' );

// Redirect single posts to the archive page.
add_action(
	'template_redirect',
	function () {
		if ( is_singular( 'resources' ) ) {
			global $post;
			$redirect_link = get_post_type_archive_link( 'resources' ) . '#post-' . get_the_ID();
			wp_redirect( $redirect_link, 302 );
			exit;
		}
	}
);

// FacetWP: Remove front-end styles
add_filter(
	'facetwp_assets',
	function( $assets ) {
		unset( $assets['front.css'] );
		return $assets;
	}
);

// FacetWP: Custom Pagination.
// add_filter(
// 	'facetwp_pager_html',
// 	function ( $output, $params ) {
// 		return Timber::compile(
// 			'partials/common/pagination.twig',
// 			array(
// 				'post'  => new Timber\Post(),
// 				'facet' => $params,
// 			)
// 		);
// 	},
// 	10,
// 	2
// );
