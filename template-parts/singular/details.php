<?php

$not_empty = $details['heading'] || $details['subheading'] || $details['bottom'];

$d_classes = array(
	'heading'    => array( 'font-bold' ),
	'subheading' => array( '' ),
	'bottom'     => array( 'lg:absolute bottom-2 font-bold' ),
);

?>

<?php if ( $not_empty ) : ?>
	<?php if ( $details['heading'] ) : ?>
		<p class="<?php the_classes( $d_classes['heading'] ); ?> "><?php wp_kses_ddmp( $details['heading'] ); ?></p>
		<p>-</p>
	<?php endif; ?>

	<?php if ( $details['subheading'] ) : ?>
		<p class="<?php the_classes( $d_classes['subheading'] ); ?> "><?php wp_kses_ddmp( $details['subheading'] ); ?></p>
	<?php endif; ?>

	<?php if ( $details['bottom'] ) : ?>
		<p class="<?php the_classes( $d_classes['bottom'] ); ?> "><?php wp_kses_ddmp( $details['bottom'] ); ?></p>
	<?php endif; ?>


<?php else : ?>
	<p>&nbsp;</p>

<?php endif; ?>
