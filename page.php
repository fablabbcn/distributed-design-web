<?php
/**
 * The template for displaying all pages
 */

get_header();

?>

<main class="container w-full flex-grow !max-w-full">

	<article class="flex flex-col">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/post/content', 'none' ); ?>
		<?php endif; ?>
	</article>

</main>

<?php get_footer(); ?>
