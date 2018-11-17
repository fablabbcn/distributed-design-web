<?php
/**
 * Template part for displaying flexible_content
 */

?>

<?php 

$post_id = get_the_ID();


if( have_rows('flexible_content', $post_id) ): 

    $layout = 1;
    while ( have_rows('flexible_content', $post_id)) : the_row(); ?>

        <?php if( get_row_layout() == 'visual_intro' ): ?>

			<?php set_query_var('layout', $layout); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'visual-intro');  ?>
	       
		<?php  $layout++; ?>
		
        <?php elseif( get_row_layout() == 'statistics' ): ?>

			<?php set_query_var('layout', $layout); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'statistics');  ?>

		<?php  $layout++; ?>
		<?php elseif( get_row_layout() == 'members' ): ?>
		
			<?php set_query_var('layout', $layout); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'members');  ?>

		<?php  $layout++; ?>

		<?php elseif( get_row_layout() == 'two_columns' ): ?>
		
			<?php set_query_var('layout', $layout); ?>
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'two-columns');  ?>

		<?php  $layout++; ?>

		<?php elseif( get_row_layout() == 'logos' ): ?>
			<?php if (get_sub_field('same_homepage') && !is_front_page()): ?>
				<?php if( have_rows('flexible_content', get_option('page_on_front')) ):
					    while ( have_rows('flexible_content', get_option('page_on_front')) ) : the_row(); ?>					     
							<?php set_query_var('layout', $layout); ?>
							<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos');  ?>							
					    <?php endwhile;
					endif;  ?>					
			<?php else: ?>
				<?php set_query_var('layout', $layout); ?>
				<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos');  ?>
			<?php endif ?>
		<?php  $layout++; ?>  

		<?php elseif( get_row_layout() == 'editor' ): ?>
			<div class="container">
				<?php the_sub_field('content');  ?>
			</div>
		<?php  $layout++; ?>
		
        <?php endif;
    endwhile;
endif;  ?>


