<?php
/**
 * Template part for displaying posts
 */

$thumbnail_id    = get_post_thumbnail_id();
$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
$thumbnail_attrs = array(
	'class' => 'absolute pin w-full h-full object-cover group-hover:opacity-30',
	'style' => $focal_point ? "z-index: -10; object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%" : 'z-index: -10;',
);

?>


<div id="post-<?php the_ID(); ?>" class="relative aspect-ratio-1/1 w-full h-0 border-px border-solid overflow-hidden">
	<a class="group z-10 absolute pin flex w-full h-full p-20 hover:text-black bg-primary-70 hocus:bg-primary" href="<?php the_permalink(); ?>">

		<?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>

		<div class="flex flex-col flex-1 opacity-0 group-hover:opacity-100">
			<p class="font-bold uppercase"><?php the_title(); ?></p>
			<p>—</p>
			<p><?php the_field( 'subtitle' ); ?></p>
			<p class="mt-auto font-bold">Read More</p>
		</div>

	</a>
</div>
