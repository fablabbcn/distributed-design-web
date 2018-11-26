<?php get_header(); ?>

<article class="flex-1">

	<div class="base-col">

		<header class="resources-header">
			<h1 class="clip">Resources</h1>
			<div class="bootstrap-wrapper">
				<div class="row resources-filter">
					<button data-clip="resources-list-, resources-list-projects"
						class="col-6 tc filter-item bg-lime hover:bg-lime-30"><h2>Communication</h2></button>
					<button data-clip="resources-list-, resources-list-communication"
						class="col-6 tc filter-item filter-right hover:bg-lime-30"><h2>Projects</h2></button>
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

		<div class="resources-content">
		<?php foreach ( array( 'communication', 'projects' ) as $key => $term ) : ?>
			<div id="resources-list-<?php echo $term; ?>" class="<?php echo 0 === $key ? '' : 'clip'; ?>">
				<?php set_query_var( 'term', $term ); ?>
				<?php get_template_part( 'template-parts/loop-resources' ); ?>
			</div>
		<?php endforeach; ?>
		</div>

	</div>

	<div class="col"></div>

</article>


<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
