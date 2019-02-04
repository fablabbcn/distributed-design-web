<?php get_header(); ?>

<article class="info-section">

	<div class="base-col">
		<div class="page-content">
			<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'ddmp' ); ?>
		</div>
	</div>

	<div class="col">
		<header class="heading">
			<h1><?php esc_html_e( 'Error 404', 'ddmp' ); ?></h1>
		</header>
		<p><strong><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ddmp' ); ?></strong></p>
	</div>

</article>

<?php get_footer(); ?>
