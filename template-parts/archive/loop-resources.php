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
			<div class="bootstrap-wrapper beefup <?php echo $post_type; ?>-item">

				<div class="flex -mx-px hover:bg-lime">

					<div class="flex-0 hidden lg:block <?php echo esc_attr( $cell_classes ); ?>" style="width: 28%;">
						<p><?php echo ++$key; ?></p>
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

				</div>

				<div class="beefup__body border-t">
					<div class="bootstrap-wrapper">
						<div class="row">
							<div class="beefup__left-col" style="background: url('<?php the_field( 'featured_image' ); ?>') center no-repeat; background-size: cover;"></div>
							<div class="beefup__right-col">
								<div class="cf">
									<div class="fl w-100 w-50-ns"><?php the_field( 'content_left' ); ?></div>
									<div class="fl w-100 w-50-ns pl0 pl0-m pl5-ns"><?php the_field( 'content_right' ); ?></div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</article>

	<?php endwhile; ?>
<?php endif; ?>
