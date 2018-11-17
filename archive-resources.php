<?php get_header(); ?>

<article class="">

	<div class="base-col">
		<header class="resources-header">
			<div class="bootstrap-wrapper">
				<div class="row resources-filter">
					<div class="col-6 tc filter-item">
						<h1>Communication</h1>
					</div>
					<div class="col-6 tc filter-item filter-right">
						<h1>Projects</h1>
					</div>
				</div>
			</div>
		</header>
		<div class="col-12 tl stickit-resources">
			<p class="resources-heading">Distributed Design paves the way for a entrepreneurial designer who has a new and profound influence on how design is made and how design meets customers as prosumers – focused on good design, smart manufacturing and quality emerging along with a new type of “users” wanting to connect with the products they own.</p>
			<div class="col-12 tl ttu resources-search">
				<span class="search-icon"><?php include get_template_directory() . '/assets/images/search.svg'; ?></span>
				<?php get_search_form(); ?>
			</div>
		</div>
		<div class="resources-content"><?php get_template_part( 'loop-resources' ); ?></div>
	</div>

	<div class="col"></div>

</article>

<?php if ( have_rows( 'flexible_content', get_option( 'page_on_front' ) ) ) : ?>
<?php while ( have_rows( 'flexible_content', get_option( 'page_on_front' ) ) ) : ?>
	<?php the_row(); ?>
	<?php set_query_var( 'layout', $layout ); ?>
	<?php get_template_part( 'template-parts/blocks/acf-flexible-content/layout', 'logos' ); ?>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
