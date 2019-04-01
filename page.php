<?php
/**
 * The template for displaying all pages
 */

get_header();

$is_single_event = is_single() && 'page' === get_post_type() && 'tribe_events' === $post_type;


if ( $is_single_event ) {
	set_query_var( 'title', get_the_title() );
	get_template_part( 'template-parts/blocks/header' );

	get_template_part( 'template-parts/archive/aside', $post_type );
	get_template_part( 'template-parts/post/content', get_post_type() );

	get_template_part( 'template-parts/forms/index' );

	get_template_part( 'template-parts/logos' );

} elseif ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' );
	}
} else {
	get_template_part( 'template-parts/post/content', 'none' );
}


get_footer();
