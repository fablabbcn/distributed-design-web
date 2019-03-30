<?php
/**
 * The template for displaying all pages
 */

get_header();

$is_single_event = is_single() && 'page' === get_post_type() && 'tribe_events' === $post_type;

var_dump( get_the_title() );

?>


<?php if ( $is_single_event ) : ?>
	<?php set_query_var( 'title', get_the_title() ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>

	<?php get_template_part( 'template-parts/archive/aside', $post_type ); ?>
	<?php get_template_part( 'template-parts/post/content', get_post_type() ); ?>

	<?php get_template_part( 'template-parts/forms/index' ); ?>

	<?php set_query_var( 'layout', $layout ); ?>
	<?php get_template_part( 'template-parts/logos' ); ?>


<?php elseif ( have_posts() ) : ?>
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' ); ?>

	<?php endwhile; ?>
<?php else : ?>
	<div class="container">
		<div class="page-content text-center">
			<?php get_template_part( 'template-parts/post/content', 'none' ); ?>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
