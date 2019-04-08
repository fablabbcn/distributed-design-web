<?php

$slider = array(
	'class'  => 'post-slider',
	'images' => get_field( 'featured_image_alt' ) ?: array(),
);

?>

<div class="-m-20 lg:-mx-40">
	<?php if ( get_field( 'featured_image_alt' ) ) : ?>
		<div class="flex flex-col">
			<?php require locate_template( 'template-parts/blocks/slider.php' ); ?>
			<?php if ( get_field( 'subtitle' ) ) : ?>
				<div class="mt-auto px-15 lg:px-40 py-20 border-t">
					<div class="text-36 font-oswald uppercase"><?php the_field( 'subtitle' ); ?></div>
				</div>
			<?php endif; ?>
		</div>

	<?php else : ?>
		<div class="bg-cover bg-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
			<?php the_post_thumbnail(); ?>
		</div>

	<?php endif; ?>
</div>
