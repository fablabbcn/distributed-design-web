<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article class="info-section">
	<div class="base-col">
		<header class="page-header">
			<h1><?php the_title(); ?></h1>
		</header>
		<div class="page-content">
			<?php the_content(); ?>	
		</div>		
	</div><!-- / base-col -->
	<div class="col">		
		<p><strong><?php the_field('subtitle'); ?></strong></p>
	</div><!-- / col -->
</article><!-- / info-section -->
<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content');  ?>

