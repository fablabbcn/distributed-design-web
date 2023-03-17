<?php
/**
 * ✅ Template part for Features List layout
 */

$_items = get_sub_field( 'items' ) ?: array();

?>

<ul class="grid gap-8 items-baseline">
	<?php foreach ( $_items as $_item ) : ?>

		<li class="grid gap-4">
			<div class="grid gap-2">
				<figure class="rounded-2xl overflow-hidden">
					<?php echo wp_get_attachment_image( $_item['image'], 'thumbnail', false, array( 'class' => 'w-full' ) ); ?>
				</figure>
			</div>
			<div class="grid gap-2">
				<div class="font-semibold"><?php echo esc_html( $_item['title'] ); ?></div>
				<div class=""><?php echo wp_kses_post( $_item['text'] ); ?></div>
			</div>
		</li>

	<?php endforeach; ?>
</ul>
