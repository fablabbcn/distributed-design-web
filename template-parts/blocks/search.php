<div class="px-15 lg:px-40 py-20 bg-gray border-b <?php echo esc_attr( $post_type ); ?>-search">
	<div class="flex items-center">
		<span class="search-icon"><?php require get_template_directory() . '/assets/images/search.svg'; ?></span>
		<?php get_search_form(); ?>
	</div>
</div>
