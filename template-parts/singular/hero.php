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

	<?php if ( in_array( $post->post_type, array( 'resources', 'talent' ) ) ) : ?>
		<div class="grid grid-cols-2">
			<div class="aspect-w-13 aspect-h-7">
				<div class="flex flex-col justify-start p-8 pb-6 text-white bg-black">
					<h1 class="text-2xl leading-tight font-regular"><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="aspect-w-13 aspect-h-7">
				<div class="flex flex-col justify-end p-8 pb-6 text-black <?php echo esc_attr( $post->post_type === 'resources' ? 'bg-indigo' : 'bg-green' ); ?>">
					<p class="text-xl leading-tight font-light">A project by <br /> <?php the_field( 'name' ); ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>

</div>
