<?php

$slider = array(
	'class'  => 'post-slider h-full my-auto',
	'images' => get_field( 'featured_image_alt' ) ?: array(),
);

?>

<div class="-m-20 lg:-mx-40 flex-grow">
	<?php if ( get_field( 'featured_image_alt' ) ) : ?>
		<div class="flex flex-col justify-end h-full">

			<?php require locate_template( 'template-parts/blocks/slider.php' ); ?>

			<?php if ( get_field( 'subtitle' ) ) : ?>
				<div class="px-15 lg:px-40 py-20 border-t">
					<div class="text-20 lg:text-36 font-oswald uppercase"><?php the_field( 'subtitle' ); ?></div>
				</div>
			<?php endif; ?>

		</div>

	<?php else : ?>
		<div>
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full max-h-screen object-cover' ) ); ?>
		</div>

	<?php endif; ?>
</div>
