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
		$classes = array(
			'relative flex justify-center',
			$attrs['icon'] ? 'w-50 h-50' : '',
			'p-10 bg-white text-center no-underline border rounded-full',
		);

		return $attrs['icon'] || $content ? (
			'<a class="' . implode( ' ', $classes ) . '" href="' . esc_attr( $attrs['url'] ?: $attrs['href'] ) . '">' .
				( $attrs['icon']
					? ( '<svg class="fill-current"><use xlink:href="#social-' . esc_attr( $attrs['icon'] ) . '" /></svg>' )
					: ( '<span>' . wp_kses_post( $content ) . '</span>' )
				) .
			'</a>'
		) : false;
	} add_shortcode( 'button_link', 'ddmp_shortcode_button_link' );
}
