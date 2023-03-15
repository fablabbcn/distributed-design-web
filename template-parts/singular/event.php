<?php

$details = array(
	'date_start' => tribe_get_start_date( null, false, 'l jS F Y' ),
	'date_end'   => tribe_get_end_date( null, false, 'l jS F Y' ),
	'time_start' => tribe_get_start_date( null, false, 'g:ia' ),
	'time_end'   => tribe_get_end_date( null, false, 'g:ia' ),
);

$date = $details['date_start'] !== $details['date_end'] ? "{$details['date_start']} — {$details['date_end']}" : $details['date_start'];
$time = $details['time_start'] !== $details['time_end'] ? "{$details['time_start']} — {$details['time_end']}" : $details['time_start'];
$venue = tribe_get_venue() ? tribe_get_venue_website_url() ? array( array( 'label' => tribe_get_venue(), 'href' => tribe_get_venue_website_url() ) ) : tribe_get_venue() : null;
$location = tribe_get_full_address() ? tribe_get_map_link() ? array( array( 'label' => tribe_get_full_address(), 'href' => tribe_get_map_link() ) ) : tribe_get_full_address() : null;
$price = tribe_get_formatted_cost() ? tribe_get_event_website_url() ? array( array( 'label' => tribe_get_formatted_cost(), 'href' => tribe_get_event_website_url() ) ) : tribe_get_formatted_cost() : null;


$definitions = array(
	'items' => array(
		array( 'terms' => array('Date'), 'definitions' => array( $date ?: '—' ) ),
		array( 'terms' => array('Opening hours'), 'definitions' => array( $time ?: '—' ) ),
		array( 'terms' => array('Venue'), 'definitions' => array( $venue ?: '—' ) ),
		array( 'terms' => array('Location'), 'definitions' => array( $location ?: '—' ) ),
		array( 'terms' => array('Price'), 'definitions' => array( $price ?: 'Free' ) ),
	),
);

?>


<?php set_query_var( 'list', $definitions ); ?>
<?php get_template_part( 'template-parts/base/list-definitions' ); ?>
