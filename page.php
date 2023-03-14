<?php
/**
 * The template for displaying all pages
 */

get_header();

$flexible_content = get_field( 'flexible_content' ) ?: array();
$featured_posts = array_filter( $flexible_content, function ( $item ) {
	return $item['acf_fc_layout'] === 'posts_slider';
} );

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
		<?php /* set_query_var( 'title', get_the_title() ); */ ?>
		<?php /* get_template_part( 'template-parts/blocks/header' ); */ ?>

		<header class="grid grid-cols-5 gap-4 py-4">
			<div class="col-start-3 col-span-3">
				<h1 class="text-2xl leading-tight font-light"><?php the_title(); ?></h1>
			</div>
		</header>

		<section class="bleed">
			<div class="z-0 relative bg-gray">
				<div class="z-10 absolute inset-0 bg-blue"></div>
				<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-blue via-transparent to-transparent"></div> -->
				<div class="z-30 absolute inset-0 bg-gradient-corner-blue pointer-events-none"></div>
				<div class="z-20 relative bg-black rounded-br-[8rem] overflow-hidden">
					<?php set_query_var( 'slider', array( 'slides' => $featured_posts[0]['featured_posts'], 'component' => 'template-parts/base/slider-slide-talent' ) ); ?>
					<?php get_template_part( 'template-parts/base/slider' ); ?>
				</div>
			</div>
		</section>

		<aside class="relative grid grid-cols-5 gap-4 py-4 text-white bg-indigo">
			<div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

			<div class="col-span-full py-8">
				<p class="flex flex-col text-3xl leading-tight font-thin">
					<span class="mx-auto">Supporting emerging 🔼 creatives</span>
					<span class="mr-auto">that work on alternatives ➡️</span>
					<span class="ml-auto">to 🏭 mass production</span>
				</p>
			</div>
		</aside>

		<section class="relative grid grid-cols-1 gap-8 py-8 bg-gray">
			<div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

			<header class="grid grid-cols-5 gap-4">
				<h2 class="col-span-4 text-4xl font-thin">What is Distributed&nbsp;Design?</h2>
				<p class="col-span-4 col-start-2 text-xl font-light">The Distributed Design Platform acts as an exchange and networking hub for the european maker movement. The initiative aims at developing and promoting the connection between designers, makers and the market.</p>
			</header>

			<figure class="z-0 relative my-4 rounded-2xl overflow-hidden bg-gray">
				<div class="z-10 absolute inset-0 bg-yellow"></div>
				<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-yellow via-transparent to-transparent"></div> -->
				<div class="z-30 absolute inset-0 bg-gradient-corner-yellow"></div>
				<div class="z-20 relative aspect-[4/3] bg-black rounded-tl-[8rem]"></div>
			</figure>

			<section class="grid gap-6">
				<header>
					<h3 class="text-xl font-light">Statistics</h3>
				</header>
				<div class="-space-y-px">
					<?php set_query_var( 'list', array( 'title' => '13 Countries', 'items' => array( 'Austria', 'Denmark', 'France', 'Greece', 'Germany', 'Hungary', 'Iceland', 'Italy', 'Netherlands', 'Portugal', 'Spain', 'Slovenia', 'United Kingdom' ) ) ); ?>
					<?php get_template_part( 'template-parts/base/list-stats' ); ?>

					<?php set_query_var( 'list', array( 'title' => '20 Members', 'items' => array( 'IAAC', 'Fab Lab Barcelona', 'Pakhuis de Zwijger', 'P2P Lab', 'Re:Publica', 'Happy Lab Vienna', 'Danish Design Centre' ), 'button' => array( 'label' => 'See more' ) ) ); ?>
					<?php get_template_part( 'template-parts/base/list-stats' ); ?>

					<?php set_query_var( 'list', array( 'title' => '2609 Talents', 'button' => array( 'label' => 'Check our talents' ) ) ); ?>
					<?php get_template_part( 'template-parts/base/list-stats' ); ?>

				</div>
			</section>
		</section>

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


		<?php

		// if ( have_posts() ) {
		// 	while ( have_posts() ) {
		// 		the_post();
		// 		get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' );
		// 	}
		// } else {
		// 	get_template_part( 'template-parts/post/content', 'none' );
		// };

		?>

	</article>

</main>


<?php get_footer(); ?>
