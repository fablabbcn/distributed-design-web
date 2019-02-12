<?php
/**
 * Template part for displaying flexible_content
 */

$layout  = 1;
$post_id = get_the_ID();

?>


<?php if ( have_rows( 'flexible_content', $post_id ) ) : ?>
	<?php while ( have_rows( 'flexible_content', $post_id ) ) : ?>
		<?php the_row(); ?>

		<?php if ( 'visual_intro' === get_row_layout() ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'visual-intro' ); ?>


		<?php elseif ( 'statistics' === get_row_layout() ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'statistics' ); ?>


		<?php elseif ( 'members' === get_row_layout() ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'members' ); ?>


		<?php elseif ( 'two_columns' === get_row_layout() ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'two-columns' ); ?>


		<?php elseif ( 'logos' === get_row_layout() ) : ?>
			<?php if ( get_sub_field( 'same_homepage' ) && ! is_front_page() ) : ?>
				<?php set_query_var( 'layout', $layout ); ?>
				<?php get_template_part( 'template-parts/logos' ); ?>

			<?php else : ?>
				<?php set_query_var( 'layout', $layout ); ?>
				<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos' ); ?>
			<?php endif ?>


		<?php elseif ( 'editor' === get_row_layout() ) : ?>
			<div class="container"><?php the_sub_field( 'content' ); ?></div>


		<?php endif; ?>

		<?php $layout++; ?>

	<?php endwhile; ?>
<?php endif; ?>
