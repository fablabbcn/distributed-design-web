<?php

// register tag [template-url]
function filter_template_url( $text ) {
	return str_replace( '[template-url]', get_template_directory_uri(), $text );
}
add_filter( 'the_content', 'filter_template_url' );
add_filter( 'get_the_content', 'filter_template_url' );
add_filter( 'widget_text', 'filter_template_url' );

// register tag [site-url]
function filter_site_url( $text ) {
	return str_replace( '[site-url]', home_url(), $text );
}
add_filter( 'the_content', 'filter_site_url' );
add_filter( 'get_the_content', 'filter_site_url' );
add_filter( 'widget_text', 'filter_site_url' );


// Round Button.
if ( ! function_exists( 'ddmp_shortcode_button_link' ) ) {
	function ddmp_shortcode_button_link( $attrs, $content = null ) {
		$code_url        = array_key_exists( 'url', $attrs ) ? $attrs['url'] : ( array_key_exists( 'href', $attrs ) ? $attrs['href'] : '' );
		$parsed_site_url = array_key_exists( 'host', wp_parse_url( site_url() ) ) ? wp_parse_url( site_url() )['host'] : '';
		$parsed_code_url = array_key_exists( 'host', wp_parse_url( $code_url ) ) ? wp_parse_url( $code_url )['host'] : '__';
		$is_external     = $parsed_site_url !== $parsed_code_url;

		$classes = array(
			array_key_exists( 'class', $attrs ) ? $attrs['class'] : false,
			'flex justify-center items-center',
			array_key_exists( 'icon', $attrs ) && $attrs['icon'] ? 'w-50 h-50' : false,
			'p-10 bg-white hocus:text-black hocus:bg-primary text-center no-underline border rounded-full overflow-hidden',
		);

		$link_attrs = array(
			'class'  => 'class="' . get_the_classes( $classes ) . '"',
			'href'   => 'href="' . ( $attrs['url'] ?: $attrs['href'] ) . '"',
			'target' => 'target="' . ( $is_external ? '_blank' : '_self' ) . '"',
		);

		return ( array_key_exists( 'icon', $attrs ) && $attrs['icon'] ) || $content ? (
			"<a {$link_attrs['class']} {$link_attrs['href']} {$link_attrs['target']}>" .
				( array_key_exists( 'icon', $attrs ) && $attrs['icon']
					? ( '<svg class="fill-current"><use xlink:href="#social-' . $attrs['icon'] . '" /></svg>' )
					: ( '<span>' . $content ?: $attrs['label'] . '</span>' )
				) .
			'</a>'
		) : false;
	} add_shortcode( 'button_link', 'ddmp_shortcode_button_link' );
}


// Round Button.
if ( ! function_exists( 'ddmp_shortcode_modal' ) ) {
	function ddmp_shortcode_modal( $attrs, $content = null ) {
		$post_id = array_key_exists( 'id', $attrs ) ? $attrs['id'] : ( $content ?: false );
		$classes = 'p-10 lg:p-20 text-white hocus:text-black bg-black hocus:bg-primary font-oswald font-medium uppercase border border-black';

		set_query_var( 'this_post', $post_id );
		get_template_part( 'template-parts/blocks/modal-newsletter' );

		return "<p><button data-clip=\"modal-resources-$post_id\" class=\"$classes\">$content</button></p>";
	} add_shortcode( 'modal_toggle', 'ddmp_shortcode_modal' );
}
