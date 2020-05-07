<?php
/**
 * The template for displaying all pages
 */

get_header();

?>


<main class="flex-grow">

	<article class="">
		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( 'template-parts/blocks/header' ); ?>

		<?php

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' );
			}
		} else {
			get_template_part( 'template-parts/post/content', 'none' );
		};

		?>

	</article>

</main>


<?php get_footer(); ?>
