<?php
/**
 * ✅ Template part for Visual Intro layout
 */

$content = get_sub_field( 'content' );
$slider  = array(
	'slides' => get_sub_field( 'slider' )['images'],
	'component' => 'template-parts/base/slider-slide-media',
);

?>


<section class="relative grid grid-cols-1 gap-8 py-8 bg-gray">
	<div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

	<header class="grid grid-cols-5 gap-4">
		<h2 class="col-span-4 text-4xl font-thin"><?php echo esc_html( $content['title'] ); ?></h2>
		<div class="col-span-4 col-start-2 text-xl font-light"><?php echo wp_kses_post( $content['text'] ); ?></div>
	</header>

	<figure class="z-0 relative my-4 rounded-2xl overflow-hidden bg-gray">
		<div class="z-10 absolute inset-0 bg-yellow pointer-events-none"></div>
		<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-yellow via-transparent to-transparent"></div> -->
		<div class="z-30 absolute inset-0 bg-gradient-corner-yellow pointer-events-none"></div>
		<div class="z-20 relative bg-black rounded-tl-[8rem] overflow-hidden">
			<?php set_query_var( 'slider', $slider ); ?>
			<?php get_template_part( 'template-parts/base/slider' ); ?>
		</div>
	</figure>
</section>
