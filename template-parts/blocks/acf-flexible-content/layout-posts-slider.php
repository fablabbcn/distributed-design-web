<?php
/**
 * ✅ Template part for Featured Posts layout
 */

$_items = get_sub_field( 'featured_posts' );

// $slider = array(
// 	'class'  => 'post-slider h-screen flex-1 my-auto',
// 	'images' => get_field( 'featured_image_alt' ) ?: array(),
// );

?>

<section class="border-b">

	<div data-slider="featured-posts" class="w-full">
		<?php foreach ( $_items as $_item ) : ?>
			<?php
			$thumbnail_id    = get_post_thumbnail_id( $_item->ID );
			$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
			$thumbnail_attrs = array(
				'class' => 'w-full h-screen-80 object-cover',
				'style' => $focal_point ? "object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%;" : '',
			);
			?>

			<div class="relative">
				<?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>

				<div class="absolute pin-r pin-l pin-b lg:mb-60 w-full">
					<div class="max-w-screen-md w-full mx-auto">
						<div class="relative border bg-white uppercase pl-15 py-20 pr-40 lg:pl-40 -m-border">
							<button class="slick-prev focus:outline-none hidden md:block"></button>
							<button class="slick-next focus:outline-none hidden md:block"></button>
							<div class="flex flex-col md:items-center md:justify-center md:text-center">
								<p class="text-16"><?php echo get_post_type_object( $_item->post_type )->labels->name; ?></p>
								<p class="text-20 lg:text-36 font-oswald"><?php echo $_item->post_title; ?></p>
								<p class="mt-20 text-14 lg:text-18">
									<a class="inline-flex justify-center w-auto lg:w-full max-w-screen-xs items-center py-10 px-20 bg-white hocus:text-black hocus:bg-primary text-center no-underline border rounded-full overflow-hidden" href="<?php echo esc_url( get_permalink( $_item->ID ) ); ?>">Read More</a>
								</p>
							</div>
						</div>
					</div>
				</div>

			</div>

		<?php endforeach; ?>
	</div>

</section>
