<?php

$slider = array(
	'class'  => '',
	'slides' => get_field( 'featured_image_alt' ) ?: array( get_post_thumbnail_id( $post ) ),
	'component' => 'template-parts/singular/slider-slide',
);

?>


<div class="bleed">

	<?php if ( get_field( 'featured_image_alt' ) ) : ?>
		<div class="">
			<?php set_query_var( 'slider', $slider ); ?>
			<?php require locate_template( 'template-parts/base/slider.php' ); ?>
		</div>
	<?php else : ?>
		<div class="">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full max-h-screen object-cover' ) ); ?>
		</div>
	<?php endif; ?>

	<!-- <?php if ( get_field( 'subtitle' ) ) : ?>
		<div class="">
			<div class=""><?php the_field( 'subtitle' ); ?></div>
		</div>
	<?php endif; ?> -->

</div>
