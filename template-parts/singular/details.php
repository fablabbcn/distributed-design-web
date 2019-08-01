<?php

$not_empty = (
	( array_key_exists( 'heading', $details ) && $details['heading'] ) ||
	( array_key_exists( 'subheading', $details ) && $details['subheading'] ) ||
	( array_key_exists( 'bottom', $details ) && $details['bottom'] )
);

$d_classes = array(
	'heading'    => array( 'font-bold' ),
	'subheading' => array( '' ),
	'bottom'     => array( 'mt-auto font-bold' ),
);

?>

<?php if ( $not_empty ) : ?>
	<?php if ( array_key_exists( 'heading', $details ) && $details['heading'] ) : ?>
		<p class="<?php the_classes( $d_classes['heading'] ); ?>"><?php wp_kses_ddmp( $details['heading'] ); ?></p>
		<p>-</p>
	<?php endif; ?>

	<?php if ( array_key_exists( 'subheading', $details ) && $details['subheading'] ) : ?>
		<p class="<?php the_classes( $d_classes['subheading'] ); ?>"><?php wp_kses_ddmp( $details['subheading'] ); ?></p>
	<?php endif; ?>

	<?php if ( array_key_exists( 'bottom', $details ) && $details['bottom'] ) : ?>
		<p class="<?php the_classes( $d_classes['bottom'] ); ?>" style="margin-top: auto;"><?php wp_kses_ddmp( $details['bottom'] ); ?></p>
	<?php endif; ?>


<?php else : ?>
	<p>&nbsp;</p>

<?php endif; ?>
