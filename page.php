<?php
/**
 * The template for displaying all pages
 */

get_header();


if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' );
	}
} else {
	get_template_part( 'template-parts/post/content', 'none' );
}


get_footer();
