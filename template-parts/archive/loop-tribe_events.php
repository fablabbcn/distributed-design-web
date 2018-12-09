<?php

$key = 0;

$posts_given_term = new WP_Query( array(
	'post_type'      => 'tribe_events',
	'posts_per_page' => '-1',
	'order'          => 'ASC',
	// 'year'           => 2018,
	// 'tax_query'      => array(
	// 	array(
	// 		'taxonomy' => $taxonomy,
	// 		'field'    => 'slug',
	// 		'terms'    => $term,
	// 	),
	// ),
) );

$tribe_query = tribe_get_events( array(
	'posts_per_page' => '-1',
	'order'          => 'ASC',

	'eventDisplay'   => 'custom',
	'start_date'     => '2018-01-01',
	'end_date'       => '2018-12-31',
) );

// var_dump( $posts_given_term->posts );
// var_dump( $tribe_query );
// var_dump( $post_type, $taxonomy, $term );

?>


<?php foreach ( $tribe_query as $post ) : ?>
	<?php setup_postdata( $post ); ?>
	<?php

	$terms     = get_the_terms( get_the_ID(), $taxonomy );
	// $cat_slugs = array_map( function ( $term ) {
	// 	return $term->slug;
	// }, $terms );

	// var_dump( $terms, $taxonomy );

	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'border-b' ); ?>>
		<div class="beefup <?php echo $post_type; ?>-item">

			<header class="flex hover:bg-magenta text-24">
				<div class="flex-no-shrink p-40 text-center" style="width: 28.45%;">
					<p><time><?php echo tribe_get_start_date( null, false, 'd/m/y' ); ?></time></p>
				</div>
				<button class="flex-grow p-40 text-left border-l beefup__head">
					<p class="font-bold"><?php the_title(); ?></p>
					<span class="arrow-down"><?php include get_template_directory() . '/assets/images/caret.svg'; ?></span>
				</button>
			</header>

			<div class="beefup__body flex text-15 border-t">
				<div class="flex w-full">

					<figure class="flex-no-shrink" style="width: 28.45%;">
						<?php echo get_the_post_thumbnail( null, 'post-thumbnail', array( 'class' => 'w-full h-full object-cover' ) ); ?>
					</figure>

					<div class="flex-grow border-l">

						<section class="flex font-bold border-b">
							<p class="flex-1 py-10 px-30 border-r">
								<time><?php echo tribe_get_start_date( null, false, 'F jS' ); ?></time>
								<span> — </span>
								<time><?php echo tribe_get_end_date( null, false, 'F jS' ); ?></time>
							</p>
							<p class="flex-0 py-10 px-30">
								<a class="hover:text-magenta text-17 font-oswald uppercase" href="<?php the_permalink(); ?>">Read More</a>
							</p>
						</section>

						<section class="flex flex-col md:flex-row -mx-15 px-30 py-20">
							<div class="w-full px-15"><?php echo str_replace( array( '<p' ), array( '<p class="mb-10"' ), get_field( 'content_left' ) ); ?></div>
							<div class="w-full px-15"><?php echo str_replace( array( '<p' ), array( '<p class="mb-10"' ), get_field( 'content_right' ) ); ?></div>
						</section>

					</div>

				</div>
			</div>

		</div>
	</article>

<?php endforeach; ?>
<?php wp_reset_postdata(); ?>
