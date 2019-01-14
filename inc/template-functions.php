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


// Customize wp pagenavi.
function the_theme_wp_pagenavi( $html ) {
	$out = '';

	$out = str_replace( '<div', '', $html );
	$out = str_replace( 'class="wp-pagenavi">', '', $out );
	$out = str_replace( '<a', '<li><a', $out );
	$out = str_replace( '</a>', '</a></li>', $out );
	$out = str_replace( '<span', '<li><span', $out );
	$out = str_replace( '</span>', '</span></li>', $out );
	$out = str_replace( '</div>', '', $out );

	return ( '
		<nav class="pagination-wrap">
			<ul class="pagination">' . $out . '</ul>
		</nav>
	' );
} add_filter( 'wp_pagenavi', 'the_theme_wp_pagenavi', 10, 2 );


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


// AJAX Create Share.
add_filter( 'wp_ajax_nopriv_post_share', 'post_share' );
add_filter( 'wp_ajax_post_share', 'post_share' );

function post_share() {
	// var_dump( $_POST );

	$ajax_post  = $_POST['post'];
	$array_keys = array_keys( $ajax_post );
	$post_type  = explode( '-', $array_keys[0] )[0];

	/**
	 * Build the post array
	 */
	switch ( $post_type ) {
		case 'post':
			$post_array = array(
				'post_title' => $ajax_post[ "$post_type-headline" ],
				'meta_input' => array(
					'headline'     => $ajax_post[ "$post_type-headline" ],
					'organization' => $ajax_post[ "$post_type-organization" ],
					'date'         => $ajax_post[ "$post_type-date" ],
					'link'         => $ajax_post[ "$post_type-link" ],
				),
			);

			break;

		case 'talent':
			$post_array = array(
				'post_title' => $ajax_post['talent-name'],
				'meta_input' => array(
					'winner_title'        => $ajax_post[ "$post_type-title" ],
					'winner_name'         => $ajax_post[ "$post_type-name" ],
					'winner_profession'   => $ajax_post[ "$post_type-profession" ],
					'winner_organization' => $ajax_post[ "$post_type-organization" ],
					'project_name'        => $ajax_post[ "$post_type-project-name" ],
					'project_link'        => $ajax_post[ "$post_type-link" ],
				),
			);

			break;

		case 'tribe_events':
			$post_array = array(
				'post_title' => $ajax_post[ "$post_type-name" ],
				'meta_input' => array(
					'winner_title'        => $ajax_post[ "$post_type-title" ],
					'winner_name'         => $ajax_post[ "$post_type-name" ],
					'winner_profession'   => $ajax_post[ "$post_type-profession" ],
					'winner_organization' => $ajax_post[ "$post_type-organization" ],
					'project_name'        => $ajax_post[ "$post_type-project-name" ],
					'project_link'        => $ajax_post[ "$post_type-link" ],
				),
			);

			break;

	}

	$post_array['post_type']   = $post_type;
	$post_array['post_author'] = 2; // llos
	$post_array['post_status'] = 'publish';

	$post_array['meta_input']['article_content'] = $ajax_post[ "$post_type-about" ];
	// $post_array['meta_input']['article_images']  = $ajax_post[ "$post_type-head-photo" ];
	// $post_array['meta_input']['article_images']  = $ajax_post[ "$post_type-article-photos" ];

	/**
	 * Upload images to the site
	 */
	// $upload_dir  = wp_upload_dir();
	// $upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	// $img = str_replace( 'data:image/png;base64,', '', $thumbnail );
	// $img = str_replace( ' ', '+', $img );

	// $decoded         = base64_decode( $img );
	// $filename        = 'textshot.png';
	// $hashed_filename = md5( $filename . microtime() ) . '_' . $filename;
	// $image_upload    = file_put_contents( $upload_path . $hashed_filename, $decoded );

	// /* Handle uploaded file */
	// if ( ! function_exists( 'wp_handle_sideload' ) ) {
	// 	require_once( ABSPATH . 'wp-admin/includes/file.php' ); }
	// /* Without that I'm getting a debug error!? */
	// if ( ! function_exists( 'wp_get_current_user' ) ) {
	// 	require_once( ABSPATH . 'wp-includes/pluggable.php' ); }

	// $file             = array();
	// $file['error']    = '';
	// $file['tmp_name'] = $upload_path . $hashed_filename;
	// $file['name']     = $hashed_filename;
	// $file['type']     = 'image/png';
	// $file['size']     = filesize( $upload_path . $hashed_filename );

	// // upload file to server
	// $file_return = wp_handle_sideload( $file, array( 'test_form' => false ) );

	// $filename   = $file_return['file'];
	// $attachment = array(
	// 	'post_mime_type' => $file_return['type'],
	// 	'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
	// 	'post_content'   => '',
	// 	'post_status'    => 'inherit',
	// 	'guid'           => $upload_dir['url'] . '/' . basename( $filename ),
	// );

	// require_once( ABSPATH . 'wp-admin/includes/image.php' );

	// // Insert the image into the media library
	// $attach_id   = wp_insert_attachment( $attachment, $filename, 289 );
	// $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
	// wp_update_attachment_metadata( $attach_id, $attach_data );

	// Insert the post into the database
	$post_id = wp_insert_post( $post_array );

	if ( $post_id ) {
		// add_post_meta( $post_id, 'text', $ajax_post['title'] );
		// add_post_meta( $post_id, 'image_ID', $attach_id );
		// add_post_meta( $post_id, '_thumbnail_id', $attach_id );

		// Return post info
		wp_send_json(array(
			'ajax' => $ajax_post,
			'id'   => $post_id,
			'post' => $post_array,
			// 'post_url'   => get_permalink( $post_id ),
			// 'post_title' => get_the_title( $post_id ),
			// 'image_url'  => get_the_post_thumbnail_url( $post_id, 'full' ),
		));
	}

	die();

}
