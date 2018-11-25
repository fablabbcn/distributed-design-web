<?php

$key = 0;

$posts_give_term = new WP_Query( array(
	'post_type'      => 'resources',
	'posts_per_page' => '-1',
	'order'          => 'ASC',
	'tax_query'      => array(
		array(
			'taxonomy' => 'resources_category',
			'field'    => 'slug',
			'terms'    => $term,
		),
	),
) );

?>


<?php if ( $posts_give_term->have_posts() ) : ?>
<?php while ( $posts_give_term->have_posts() ) : ?>
	<?php $posts_give_term->the_post(); ?>
	<?php

	$terms     = get_the_terms( get_the_ID(), 'resources_category' );
	$cat_slugs = array_map( function ( $term ) {
		return $term->slug;
	}, $terms );

	?>

	<article data-cat="<?php echo esc_attr( implode( ', ', $cat_slugs ) ); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="resources-item">
			<div class="bootstrap-wrapper beefup">

				<div class="row">
					<div class="number-column tc">
						<p><?php echo ++$key; ?></p>
					</div>
					<div class="title-column tl ttu fw6 beefup__head">
						<p><?php the_title(); ?></p>
						<span class="arrow-down"><?php include get_template_directory() . '/assets/images/caret.svg'; ?></span>
					</div>
					<div class="weight-column col-1 tc">
						<p><?php the_field( 'file_weight' ); ?></p>
					</div>
					<a href="<?php the_field( 'file_url' ); ?>" class="download-column col-1 tc"></a>
				</div>

				<div class="beefup__body">
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
		</div>
	</article>

<?php endwhile; ?>
<?php endif; ?>
