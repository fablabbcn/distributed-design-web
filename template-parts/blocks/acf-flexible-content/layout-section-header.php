<?php
/**
 * ✅ Template part for Section Header layout
 */

$_title       = get_sub_field( 'title' );
$_description = get_sub_field( 'description' );

?>

<div class="lg:flex border-b">
	<div class="lg:w-3/4 ml-auto lg:border-l">

		<div class="w-full p-20 lg:pt-60 font-oswald uppercase"><?php echo wp_kses_post( $_title ); ?></div>

		<?php if ( $_description ) : ?>
			<div class="w-full p-20 font-bold border-t"><?php echo wp_kses_post( $_description ); ?></div>
		<?php endif; ?>

	</div>
</div>
