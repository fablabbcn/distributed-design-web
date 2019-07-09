<?php

$key = 0;

$tribe_query = tribe_get_events(
	array(
		'posts_per_page' => '-1',
		'order'          => $term->order,
		'start_date'     => $term->start_date,
		'end_date'       => $term->end_date,
	)
);

$cell_classes = 'px-15 lg:px-25 py-20 lg:py-30 text-center uppercase border-black border-r-px border-l-px';
$svg_classes  = 'flex-no-shrink w-15 lg:w-25 h-15 lg:h-25 fill-current';

$get_replaced_content = function ( $field_name ) {
	return str_replace( array( '<p' ), array( '<p class="mb-10"' ), get_field( $field_name ) );
}

?>


<?php foreach ( $tribe_query as $post ) : ?>
	<?php setup_postdata( $post ); ?>
	<?php

	$terms      = get_the_terms( get_the_ID(), $taxonomy );
	$month      = tribe_get_start_date( null, false, 'm' );
	$date       = date( 'F', strtotime( "$month/01/2019" ) );
	$is_current = date( 'F' ) === $date;

	$date_start = tribe_get_start_date( null, false, 'F jS' );
	$date_end   = tribe_get_end_date( null, false, 'F jS' );

	$item_classes = array(
		// $is_current ? '' : 'clip',
		'border-b',
	);

	?>

	<article id="<?php echo esc_attr( $post_type ) . '-event-' . esc_attr( $month ); ?>-<?php the_ID(); ?>"
		class="<?php the_classes( $item_classes ); ?>">
		<div class="beefup <?php echo esc_attr( $post_type ); ?>-item">

			<header class="flex -mx-px hover:bg-magenta">
				<div class="flex-0 <?php echo esc_attr( $cell_classes ); ?>">
					<p><time><?php echo wp_kses_post( tribe_get_start_date( null, false, 'd/m/y' ) ); ?></time></p>
				</div>
				<button class="flex flex-1 items-baseline w-3/5 <?php echo esc_attr( $cell_classes ); ?> beefup__head">
					<p class="mr-auto text-left font-bold truncate"><?php the_title(); ?></p>
					<svg class="<?php echo esc_attr( $svg_classes ); ?>"><use xlink:href="#caret" /></svg>
				</button>
			</header>

			<div class="beefup__body">
				<div class="flex flex-wrap text-15 border-t">
					<div class="w-full sm:w-3/10 border-b sm:border-b-0 sm:border-r">
						<?php echo get_the_post_thumbnail( null, 'post-thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); ?>
					</div>
					<div class="w-full sm:w-7/10">
						<div class="flex flex-wrap">
							<div class="flex w-full font-bold border-b">
								<p class="flex items-center flex-1 py-10 px-30 border-r">
									<time><?php echo wp_kses_post( "$date_start — $date_end" ); ?></time></p>
								<p class="flex items-center flex-0 py-10 px-30">
									<a class="hover:text-magenta text-17 font-oswald uppercase" href="<?php the_permalink(); ?>">Read More</a></p>
							</div>
						</div>
						<div class="flex flex-wrap">
							<div class="w-full md:w-1/2 p-20 sm:px-40"><?php echo wp_kses_post( $get_replaced_content( 'content_left' ) ); ?></div>
							<div class="w-full md:w-1/2 p-20 sm:px-40"><?php echo wp_kses_post( $get_replaced_content( 'content_right' ) ); ?></div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</article>

<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
