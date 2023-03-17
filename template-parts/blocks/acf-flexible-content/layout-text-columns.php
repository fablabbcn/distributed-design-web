<?php
/**
 * ✅ Template part for Text Columns layout
 */

$_subtitle = get_sub_field( 'subtitle' );
$_columns  = get_sub_field( 'columns' );

?>

<div class="">

	<?php if ( $_subtitle ) : ?>
		<div class="">
			<div class=""><?php echo wp_kses_post( $_subtitle ); ?></div>
		</div>
	<?php endif; ?>

	<div class="">
		<?php foreach ( $_columns as $_column ) : ?>
			<?php $classes = array( 'rich-text', $_column['styles'] ? '' : '' ); ?>
			<div class="<?php the_classes( $classes ); ?>"><?php wp_kses_ddmp( $_column['text'] ); ?></div>
		<?php endforeach; ?>
	</div>

</div>
