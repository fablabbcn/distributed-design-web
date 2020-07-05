<?php

/* Template Name: Form Entries */

$_title = get_the_title();

$i_classes = array(
	'li' => array(
		'default' => 'flex w-full md:w-1/2 lg:w-1/3 xl:w-1/4',
		'talent'  => 'flex w-full md:w-1/2 xl:w-1/3',
	),
);

$entries = new WP_Query(
	array(
		'post_type'      => 'af_entry',
		'posts_per_page' => '-1',
		'order'          => 'ASC',
	)
);

?>


<?php get_header(); ?>


<main class="flex flex-col flex-grow">

	<?php set_query_var( 'title', $_title ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<section class="flex flex-grow w-full overflow-x-hidden">
		<ul class="list-reset flex flex-1 flex-wrap -mt-px -mx-px">
			<?php while ( $entries->have_posts() ) : ?>
				<?php $entries->the_post(); ?>
				<li class="<?php the_classes( $i_classes['li']['default'] ); ?>">
					<?php get_template_part( 'template-parts/post/content', get_post_type() ); ?>
				</li>
			<?php endwhile ?>
		</ul>
	</section>

</main>

<?php get_footer(); ?>
