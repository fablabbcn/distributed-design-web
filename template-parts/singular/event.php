<?php

$details = array(
	'date_start' => tribe_get_start_date( null, false, 'l jS F Y' ),
	'date_end'   => tribe_get_end_date( null, false, 'l jS F Y' ),
	'time_start' => tribe_get_start_date( null, false, 'g:ia' ),
	'time_end'   => tribe_get_end_date( null, false, 'g:ia' ),
	'website'    => tribe_get_event_website_url(),
);

$venue = array(
	'venue'    => tribe_get_venue(),
	'address'  => tribe_get_full_address(),
	'map_link' => tribe_get_map_link_html(),
	'website'  => tribe_get_venue_website_url(),
);


?>

<header>
	<p class="font-bold">Details</p><p>-</p>
</header>

<dl>
	<?php if ( $details['date_start'] || $details['date_end'] ) : ?>
		<dt>Date</dt>
		<dd><?php echo wp_kses_post( $details['date_start'] !== $details['date_end'] ? "{$details['date_start']} — {$details['date_end']}" : $details['date_start'] ); ?></dd>
	<?php endif; ?>

	<?php if ( $details['time_start'] || $details['time_end'] ) : ?>
		<dt>Time</dt>
		<dd><?php echo wp_kses_post( $details['time_start'] !== $details['time_end'] ? "{$details['time_start']} — {$details['time_end']}" : $details['time_start'] ); ?></dd>
	<?php endif; ?>

	<?php if ( $details['website'] ) : ?>
		<dt><a class="no-underline" href="<?php echo wp_kses_post( $details['website'] ); ?>" target="_blank">Website &rarr;</a></dt>
	<?php endif; ?>
</dl>

<hr class="" />


<header>
	<p class="font-bold">Venue</p><p>-</p>
</header>

<dl>
	<dt><?php echo wp_kses_post( $venue['venue'] ); ?> </dt>
	<dd><?php echo wp_kses_post( $venue['address'] ); ?> </dd>
	<dd><?php echo wp_kses_post( $venue['map_link'] ); ?> </dd>

	<?php if ( $venue['website'] ) : ?>
		<dt><a class="no-underline" href="<?php echo wp_kses_post( $venue['website'] ); ?>" target="_blank">Website &rarr;</a></dt>
	<?php endif; ?>
</dl>
