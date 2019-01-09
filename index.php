<?php get_header(); ?>

<article class="stickit">

	<div class="base-col">

		<header class="resources-header">
			<div class="bootstrap-wrapper">
				<div class="row resources-filter">
					<div class="col-12 tl today-date">
						<h1 class="ph3 ttu"><?php echo 'talent' === get_post_type() ? 'Creative Talent' : 'Latest news of Distributed Design'; ?></h1>
					</div>
				</div>
			</div>
		</header>

		<div class="px-40 py-20 bg-gray border-b <?php echo $post_type; ?>-search">
			<div class="flex items-center">
				<span class="search-icon"><?php include get_template_directory() . '/assets/images/search.svg'; ?></span>
				<?php get_search_form(); ?>
			</div>
		</div>

	</div>

	<div class="col"></div>

</article>


<?php if ( 'post' === get_post_type() ) : ?>
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


<?php else : ?>
	<section class="flex flex-grow w-full overflow-x-hidden">
		<ul class="list-reset flex flex-1 flex-wrap -mt-px -mx-px">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<li class="w-full md:w-1/2"><?php get_template_part( 'template-parts/post/content', get_post_type() ); ?></li>
		<?php endwhile ?>
		</ul>
		<?php wp_pagenavi(); ?>
	</section>


<?php endif; ?>


<?php get_template_part( 'template-parts/forms/index' ); ?>

<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
