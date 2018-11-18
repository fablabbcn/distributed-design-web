<?php get_header(); ?>

<article class="stickit">

	<div class="base-col">
		<header class="resources-header">
			<div class="bootstrap-wrapper">
				<div class="row resources-filter">
					<div class="col-12 tl today-date">
						<h1 class="ph3 ttu">Latest news of Distributed Design</h1>
					</div>
				</div>
			</div>
		</header>
		<div class="col-12 tl ttu resources-search">
			<span class="search-icon"><?php include get_template_directory() . '/assets/images/search.svg'; ?></span>
			<?php get_search_form(); ?>
		</div>
	</div>

	<div class="col"></div>

</article>

<div class="info-section">
	<div class="bootstrap-wrapper">
		<div class="row margin-0">
			<div class="grid">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/post/content' ); ?>
			<?php endwhile ?>
				<?php wp_pagenavi(); ?>
			</div>
		</div>
	</div>
</div>


<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
