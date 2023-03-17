<?php
/**
 * ✅ Template part for Featured Posts layout
 */

$slider = array(
	'slides' => get_sub_field( 'featured_posts' ),
	'component' => 'template-parts/base/slider-slide-talent',
);

?>


<section class="bleed">
	<div class="z-0 relative bg-gray">
		<div class="z-10 absolute inset-0 bg-blue"></div>
		<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-blue via-transparent to-transparent"></div> -->
		<div class="z-30 absolute inset-0 bg-gradient-corner-blue pointer-events-none"></div>
		<div class="z-20 relative bg-black rounded-br-[8rem] overflow-hidden">
			<?php set_query_var( 'slider', $slider ); ?>
			<?php get_template_part( 'template-parts/base/slider' ); ?>
		</div>
	</div>
</section>
