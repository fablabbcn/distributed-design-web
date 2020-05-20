<header class="w-full font-oswald uppercase border-b">

	<h1 class="lg:w-3/4 lg:ml-auto p-20 lg:px-40 text-16 lg:text-41 leading-normal lg:border-l">
		<?php echo esc_html( $title ); ?>
	</h1>

	<div class="flex -mx-border">
		<?php if ( 'talent' === get_post_type() ) : ?>
			<?php // echo do_shortcode( '[facetwp facet="categories_talent"]' ); ?>
			<?php echo do_shortcode( '[facetwp facet="categories_talent_fields"]' ); ?>
			<?php echo do_shortcode( '[facetwp facet="categories_talent_techniques"]' ); ?>

		<?php else : ?>
			<?php echo do_shortcode( '[facetwp facet="categories_' . get_post_type() . '"]' ); ?>

		<?php endif; ?>
	</div>

</header>
