<?php
/**
 * ✅ Template part for Features List layout
 */

$_items = get_sub_field( 'items' );

?>

<div class="lg:flex border-b">

	<div class="flex flex-wrap lg:w-3/4 ml-auto p-10 lg:border-l">
		<?php foreach ( $_items as $_item ) : ?>

			<div class="flex w-full lg:w-1/2 mb-20 p-10">
				<div class="w-1/4 lg:w-1/4 pr-10">
					<figure class="border rounded-full overflow-hidden">
						<?php echo wp_get_attachment_image( $_item['image'], 'thumbnail', false, array( 'class' => 'block w-full' ) ); ?>
					</figure>
				</div>
				<div class="w-3/4 lg:w-3/4 pl-10">
					<header class="mb-20 font-bold"><?php echo esc_html( $_item['title'] ); ?></header>
					<div><?php echo wp_kses_post( $_item['text'] ); ?></div>
				</div>
			</div>

		<?php endforeach; ?>
	</div>

</div>
