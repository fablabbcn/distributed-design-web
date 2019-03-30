<?php

function no_default_thumbnail() {
	return '<img src="' . get_stylesheet_directory_uri() . '/assets/images/no-default-thumbnail.png" alt="no image available">';
}

// Images in post content will link to large version instead of fullscreen one.
function the_theme_add_lightbox_class( $html, $id ) {
	$url  = wp_get_attachment_image_src( $id, 'large' );
	$html = preg_replace( '/<a href="[^"]+\.(jpe?g|gif|png)">/i', '<a href="' . $url[0] . '">', $html );
	return $html;
} add_filter( 'image_send_to_editor', 'the_theme_add_lightbox_class', 10, 3 );


// Images in post content will have img-responsive class by default
function the_theme_add_class_to_thumbnail( $thumb ) {
	$thumb = str_replace( 'attachment-', 'img-responsive attachment-', $thumb );
	return $thumb;
} add_filter( 'post_thumbnail_html', 'the_theme_add_class_to_thumbnail' );


// Images in post content won't have link by default
function the_theme_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ( 'none' !== $image_set ) {
		update_option( 'image_default_link_type', 'none' );
	}
} add_action( 'admin_init', 'the_theme_imagelink_setup', 10 );


// Images in post content won't have height and width attributes
function the_theme_remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
	return $html;
} add_filter( 'get_image_tag', 'the_theme_remove_thumbnail_dimensions', 10 );
add_filter( 'post_thumbnail_html', 'the_theme_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'the_theme_remove_thumbnail_dimensions', 10 );


// Add active class.
function special_nav_class( $classes, $menu_item = null ) {
	if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-ancestor', $classes ) ) {
		$classes[] = 'active';
	}
	if ( is_archive() || is_singular( 'post' ) ) {
		if ( get_the_permalink( get_option( 'page_for_posts' ) ) == $menu_item->url ) {
			$classes[] = 'active';
		}
	}
	return $classes;
} add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 2 );


// Custom posts per page per custom post types.
// add_action( 'pre_get_posts', 'set_posts_per_page_for_cpt' );
function set_posts_per_page_for_cpt( $query ) {
	if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'talent' ) ) {
		$query->set( 'posts_per_page', '8' );
	}
}



// AJAX Create Share.
add_filter( 'wp_ajax_nopriv_post_share', 'post_share' );
add_filter( 'wp_ajax_post_share', 'post_share' );

function post_share() {
	// var_dump( $_POST );

	$array_keys = array_keys( $_POST );
	$post_type  = explode( '-', $array_keys[0] )[0];

	/**
	 * Build the post array
	 */
	switch ( $post_type ) {
		case 'post':
			$post_array = array(
				'post_title' => $_POST[ "$post_type-headline" ],
				'meta_input' => array(
					'left_column_heading'    => $_POST[ "$post_type-organization" ],
					'left_column_subheading' => $_POST[ "$post_type-date" ],
					'left_column_bottom'     => $_POST[ "$post_type-link" ],
				),
			);

			break;

		case 'talent':
			$post_array = array(
				'post_title' => $_POST[ "$post_type-name" ],
				'meta_input' => array(
					'winner_title'        => $_POST[ "$post_type-title" ],
					'winner_name'         => $_POST[ "$post_type-name" ],
					'winner_profession'   => $_POST[ "$post_type-profession" ],
					'winner_organization' => $_POST[ "$post_type-organization" ],
					'project_name'        => $_POST[ "$post_type-project-name" ],
					'project_link'        => $_POST[ "$post_type-link" ],
				),
			);

			break;

		case 'tribe_events':
			$post_array = array(
				'post_title' => $_POST[ "$post_type-event-title" ],
				'meta_input' => array(
					'_EventURL' => $_POST[ "$post_type-link" ],
				),
			);

			break;

	}

	$post_array['meta_input']['article_content'] = $_POST[ "$post_type-about" ];
	$post_array['meta_input']['article_images']  = get_article_images( $_FILES[ "$post_type-article-photos" ], $post_id );

	$post_array['post_type']   = $post_type;
	$post_array['post_author'] = 2; // llos
	$post_array['post_status'] = 'draft';

	/**
	 * Insert the post into the database
	 */
	$post_id = wp_insert_post( $post_array );

	if ( $post_id ) {
		$featured_file = get_featured_image( $_FILES[ "$post_type-head-photo" ], $post_id );

		/**
		 * Return post info
		 */
		wp_send_json(
			array(
				'id'     => $post_id,
				'post'   => $post_array,
				'type'   => $post_type,
				'_files' => $_FILES,
				'_post'  => $_POST,
			)
		);
	}

	die();

}


