<?php

$details = array(
	'date_start' => tribe_get_start_date( null, false, 'l jS F Y' ),
	'date_end'   => tribe_get_end_date( null, false, 'l jS F Y' ),
	'time_start' => tribe_get_start_date( null, false, 'g:ia' ),
	'time_end'   => tribe_get_end_date( null, false, 'g:ia' ),
	'website'    => tribe_get_event_website_link(),
);

$venue = array(
	'website' => tribe_get_venue_website_link(),
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
		<dt>Website</dt>
		<dd><?php echo wp_kses_post( $details['website'] ); ?></dd>
	<?php endif; ?>
</dl>

<hr class="" />


<?php

$website = tribe_get_venue_website_link();

?>


<header>
	<p class="font-bold">Venue</p><p>-</p>
</header>

<dl>
	<dt><?php echo wp_kses_post( tribe_get_venue() ); ?> </dt>
	<dd><?php echo wp_kses_post( tribe_get_full_address() ); ?> </dd>
	<dd><?php echo wp_kses_post( tribe_get_map_link_html() ); ?> </dd>

	<?php if ( $website ) : ?>
		<dt>Website</dt>
		<dd><?php echo wp_kses_post( $website ); ?></dd>
	<?php endif; ?>
</dl>
