<?php

$details = array(
	'date_start' => tribe_get_start_date( null, false, 'l jS F Y' ),
	'date_end'   => tribe_get_end_date( null, false, 'l jS F Y' ),
	'time_start' => tribe_get_start_date( null, false, 'g:ia' ),
	'time_end'   => tribe_get_end_date( null, false, 'g:ia' ),
);

$blocks = array(
	'Details' => array(
		array( 'Date', $details['date_start'] !== $details['date_end'] ? "{$details['date_start']} — {$details['date_end']}" : $details['date_start'] ),
		array( 'Time', $details['time_start'] !== $details['time_end'] ? "{$details['time_start']} — {$details['time_end']}" : $details['time_start'] ),
		array( '<a class="no-underline" href="//' . tribe_get_event_website_url() . '" target="_blank">Website &rarr;</a>' ),
	),
	'Venue'   => array(
		array( tribe_get_venue(), tribe_get_full_address(), tribe_get_map_link_html() ),
		array( '<a class="no-underline" href="//' . tribe_get_venue_website_url() . '" target="_blank">Website &rarr;</a>' ),
	),
);


?>

<?php foreach ( $blocks as $key => $block ) : ?>
	<?php $not_first = array_keys( $blocks )[0] !== $key; ?>

	<header class="<?php the_classes( $not_first ? array( 'mt-30 md:mt-60' ) : array() ); ?>">
		<?php set_query_var( 'details', array( 'heading' => $key ) ); ?>
		<?php get_template_part( 'template-parts/singular/details' ); ?>
	</header>

	<dl>
		<?php foreach ( $block as $key => $items ) : ?>
			<?php foreach ( $items as $key => $item ) : ?>
				<?php if ( 0 === $key ) : ?>
					<dt><?php echo wp_kses_post( $item ); ?></dt>
				<?php else : ?>
					<dd><?php echo wp_kses_post( $item ); ?></dd>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
	</dl>


<?php endforeach; ?>
