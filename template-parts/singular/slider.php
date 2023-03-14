<?php

$images = get_sub_field( 'image' ) ?: array();
$slider = array(
	'slides'     => $images,
	'component'  => 'template-parts/singular/slider-slide',
	'pagination' => false,
	'navigation' => false,
	'class'      => '!px-8 !overflow-visible',
);

?>


<?php if ( $images ) : ?>
	<div class="bleed">
		<?php set_query_var( 'slider', $slider ); ?>
		<?php get_template_part( 'template-parts/base/slider' ); ?>
	</div>
<?php endif; ?>
