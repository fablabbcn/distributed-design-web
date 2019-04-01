<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<main class="flex-grow">

	<article class="">

		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( 'template-parts/blocks/header' ); ?>

		<div class="rich-text">
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content' ); ?>
		</div>

	</article>

</main>
