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


<section class="post-content rich-text">
	<div class="lg:flex-no-wrap flex flex-wrap border-b">
		<div class="<?php the_classes( $cp_classes['columns'][0] ); ?>"><?php get_template_part( 'template-parts/singular/side' ); ?></div>
		<div class="<?php the_classes( $cp_classes['columns'][1] ); ?>"><?php get_template_part( 'template-parts/singular/hero' ); ?></div>
	</div>
</section>

<section class="rich-text">
	<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content' ); ?>
</section>
