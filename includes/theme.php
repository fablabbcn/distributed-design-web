<?php

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
