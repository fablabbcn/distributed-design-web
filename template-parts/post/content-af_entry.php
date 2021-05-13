<?php
/**
 * Template part for displaying a message that posts cannot be found
 */

$thumbnail_id    = get_field( 'images' )[0]['image']['ID'];
$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
$thumbnail_attrs = array(
	'class' => 'absolute pin w-full h-full object-cover opacity-70 md:opacity-100 group-hocus:opacity-30',
	'style' => $focal_point ? "z-index: -10; object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%" : 'z-index: -10;',
);

?>


<div id="post-<?php the_ID(); ?>" class="z-0 relative aspect-ratio-1/1 w-full h-0 border-px border-solid overflow-hidden">
	<div class="z-20 absolute pin flex flex-col w-full h-full p-20 pointer-events-none">
		<div class="mt-auto ml-auto -mb-5 pointer-events-auto">
			<?php echo do_shortcode( '[wp_ulike]' ); ?>
		</div>
	</div>

	<a class="group z-10 absolute pin flex w-full h-full p-20 hocus:text-black hocus:bg-primary no-underline" href="<?php the_permalink(); ?>">
		<?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>
		<div class="flex flex-col flex-1 md:opacity-0 group-hocus:opacity-100">
			<p class="font-bold uppercase"><?php the_field( 'name' ); ?></p>
			<p>—</p>
			<p><?php the_field( 'subtitle' ); ?></p>
			<p class="mt-auto font-bold">Read More</p>
		</div>
	</a>
</div>
