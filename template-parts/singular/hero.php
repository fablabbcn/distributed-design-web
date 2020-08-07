<?php

$slider = array(
	'class'  => 'post-slider h-screen flex-1 my-auto',
	'images' => get_field( 'featured_image_alt' ) ?: array(),
);

?>

<div class="-m-20 lg:-m-40 flex-grow">

	<?php if ( get_field( 'featured_image_alt' ) ) : ?>
		<div class="flex flex-col justify-end flex-grow">
			<?php require locate_template( 'template-parts/blocks/slider.php' ); ?>
		</div>
	<?php else : ?>
		<div>
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full max-h-screen object-cover' ) ); ?>
		</div>
	<?php endif; ?>

	<?php if ( get_field( 'subtitle' ) ) : ?>
		<div class="lg:p-40 p-20 border-t">
			<div class="text-20 lg:text-36 font-oswald uppercase"><?php the_field( 'subtitle' ); ?></div>
		</div>
	<?php endif; ?>

</div>
