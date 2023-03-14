<?php

acf_form_head();
get_header();

$section = array(
	'title' => array(
		'post' => get_the_title( get_option('page_for_posts', true) ),
		'talent' => post_type_archive_title( '', false ),
		'tribe_events' => get_the_title(),
		'resources' => post_type_archive_title( '', false ),
		'page' => get_the_title(),
	)[ get_post_type() ],
	'facet' => do_shortcode( '[facetwp template="archive_' . get_post_type() . '"]' ),
	'color' => array(
		'post' => 'bg-blue',
		'talent' => 'bg-yellow',
		'tribe_events' => 'bg-purple',
		'resources' => 'bg-red',
		'page' => 'bg-purple',
	)[ get_post_type() ],
	'posts' => get_posts(
		array(
			'post_type'      => get_post_type(),
			'posts_per_page' => '5',
		),
	),
);

?>


<main class="flex-grow">
	<article class="grid gap-12 px-8 py-12">

		<?php set_query_var( 'title', $section['title'] ); ?>
		<?php get_template_part( 'template-parts/page/header' ); ?>

		<nav class="bleed">
			<div class="z-0 relative bg-gray">
				<div class="z-10 absolute inset-0 <?php echo $section['color']; ?>"></div>
				<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-blue via-transparent to-transparent"></div> -->
				<div class="z-30 absolute inset-0 bg-gradient-corner-blue pointer-events-none"></div>
				<div class="z-20 relative bg-black rounded-br-[8rem] overflow-hidden">
					<?php set_query_var( 'slider', array( 'slides' => $section['posts'], 'component' => 'template-parts/base/slider-slide-talent' ) ); ?>
					<?php get_template_part( 'template-parts/base/slider' ); ?>
				</div>
			</div>
		</nav>

		<nav class="grid gap-8 text-center">
			<p class="text-xl font-light">Filter and customize your search</p>
			<?php echo wp_kses_post( do_shortcode( '[facetwp facet="archive_post"]' ) ); ?>
		</nav>

		<?php if ( $section['facet'] ) : ?>
			<?php echo wp_kses_post( $section['facet'] ); ?>

		<?php else : ?>
			<section class="">
				<ul class="grid gap-4">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<li class=""><?php get_template_part( 'template-parts/base/card' ); ?></li>
					<?php endwhile ?>
				</ul>
			</section>

		<?php endif; ?>


		<?php get_template_part( 'template-parts/archive/navigation' ); ?>
		<?php /* get_template_part( 'template-parts/forms/index' ); */ ?>

	</article>
</main>


<?php get_footer(); ?>
