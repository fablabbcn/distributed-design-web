<?php
/**
 * Template part for displaying page content in page.php
 */

$cp_classes = array(
	'columns' => array(
		array( 'w-full lg:w-1/4 p-20 lg:px-40 border-t' ),
		array( 'w-full lg:w-3/4 p-20 lg:px-40 border-t lg:border-l' ),
	),
);

?>

<main class="flex-grow">

	<article class="">

		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( 'template-parts/blocks/header' ); ?>

		<section class="post-content rich-text">
			<div class="flex flex-wrap lg:flex-no-wrap border-b">
				<div class="<?php the_classes( $cp_classes['columns'][0] ); ?>"><?php get_template_part( 'template-parts/singular/side' ); ?></div>
				<div class="<?php the_classes( $cp_classes['columns'][1] ); ?>"><?php get_template_part( 'template-parts/singular/hero' ); ?></div>
			</div>
		</section>

		<section class="rich-text">
			<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content' ); ?>
		</section>

	</article>

</main>
