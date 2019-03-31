<?php

$social_networks = array( 'facebook', 'twitter', 'pinterest' );
$social_links    = get_social_links(
	array(
		'url'      => get_the_permalink(),
		'title'    => get_the_title(),
		'desc'     => get_the_excerpt(),
		'hashtags' => 'ddmp',
	)
);

$classes = array(
	'dl' => array( 'flex flex-col justify-center items-center' ),
	'dt' => array( 'font-oswald font-normal uppercase' ),
	'dd' => array( 'mt-10' ),
);

?>


<aside class="fl single_third-column text-center">

	<nav>
		<a class="flex justify-center items-center no-underline" href="<?php echo esc_url( get_post_type_archive_link( $post_type ) ); ?>">
			<svg class="w-15 h-15"><use xlink:href="#chevron-left" /></svg>
			<span class="text-12 font-bold">Back</span>
		</a>
	</nav>

	<hr class="flex my-20 -mx-40 border-t border-current">

	<dl class="<?php echo esc_attr( implode( ' ', array_filter( $classes['dl'] ) ) ); ?>">
		<dt class="<?php echo esc_attr( implode( ' ', array_filter( $classes['dt'] ) ) ); ?>">Share</dt>
		<?php foreach ( $social_networks as $key => $social_network ) : ?>
			<dd class="<?php echo esc_attr( implode( ' ', array_filter( $classes['dd'] ) ) ); ?>">
				<?php echo do_shortcode( '[button_link url="' . $social_links[ $social_network ] . '" icon="' . $social_network . '"]' ); ?>
			</dd>
		<?php endforeach; ?>
	</dl>

</aside>
