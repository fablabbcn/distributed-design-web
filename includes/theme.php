<?php

// Redirect single posts to the archive page.
// add_action(
// 	'template_redirect',
// 	function () {
// 		if ( is_singular( 'resources' ) ) {
// 			global $post;
// 			$redirect_link = get_post_type_archive_link( 'resources' ) . '#post-' . get_the_ID();
// 			wp_redirect( $redirect_link, 302 );
// 			exit;
// 		}
// 	}
// );

// FacetWP: Remove front-end styles
add_filter(
	'facetwp_assets',
	function( $assets ) {
		unset( $assets['front.css'] );
		if ( ! is_archive() ) {
			unset( $assets['fSelect.css'] );
		}
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


add_filter(
	'get_terms_args',
	function( $args, $taxonomies ) {
		if ( isset( $args['term_order'] ) ) {
			$args['orderby'] = 'term_order';
		}
		return $args;
	},
	10,
	2
);

add_filter(
	'get_terms_orderby',
	function( $orderby, $query_vars ) {
		return 'term_order' === $query_vars['orderby'] ? 'term_order' : $orderby;
	},
	10,
	2
);


// Front-end forms.
add_filter( 'remove_hube2_nag', '__return_true' );
add_filter( 'acf-input-counter/display', 'my_acf_counter_filter' );
function my_acf_counter_filter( $display ) {
	$display = sprintf( __( '%1$s / %2$s', 'acf-counter' ), '%%len%%', '%%max%%' );
	return $display;
}

// Show links to single posts inside admin
add_filter( 'register_post_type_args', 'movies_to_films', 10, 2 );
function movies_to_films( $args, $post_type ) {
	if ( 'af_entry' === $post_type ) {
		$args['public']            = true;
		$args['show_ui']           = true;
		$args['show_in_admin_bar'] = true;
	}
	return $args;
}
