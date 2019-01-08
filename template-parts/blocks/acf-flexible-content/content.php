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

		<?php if ( get_row_layout() == 'visual_intro' ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'visual-intro' ); ?>


		<?php elseif ( get_row_layout() == 'statistics' ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'statistics' ); ?>


		<?php elseif ( get_row_layout() == 'members' ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'members' ); ?>


		<?php elseif ( get_row_layout() == 'two_columns' ) : ?>
			<?php set_query_var( 'layout', $layout ); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'two-columns' ); ?>


		<?php elseif ( get_row_layout() == 'logos' ) : ?>
			<?php if ( get_sub_field( 'same_homepage' ) && ! is_front_page() ) : ?>
				<?php set_query_var( 'layout', $layout ); ?>
				<?php get_template_part( 'template-parts/logos' ); ?>

			<?php else : ?>
				<?php set_query_var( 'layout', $layout ); ?>
				<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos' ); ?>
			<?php endif ?>


		<?php elseif ( get_row_layout() == 'editor' ) : ?>
			<div class="container"><?php the_sub_field( 'content' ); ?></div>


		<?php endif; ?>

		<?php $layout++; ?>

	<?php endwhile; ?>
<?php endif; ?>
