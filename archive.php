<?php

acf_form_head();
get_header();

$facet = do_shortcode( '[facetwp template="archive_' . get_post_type() . '"]' );

$section = array(
	'title' => array(
		'post' => get_the_title( get_option('page_for_posts', true) ),
		'talent' => post_type_archive_title( '', false ),
		'tribe_events' => get_the_title( get_page_template_id( 'archive-events' )[0]->ID ),
		'resources' => post_type_archive_title( '', false ),
		'page' => get_the_title(),
	)[ get_post_type() ],
	'color' => array(
		'post' => 'bg-blue',
		'talent' => 'bg-yellow',
		'tribe_events' => 'bg-purple',
		'resources' => 'bg-red',
		'page' => 'bg-purple',
	)[ get_post_type() ],
);

$slider = array(
	'slides'     => get_posts(array(
		'post_type'      => get_post_type(),
		'posts_per_page' => '5',
	)),
	'config'     => 'featured',
	'component'  => 'template-parts/base/slider-slide-post',
	'pagination' => true,
);

var_dump(get_post_type());

?>

<?php get_template_part( 'template-parts/blocks/acf-flexible-content/content' ); ?>
<main class="container flex-grow">
	<article class="grid gap-12 px-8 py-12">

	

		<nav class="grid-layout grid-cols-10 gap-8 text-center">
			<div class="flex flex-col gap-8 col-span-full lg:col-start-2 lg:col-span-8">
				<p class="text-xl lg:text-3xl font-light">Filter and customize your search</p>
				<?php echo wp_kses_post( do_shortcode( '[facetwp facet="archive_' . get_post_type() . '"]' ) ); ?>
			</div>
		</nav>

		<?php if ( $facet ) : ?>
			<?php echo wp_kses_post( $facet ); ?>

		<?php /* elseif ( get_post_type() === 'tribe_events' ) : */ ?>

		<?php else : ?>
			<section class="">
				<ul class="grid-layout <?php echo esc_attr( get_post_type() === 'resources' ? 'grid-cols-1 gap-8 lg:gap-16' : 'md:grid-cols-2 lg:grid-cols-3'); ?>">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<?php

						$is_event_upcoming = function () {
							$date = date( 'Y-m-d' );
							$date_start = tribe_get_start_date( null, false, 'Y-m-d' );
							$date_end = tribe_get_end_date( null, false, 'Y-m-d' );

							return DateTime::createFromFormat( 'Y-m-d', $date_end ?: $date_start ) > DateTime::createFromFormat( 'Y-m-d', $date );
						};

						$card = array(
							'theme' => get_post_type() === 'tribe_events'
								? ( $is_event_upcoming() ? '' : 'text-white bg-black' )
								: ( '' ),
						);

						?>

						<li class="">
							<?php set_query_var( 'card', $card ); ?>
							<?php get_template_part( in_array( get_post_type(), array( 'resources', 'af_entry' ) ) ? 'template-parts/base/card-' . get_post_type() : 'template-parts/base/card' ); ?>
						</li>

					<?php endwhile ?>
				</ul>
			</section>

		<?php endif; ?>


		<?php get_template_part( 'template-parts/archive/navigation' ); ?>
		<?php /* get_template_part( 'template-parts/forms/index' ); */ ?>

	</article>
</main>


<?php get_footer(); ?>
