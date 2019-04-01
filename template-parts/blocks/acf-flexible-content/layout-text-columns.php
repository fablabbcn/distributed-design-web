<?php
/**
 * ✅ Template part for Text Columns layout
 */

$_subtitle = get_sub_field( 'subtitle' );
$_columns  = get_sub_field( 'columns' );

?>

<div class="lg:flex border-b">

	<?php if ( $_subtitle ) : ?>
		<div class="flex lg:w-1/4 mr-auto p-10">
			<div class="-mb-20 lg:m-auto p-10 font-oswald uppercase"><?php echo wp_kses_post( $_subtitle ); ?></div>
		</div>
	<?php endif; ?>

	<div class="lg:flex lg:w-3/4 ml-auto p-10 lg:border-l">
		<?php foreach ( $_columns as $_column ) : ?>
			<?php $classes = array( 'w-full p-10', $_column['styles'] ? 'font-oswald uppercase' : '' ); ?>

			<div class="<?php echo esc_attr( implode( ' ', array_filter( $classes ) ) ); ?>">
				<?php echo wp_kses_post( $_column['text'] ); ?>
			</div>
		<?php endforeach; ?>
	</div>

</div>
