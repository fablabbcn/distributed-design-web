<?php 
/**
 * The template for displaying all pages
 */

get_header(); ?>


<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
			
			<?php if (is_front_page()): ?>
			
				<?php get_template_part( 'template-parts/page/content', 'frontpage' );?>
			
			<?php else: ?>
				
				<?php get_template_part( 'template-parts/page/content', 'page' ); ?>				
		
			<?php endif ?>
	
					
		<?php endwhile;
	else: ?>
		<div class="container">
			<div class="page-content text-center">
				<?php get_template_part( 'template-parts/post/content', 'none' );  ?>
			</div>
		</div>
		
	<?php endif; ?>

<?php get_footer();