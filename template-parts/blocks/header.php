<header class="w-full font-oswald uppercase border-b">

	<h1 class="lg:w-3/4 lg:ml-auto p-20 lg:px-40 text-22 lg:text-41 leading-normal lg:border-l">
		<?php echo esc_html( $title ); ?>
	</h1>

	<div class="-mx-border overflow-x-hidden md:overflow-x-visible -mb-border">
		<?php if ( 'talent' === get_post_type() ) : ?>
			<div class="filters-mobile-only">
				<?php echo do_shortcode( '[facetwp facet="categories_talent_fields_mobile"]' ); ?>
				<?php echo do_shortcode( '[facetwp facet="categories_talent_techniques_mobile"]' ); ?>
			</div>
			<div class="filters-desktop-only">
				<?php echo do_shortcode( '[facetwp facet="categories_talent_fields"]' ); ?>
				<?php echo do_shortcode( '[facetwp facet="categories_talent_techniques"]' ); ?>
			</div>

		<?php else : ?>
			<div class="filters-mobile-only"><?php echo do_shortcode( '[facetwp facet="categories_' . get_post_type() . '_mobile"]' ); ?></div>
			<div class="filters-desktop-only"><?php echo do_shortcode( '[facetwp facet="categories_' . get_post_type() . '"]' ); ?></div>

		<?php endif; ?>
	</div>

</header>
