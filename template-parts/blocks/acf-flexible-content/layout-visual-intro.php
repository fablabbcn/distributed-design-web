<?php
/**
 * ✅ Template part for Visual Intro layout
 */

$content = get_sub_field( 'content' );
$slider  = array(
	'config' => 'visual',
	'slides' => get_sub_field( 'slider' )['images'],
	'component' => 'template-parts/base/slider-slide-media',
);

?>


<section class="relative grid grid-cols-1 gap-8 py-8 bg-gray">
	<div class="-z-10 absolute inset-0 bleed bg-[inherit]"></div>

	<?php if ( $content['title'] || $content['text'] ) : ?>
		<header class="grid-layout">
			<?php if ( $content['title'] ) : ?>
				<div class="col-span-4 lg:col-start-2 lg:col-end-4">
					<h2 class="text-4xl font-thin"><?php echo esc_html( $content['title'] ); ?></h2>
				</div>
			<?php endif; ?>
			<?php if ( $content['text'] ) : ?>
				<div class="col-span-4 col-start-2 lg:col-start-4 lg:col-end-7">
					<div class="lg:mt-12 text-xl lg:text-3xl font-light"><?php echo wp_kses_post( $content['text'] ); ?></div>
				</div>
			<?php endif; ?>
		</header>
	<?php endif; ?>

	<figure class="z-0 relative rounded-2xl overflow-hidden bg-gray <?php echo esc_attr( $content['title'] || $content['text'] ? 'my-4' : '' ); ?>">
		<div class="z-10 absolute inset-0 bg-yellow pointer-events-none"></div>
		<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-yellow via-transparent to-transparent"></div> -->
		<div class="z-30 absolute inset-0 bg-gradient-corner-yellow pointer-events-none"></div>
		<div class="z-20 relative bg-gray rounded-tl-[8rem] lg:rounded-tl-[16rem] overflow-hidden">
			<?php set_query_var( 'slider', $slider ); ?>
			<?php get_template_part( 'template-parts/base/slider' ); ?>
		</div>
	</figure>
</section>