/**
* Uploads an image to the media library.
*/
function handle_image_upload( $file_name, $file_location ) {
	return wp_upload_bits(
		$file_name,
		null,
		@file_get_contents( $file_location )
	);
}


/**
 * Upload article images
 */
function get_article_images( $files, $post_id ) {
	if ( $files['name'][0] ) {
		$article_images     = array();
		$acf_article_images = array();

		foreach ( $files['name'] as $key => $value ) {
			$image = handle_image_upload(
				$files['name'][ $key ],
				$files['tmp_name'][ $key ]
			);

			// Unnecessarily setting as featured image to ensure attachment_url_to_postid() returns media id.
			generate_featured_image( $image['url'], $post_id );

			$article_images[]     = $image;
			$acf_article_images[] = attachment_url_to_postid( $image['url'] );
		}

		return $acf_article_images;
	} else {
		return false;
	}
}

/**
 * Upload featured image
 *
 * https://tommcfarlin.com/upload-files-in-wordpress/
 * https://tommcfarlin.com/programmatically-delete-files-wordpress-associated-meta-data/
 *
 */
function get_featured_image( $file, $post_id ) {
	if ( $file['name'] ) {
		$featured_image = handle_image_upload(
			$file['name'],
			$file['tmp_name']
		);

		return generate_featured_image( $featured_image['url'], $post_id );
	} else {
		return false;
	}
}



/**
* Downloads an image from the specified URL and attaches it to a post as a post thumbnail.
*
* @param string $image_url  The URL of the image to download.
* @param int    $post_id    The post ID the post thumbnail is to be associated with.
* @return string|WP_Error Attachment ID, WP_Error object otherwise.
*
* https://wordpress.stackexchange.com/a/41300/120928
*
*/
function generate_featured_image( $image_url, $post_id ) {
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents( $image_url );
	$filename   = basename( $image_url );
	$file       = wp_mkdir_p( $upload_dir['path'] )
		? $upload_dir['path'] . '/' . $filename
		: $upload_dir['basedir'] . '/' . $filename;

	file_put_contents( $file, $image_data );

	$wp_filetype = wp_check_filetype( $filename, null );
	$attachment  = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title'     => sanitize_file_name( $filename ),
		'post_content'   => '',
		'post_status'    => 'inherit',
	);

	require_once ABSPATH . 'wp-admin/includes/image.php';

	$attach_id   = wp_insert_attachment( $attachment, $file, $post_id );
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

	$res1 = wp_update_attachment_metadata( $attach_id, $attach_data );
	$res2 = set_post_thumbnail( $post_id, $attach_id );

	return $res2;
}

/**
* Downloads an image from the specified URL and attaches it to a post as a post thumbnail.
*
* @param string $file    The URL of the image to download.
* @param int    $post_id The post ID the post thumbnail is to be associated with.
* @param string $desc    Optional. Description of the image.
* @return string|WP_Error Attachment ID, WP_Error object otherwise.
*
* https://wordpress.stackexchange.com/a/41300/120928
*
*/
function generate_featured_image_alt( $file, $post_id, $desc ) {
	// Set variables for storage, fix file filename for query strings.
	preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
	if ( ! $matches ) {
		return new WP_Error( 'image_sideload_failed', __( 'Invalid image URL' ) );
	}

	$file_array = array(
		'name'     => basename( $matches[0] ),
		'tmp_name' => download_url( $file ),
	);

	// If error storing temporarily, return the error.
	if ( is_wp_error( $file_array['tmp_name'] ) ) {
		return $file_array['tmp_name'];
	}

	// Do the validation and storage stuff.
	$id = media_handle_sideload( $file_array, $post_id, $desc );

	// If error storing permanently, unlink.
	if ( is_wp_error( $id ) ) {
		@unlink( $file_array['tmp_name'] );
		return $id;
	}

	return set_post_thumbnail( $post_id, $id );

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
		false
	);

	// if ( is_wp_error( $user ) ) {
	// 	echo $user->get_error_message();
	// }

	return $user;
}


/**
 * Social-Media Links Generator 2000.
 */
function get_social_links( $args ) {
	$social_media = new SocialMedia();
	return $social_media->get_links( $args );
}
