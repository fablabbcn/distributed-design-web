<?php
/**
 * ✅ Template part for Visual Intro layout
 */

$content = get_sub_field( 'content' );
$styles  = get_sub_field( 'slider' )['styles'];
$color   = get_sub_field( 'slider' )['styles']['bg_color'];
$corner  = get_sub_field( 'slider' )['styles']['corner'];

$slider  = array(
	'config'    => 'visual',
	'slides'    => get_sub_field( 'slider' )['images'],
	'component' => 'template-parts/base/slider-slide-media',
	'isRounded' => false,
	'className' => array(
		'slide' => 'aspect-w-4 aspect-h-3'
	),
);

$className = array(
	'corner' => array(
		'tl' => 'rounded-tl-[8rem] lg:rounded-tl-[16rem]',
		'tr' => 'rounded-tr-[8rem] lg:rounded-tr-[16rem]',
		'br' => 'rounded-br-[8rem] lg:rounded-br-[16rem]',
		'bl' => 'rounded-bl-[8rem] lg:rounded-bl-[16rem]',
	),
);

?>


<section class="relative grid grid-cols-1 gap-8 py-8">

	<?php if ( $content['title'] || $content['text'] ) : ?>
		<header class="grid-layout">
			<?php if ( $content['title'] ) : ?>
				<div class="col-span-4 lg:col-start-2 lg:col-end-4">
					<h2 class="text-4xl font-extralight"><?php echo esc_html( $content['title'] ); ?></h2>
				</div>
			<?php endif; ?>
			<?php if ( $content['text'] ) : ?>
				<div class="col-span-4 col-start-2 lg:col-start-4 lg:col-end-7">
					<div class="lg:mt-12 text-xl lg:text-3xl font-light"><?php echo wp_kses_post( $content['text'] ); ?></div>
				</div>
			<?php endif; ?>
		</header>
	<?php endif; ?>

	<figure class="z-0 relative lg:bleed rounded-2xl lg:rounded-none overflow-hidden bg-gray <?php echo esc_attr( $content['title'] || $content['text'] ? 'my-4' : '' ); ?>">
		<div class="z-10 absolute inset-0 <?php echo esc_attr( $color ?: 'bg-yellow' ); ?> pointer-events-none"></div>
		<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-yellow via-transparent to-transparent"></div> -->
		<div class="z-30 absolute inset-0 bg-gradient-<?php echo esc_attr( $corner ?: 'tl' ); ?>-<?php echo esc_attr( str_replace( 'bg-', '', $color ) ?: 'yellow' ); ?> pointer-events-none"></div>
		<div class="z-20 relative bg-gray <?php echo esc_attr( $className['corner'][$corner ?: 'tl'] ); ?> overflow-hidden">
			<?php set_query_var( 'slider', $slider ); ?>
			<?php get_template_part( 'template-parts/base/slider' ); ?>
		</div>
	</figure>

</section>
