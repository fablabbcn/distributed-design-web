<?php get_header(); ?>


<main>

	<?php set_query_var( 'title', 'talent' === get_post_type() ? 'Creative Talent' : 'Latest news of Distributed Design' ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php if ( 'post' === get_post_type() ) : ?>
		<?php get_template_part( 'template-parts/blocks/search' ); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/archive/aside', $post_type ); ?>
	<?php endif; ?>


	<section class="flex flex-grow w-full overflow-x-hidden">
		<ul class="list-reset flex flex-1 flex-wrap -mt-px -mx-px">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li class="flex w-full md:w-1/2 lg:w-1/3 xl:w-1/4">
					<?php get_template_part( 'template-parts/post/content', get_post_type() ); ?>
				</li>
			<?php endwhile ?>
		</ul>
	</section>


	<?php get_template_part( 'template-parts/archive/navigation' ); ?>
	<?php get_template_part( 'template-parts/forms/index' ); ?>

</main>


<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
