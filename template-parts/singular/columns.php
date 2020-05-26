<?php

$_items = get_sub_field( 'items' );

?>


<div class="flex flex-wrap justify-center items-baseline -m-10 lg:-m-20 flex-1">
	<?php foreach ( $_items as $_item ) : ?>

		<div class="w-full sm:w-1/2 md:w-1/3 p-10 lg:p-20">

			<?php if ( $_item['link'] ) : ?>
				<a class="block"
					href="<?php echo esc_attr( $_item['link']['url'] ); ?>"
					target="<?php echo esc_attr( $_item['link']['target'] ); ?>">
			<?php endif; ?>

			<?php if ( $_item['image'] ) : ?>
				<div class="w-full mb-20">
					<figure class="">
						<?php echo wp_get_attachment_image( $_item['image'], 'post-list-thumbnails-square', false, array( 'class' => 'block mx-auto' ) ); ?>
					</figure>
				</div>
			<?php endif; ?>

			<div class="w-full">
				<div><?php echo wp_kses_post( $_item['text'] ); ?></div>
			</div>

			<?php if ( $_item['link'] ) : ?>
				</a>
			<?php endif; ?>

		</div>

	<?php endforeach; ?>
</div>
