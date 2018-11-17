<?php get_header(); ?>

<article class="info-section">
	<div class="base-col">
		<div class="page-content">
			<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'ddmp' ); ?>
		</div>
	</div><!-- / base-col -->
	<div class="col">
		<header class="heading">
			<h1><?php _e( 'Error 404', 'ddmp'); ?></h1>
		</header>
		<p><strong><?php _e( 'Oops! That page can&rsquo;t be found.', 'ddmp'); ?></strong></p>
	</div><!-- / col -->
</article>
<?php get_footer();

