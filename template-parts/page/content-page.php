<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<main class="info-section">

	<article class="base-col">
		<header class="page-header">
			<h1><?php the_title(); ?></h1>
		</header>
		<div class="page-content">
			<?php the_content(); ?>
		</div>
	</article>

	<aside class="col">
		<p><strong><?php the_field( 'subtitle' ); ?></strong></p>
	</aside>

</main>

<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content' ); ?>
