<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<main class="flex-grow">

	<article class="">

		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( 'template-parts/blocks/header' ); ?>

		<section class="flex border-b">
			<div class="w-full lg:w-1/4 mr-auto p-20"><?php get_template_part( 'template-parts/singular/side' ); ?></div>
			<div class="w-full lg:w-3/4 ml-auto lg:border-l"><?php get_template_part( 'template-parts/singular/hero' ); ?></div>
		</section>

		<section class="rich-text">
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content' ); ?>
		</section>

	</article>

</main>
