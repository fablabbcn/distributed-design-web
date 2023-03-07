<header class="grid grid-cols-5 gap-4 py-4">

	<div class="col-start-3 col-span-3">
		<h1 class="text-2xl leading-tight font-light"><?php echo esc_html( $title ); ?></h1>
	</div>

	<?php /*
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
	*/ ?>

</header>
