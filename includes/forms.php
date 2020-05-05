<?php

/**
 * Front-End ACF Forms
 */
add_action( 'acf/save_post', 'handle_events_frontend_form', 20 );

function handle_events_frontend_form( $post_id ) {
	/**
	 * ACF creates an array with the organizers IDs.
	 * The Events Calendar expects multiple meta fields for each organizer ID.
	 */
	$event_organizers = get_post_meta( $post_id, '_EventOrganizerID' );
	delete_post_meta( $post_id, '_EventOrganizerID' );

	foreach ( $event_organizers[0] ?: array() as $event_organizer ) {
		add_post_meta( $post_id, '_EventOrganizerID', $event_organizer );
	}
}


/**
 * Login users via rest-API
 */
add_action( 'rest_api_init', 'register_api_hooks' );

function register_api_hooks() {
	register_rest_route(
		'nug/v1',
		'/login/',
		array(
			'methods'  => 'GET',
			'callback' => 'login',
		)
	);
}

function login( $request ) {
	$user = wp_signon(
		array(
			'user_login'    => $request['username'],
			'user_password' => $request['password'],
			'remember'      => true,
		),
		is_ssl()
	);

	// if ( is_wp_error( $user ) ) {
	// 	echo $user->get_error_message();
	// }

	return $user;
}
