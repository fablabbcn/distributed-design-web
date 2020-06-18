<?php

$back_url = 'post' === get_post_type()
	? get_permalink( get_option( 'page_for_posts' ) )
	: ( 'tribe_events' === $post_type
		? get_permalink( get_page_template_id( 'archive-events' )[0] )
		: get_post_type_archive_link( $post_type )
	);

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
	'dl' => array( 'flex lg:flex-col lg:justify-center items-center' ),
	'dt' => array( 'mr-10 lg:mr-0 font-oswald font-normal uppercase' ),
	'dd' => array( 'm-5 lg:m-0 lg:mt-10' ),
);

?>


<aside class="text-center">

	<nav class="lg:-mt-15">
		<a class="flex justify-center items-center no-underline" href="<?php echo esc_url( $back_url ); ?>">
			<svg class="w-15 h-15"><use xlink:href="#chevron-left" /></svg>
			<span class="text-12 font-bold">Back</span>
		</a>
	</nav>

	<hr class="flex my-20 -mx-20 lg:-mx-40 border-t border-black">

	<dl class="<?php the_classes( $classes['dl'] ); ?>">
		<dt class="<?php the_classes( $classes['dt'] ); ?>">Share</dt>
		<?php foreach ( $social_networks as $key => $social_network ) : ?>
			<dd class="<?php the_classes( $classes['dd'] ); ?>">
				<?php echo do_shortcode( '[button_link url="' . $social_links[ $social_network ] . '" icon="' . $social_network . '"]' ); ?>
			</dd>
		<?php endforeach; ?>
	</dl>

</aside>
