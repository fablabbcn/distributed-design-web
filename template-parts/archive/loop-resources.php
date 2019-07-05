<?php

$key = 0;

$posts_given_term = new WP_Query(
	array(
		'post_type'      => $post_type,
		'posts_per_page' => '-1',
		'order'          => 'ASC',
		'tax_query'      => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'slug',
				'terms'    => $term,
			),
		),
	)
);

$cell_classes = 'px-15 lg:px-25 py-20 lg:py-30 text-center uppercase border-black border-r-px border-l-px';
$svg_classes  = 'flex-no-shrink w-15 lg:w-25 h-15 lg:h-25 fill-current';

?>


<?php if ( $posts_given_term->have_posts() ) : ?>
	<?php while ( $posts_given_term->have_posts() ) : ?>
		<?php
		$posts_given_term->the_post();

		$terms     = get_the_terms( get_the_ID(), $taxonomy );
		$cat_slugs = array_map(
			function ( $term ) {
				return $term->slug;
			},
			$terms
		);

		?>

		<article data-cat="<?php echo esc_attr( implode( ', ', $cat_slugs ) ); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="bootstrap-wrapper beefup <?php echo esc_attr( $post_type ); ?>-item">

				<header class="flex -mx-px hover:bg-lime">

					<div class="flex-0 hidden lg:block <?php echo esc_attr( $cell_classes ); ?>">
						<p><?php echo wp_kses_post( ++$key ); ?></p>
					</div>

					<button class="flex flex-1 items-baseline w-3/5 <?php echo esc_attr( $cell_classes ); ?> beefup__head">
						<p class="mr-auto text-left font-bold truncate"><?php the_title(); ?></p>
						<svg class="<?php echo esc_attr( $svg_classes ); ?>"><use xlink:href="#caret" /></svg>
					</button>

					<div class="w-1/5 lg:w-1/10 <?php echo esc_attr( $cell_classes ); ?>">
						<p><?php the_field( 'file_weight' ); ?></p>
					</div>

					<a class="w-1/5 lg:w-1/10 <?php echo esc_attr( $cell_classes ); ?>" href="<?php the_field( 'file_url' ); ?>">
						<span class="clip">Download</span>
						<svg class="<?php echo esc_attr( $svg_classes ); ?>"><use xlink:href="#download" /></svg>
					</a>

				</header>

				<div class="beefup__body">
					<div class="flex flex-wrap border-t">
						<div class="w-full sm:w-3/10 border-b sm:border-b-0 sm:border-r">
							<img class="w-full h-full object-cover" src="<?php the_field( 'featured_image' ); ?>" alt="">
						</div>
						<div class="w-full sm:w-7/10">
							<div class="flex flex-wrap">
								<div class="w-full md:w-1/2 p-20 sm:px-40"><?php the_field( 'content_left' ); ?></div>
								<div class="w-full md:w-1/2 p-20 sm:px-40"><?php the_field( 'content_right' ); ?></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</article>

	<?php endwhile; ?>
<?php endif; ?>
