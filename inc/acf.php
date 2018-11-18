<?php


// Register options page.
// if ( function_exists( 'acf_add_options_page' ) ) {
// 	acf_add_options_page();
// }


// Set a new location to save ACF field group JSON.
if ( ! function_exists( 'llos_acf_json_save_point' ) ) {
	add_filter( 'acf/settings/save_json', 'llos_acf_json_save_point' );

	function llos_acf_json_save_point( $path ) {
		$path = get_stylesheet_directory() . '/inc/acf-json';
		return $path;
	}
}


// Adds a folder to the ACF JSON load list.
if ( ! function_exists( 'llos_acf_json_load_point' ) ) {
	add_filter( 'acf/settings/load_json', 'llos_acf_json_load_point' );

	function llos_acf_json_load_point( $paths ) {
		unset( $paths[0] );
		$paths[] = get_stylesheet_directory() . '/inc/acf-json';
		return $paths;
	}
}


// Nullify ACF empty values for the WP_API.
if ( ! function_exists( 'llos_nullify_empty' ) ) {
	add_filter( 'acf/format_value/type=image', 'llos_nullify_empty', 100, 3 );
	add_filter( 'acf/format_value/type=relationship', 'llos_nullify_empty', 100, 3 );
	add_filter( 'acf/format_value/type=gallery', 'llos_nullify_empty', 100, 3 );
	add_filter( 'acf/format_value/type=repeater', 'llos_nullify_empty', 100, 3 );

	function llos_nullify_empty( $value, $post_id, $field ) {
		return empty( $value ) ? null : $value;
	}
}
