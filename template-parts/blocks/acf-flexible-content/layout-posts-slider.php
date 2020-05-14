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

			<div class="relative">
				<?php echo get_the_post_thumbnail( $_item->ID, 'post-thumbnail', array( 'class' => 'w-full h-screen-80 object-cover' ) ); ?>

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
