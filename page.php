<?php
/**
 * The template for displaying all pages
 */

get_header();


$section_talent = array(
	'posts' => get_posts(
		array(
			'post_type'      => 'talent',
			'posts_per_page' => '3',
		),
	),
);

$section_blog = array(
	'posts' => new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => '3',
		),
	),
);

$section_events = array(
	'posts' => new WP_Query(
		array(
			'suppress_filters' => true,
			'post_type'        => 'tribe_events',
			'posts_per_page'   => 2,
			'order'            => 'DESC',
			'orderby'          => 'meta_value',
			'meta_key'         => '_EventStartDate',
			'meta_query'       => array(
				array(
					'key'     => '_EventEndDate',
					'value'   => date('Y-m-d'),
					'compare' => false ? '<=' : '>=',
					'type'    => 'NUMERIC,'
				)
			),
		)
	),
);

?>


<main class="flex-grow">

	<article class="grid gap-4 p-8">
		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( is_front_page() ? 'template-parts/blocks/header' : 'template-parts/page/header' ); ?>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php
				the_post();
				get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' );
				?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/post/content', 'none' ); ?>
		<?php endif; ?>

		<?php if ( is_front_page() ) : ?>
			<section class="relative grid grid-cols-1 gap-8 py-8 bg-white">
				<div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

				<header class="text-center">
					<h2 class="text-4xl font-thin">Stay updated!</h2>
				</header>

				<section class="grid gap-6">
					<header>
						<h3 class="text-xl font-light">Featured talents</h3>
					</header>
					<div class="grid rounded-2xl overflow-hidden">
						<?php set_query_var( 'slider', array( 'slides' => $section_talent['posts'], 'component' => 'template-parts/base/slider-slide-talent' ) ); ?>
						<?php get_template_part( 'template-parts/base/slider' ); ?>
					</div>
					<footer class="text-center">
						<?php set_query_var( 'button', array( 'label' => 'See all talents' ) ); ?>
						<?php get_template_part( 'template-parts/base/button' ); ?>
					</footer>
				</section>

				<section class="grid gap-6">
					<header>
						<h3 class="text-xl font-light">Latest blogposts</h3>
					</header>
					<div class="grid grid-cols-1 gap-4">
						<?php
							if( $section_blog['posts']->have_posts() ):
								while( $section_blog['posts']->have_posts() ): $section_blog['posts']->the_post();
									get_template_part( 'template-parts/base/card-post' );
								endwhile;
							endif;
						?>
					</div>
					<footer class="text-center">
						<?php set_query_var( 'button', array( 'label' => 'See all posts' ) ); ?>
						<?php get_template_part( 'template-parts/base/button' ); ?>
					</footer>
				</section>

				<section class="grid gap-6">
					<header>
						<h3 class="text-xl font-light">Upcoming events</h3>
					</header>
					<div class="grid grid-cols-2 gap-4">
						<?php
							if( $section_events['posts']->have_posts() ):
								while( $section_events['posts']->have_posts() ): $section_events['posts']->the_post();
									get_template_part( 'template-parts/base/card-event' );
								endwhile;
							endif;
						?>
					</div>
					<footer class="text-center">
						<?php set_query_var( 'button', array( 'label' => 'See all events' ) ); ?>
						<?php get_template_part( 'template-parts/base/button' ); ?>
					</footer>
				</section>
			</section>
		<?php endif; ?>

	</article>

</main>


<?php get_footer(); ?>
